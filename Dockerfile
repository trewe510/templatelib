ARG SQUAD="devops"

FROM southamerica-east1-docker.pkg.dev/mova-infra-dev-02/base-images/hyperf:8.3-${SQUAD}-base

COPY 99_overrides.ini /etc/php83/conf.d/99_overrides.ini
COPY . /opt/www

WORKDIR /opt/www

RUN composer install --no-dev -o && php bin/hyperf.php

EXPOSE 8080
ENTRYPOINT ["php", "/opt/www/bin/hyperf.php", "start"]