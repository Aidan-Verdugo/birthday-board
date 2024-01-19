#FROM httpd
#COPY ./ /usr/local/apache2/htdocs/

FROM php:apache
COPY ./ /var/www/html
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
RUN apachectl restart
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R g+w /var/www/html
EXPOSE 8080:80
