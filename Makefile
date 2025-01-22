t=
up:
	docker compose up || docker-compose up
down:
	docker compose down || docker-compose down
php:
	docker exec -it lib-php-template-php bash
# mova-scripts setup
hooks:
	vendor/bin/mova-script ms:make-hooks --working-dir=.
init-hooks:
	@git config core.hooksPath .githooks
	@chmod +x .githooks/pre-commit 2>/dev/null || true
install:
	composer install
	make hooks
	make init-hooks
update:
	composer update
	make hooks
	make init-hooks
# /mova-scripts setup


