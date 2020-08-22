SET PASSWORD FOR 'root'@'localhost' = PASSWORD('root');
CREATE DATABASE wordpress;
GRANT ALL PRIVILEGES ON wordpress.* TO 'root'@'localhost';