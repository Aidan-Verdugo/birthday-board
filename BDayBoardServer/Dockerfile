#FROM httpd
#COPY ./ /usr/local/apache2/htdocs/

FROM php:apache
COPY ./ /var/www/html
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
RUN apachectl restart
EXPOSE 8080:80
