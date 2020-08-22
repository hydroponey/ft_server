FROM debian:buster

RUN apt-get update

# Generate certificate
RUN apt-get install -y openssl && \
    openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=42 School/CN=asimoes" -addext "subjectAltName=DNS:localhost" -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt

# Install Nginx
RUN apt-get install -y nginx
COPY ./srcs/default /etc/nginx/sites-available/default

# Install MariaDB
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y mariadb-server
COPY ./srcs/setup.sql /setup.sql
COPY ./srcs/wordpress.sql /wordpress.sql
RUN service mysql start && \
    sleep 5 && \
    mysql -u root mysql < /setup.sql && \
    mysql -u root wordpress < /wordpress.sql && \
    service mysql stop

# Install PHP-FPM
RUN apt-get install -y php php-common php-mysql php-fpm

# Install phpMyAdmin
RUN apt-get install -y wget && \
    wget -q https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-english.tar.gz && \
    tar -xf phpMyAdmin-latest-english.tar.gz -C /var/www/html && \
    mv /var/www/html/phpMyAdmin* /var/www/html/phpMyAdmin && \
    rm -f phpMyAdmin-latest-english.tar.gz

# Install Wordpress
COPY ./srcs/wordpress/ /var/www/html/wordpress

# Run services
CMD service mysql start; service php7.3-fpm start; service nginx start; tail -f /dev/null

EXPOSE 80 443
