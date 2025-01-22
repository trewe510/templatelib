FROM marciodojr/php-fpm:82-dev-nginx as image

ARG USER=1000
ARG GROUP=1000
ARG UGNAME=docker

USER root

RUN echo "openssl.cafile=/etc/ssl/certs/McAfee.pem" >> /etc/php/8.2/cli/php.ini
RUN echo "xdebug.client_host=`ip route|awk '/default/ { print $3 }'`" >> /etc/php/8.2/cli/conf.d/25-xdebug.ini

RUN apt clean && \
    rm -rf /tmp/* && \
    rm -rf /var/lib/apt/lists/*

RUN mkdir -p /home/${UGNAME}

RUN userdel -r intec
RUN useradd -l -G www-data -u ${USER} -d /home/${UGNAME} ${UGNAME}

RUN chown -R ${UGNAME}:${UGNAME} /var/www && \
    chown -R ${UGNAME}:${UGNAME} /run/php && \
    chown -R ${UGNAME}:${UGNAME} /home/${UGNAME}

USER ${UGNAME}

WORKDIR /var/www/app
ENTRYPOINT ["tail", "-f", "/dev/null"]