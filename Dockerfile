FROM dnhsoft/shopware:5.2.3-php7

# TODO:
# Download latest from github
# https://github.com/shopware/shopware/releases/latest

ENV SWDEBUG 1

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# get sw-cli tool
RUN wget -O /shopware/bin/sw http://shopwarelabs.github.io/sw-cli-tools/sw.phar && \
	chmod +x /shopware/bin/sw

# Copy a php.ini with increased values for file uploading
COPY ./files/config/php.ini /etc/php5/apache2/php.ini

# Copy a config.php with debug values
COPY ./files/assets/config.php /shopware/config.php

# Copy entrypoint
COPY ./files/swtools/entrypoint.sh /swtools/entrypoint.sh
RUN chmod +x /swtools/entrypoint.sh

COPY ./files/swtools/change-db.php /swtools/change-db.php

ENTRYPOINT ["/swtools/entrypoint.sh"]
CMD ["apache2-foreground"]
