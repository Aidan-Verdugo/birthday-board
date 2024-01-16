#FROM httpd
#COPY ./ /usr/local/apache2/htdocs/

FROM php:apache
COPY ./ /var/www/html

