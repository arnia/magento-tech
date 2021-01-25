ARG PHP_VERSION
FROM webdevops/php-apache:${PHP_VERSION}
MAINTAINER Sorin Radomir Antal <sorin.antal@arnia.ro>

RUN usermod -a -G application www-data \
  && usermod -a -G www-data application

RUN curl -sSLO https://xdebug.org/files/xdebug-2.9.8.tgz \
  && tar -xvzf xdebug-2.9.8.tgz \
  && cd xdebug-2.9.8 \
  && phpize \
  && ./configure \
  && make \
  && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902/ \
  && echo ';zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so' > /usr/local/etc/php/conf.d/01-xdebug.ini

RUN curl -sSLO https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 \
  && chmod +x mhsendmail_linux_amd64 \
  && mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail

RUN apt-get install -y gnupg \
  && curl -sL https://deb.nodesource.com/setup_10.x | bash - \
  && apt-get install -y nodejs \
  && mkdir -p /var/www/.config /var/www/.npm \
  && chown www-data:www-data /var/www/.config /var/www/.npm \
  && npm install -g grunt-cli

RUN printf '* *\t* * *\tapp\t%s/usr/local/bin/php /app/update/cron.php\n' >> /etc/crontab \
  && printf '* *\t* * *\tapp\t%s/usr/local/bin/php /app/bin/magento cron:run\n' >> /etc/crontab \
  && printf '* *\t* * *\tapp\t%s/usr/local/bin/php /app/bin/magento setup:cron:run\n#\n' >> /etc/crontab

COPY configuration/docker-apache2-envvars /etc/apache2/envvars
COPY vhosts/application.docker.conf /opt/docker/etc/httpd/conf.d/application.docker.conf

