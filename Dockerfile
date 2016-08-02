FROM dnhsoft/shopware:5.2.3-php7

# get sw-cli tool
RUN wget -O /shopware/bin/sw http://shopwarelabs.github.io/sw-cli-tools/sw.phar && \
	chmod +x /shopware/bin/sw

# Copy a php.ini with increased values for file uploading
COPY ./config/php.ini /etc/php5/apache2/php.ini
