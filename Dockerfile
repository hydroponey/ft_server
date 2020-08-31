FROM debian:buster

ENV AUTOINDEX=on
ENV DEBIAN_FRONTEND=noninteractive

# Install packages
RUN apt-get update && apt-get install -y \
	openssl \
	nginx \
	gettext-base \
	mariadb-server \
	php \
	php-common \
	php-mysql \
	php-fpm \
	wget

# Generate certificate
RUN openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=42 School/CN=asimoes" -addext "subjectAltName=DNS:localhost" -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt

# Set nginx server configuration
RUN rm -f /etc/nginx/sites-available/default
COPY ./srcs/server.template /tmp/server.template

# Set MySQL root password and install Wordpress database
COPY ./srcs/setup.sql /setup.sql
COPY ./srcs/wordpress.sql /wordpress.sql
RUN service mysql start && \
    sleep 5 && \
    mysql -u root mysql < /setup.sql && \
    mysql -u root wordpress < /wordpress.sql && \
    service mysql stop

# Install phpMyAdmin
RUN wget -q https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-english.tar.gz && \
    tar -xf phpMyAdmin-latest-english.tar.gz -C /var/www/html && \
    mv /var/www/html/phpMyAdmin* /var/www/html/phpMyAdmin && \
    rm -f phpMyAdmin-latest-english.tar.gz

# Install Wordpress
COPY ./srcs/wordpress/ /var/www/html/wordpress

# Run services
CMD envsubst '$AUTOINDEX' < /tmp/server.template > /etc/nginx/sites-available/default && \
    service nginx start; \
    service php7.3-fpm start; \
    service mysql start; \
    tail -f /dev/null

EXPOSE 80 443
