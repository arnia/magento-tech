ARG PHP_VERSION
FROM webdevops/php-apache:${PHP_VERSION}
MAINTAINER Sorin Radomir Antal <sorin.antal@arnia.ro

RUN pecl channel-update pecl.php.net \
  && pecl install xdebug

RUN docker-php-ext-enable xdebug \
  && sed -i -e 's/^zend_extension/\;zend_extension/g' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sSLO https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 \
  && chmod +x mhsendmail_linux_amd64 \
  && mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail

COPY configuration/docker-php-ext-mailhog.ini /usr/local/etc/php/conf.d/docker-php-ext-mailhog.ini

RUN apt-get install -y gnupg \
  && curl -sL https://deb.nodesource.com/setup_10.x | bash - \
  && apt-get install -y nodejs \
  && mkdir -p /var/www/.config /var/www/.npm \
  && chown www-data:www-data /var/www/.config /var/www/.npm \
  && npm install -g grunt-cli

RUN printf '* *\t* * *\tapp\t%s/usr/local/bin/php /app/update/cron.php\n' >> /etc/crontab \
  && printf '* *\t* * *\tapp\t%s/usr/local/bin/php /app/bin/magento cron:run\n' >> /etc/crontab \
  && printf '* *\t* * *\tapp\t%s/usr/local/bin/php /app/bin/magento setup:cron:run\n#\n' >> /etc/crontab

COPY vhosts/application.docker.conf /opt/docker/etc/httpd/conf.d/application.docker.conf