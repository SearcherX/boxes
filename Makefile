include .env

up:
	@docker compose up -d

down:
	@docker compose down --remove-orphans

restart: down up

yii-migration-create:
	@docker-compose -p boxes run --rm php-fpm php ./yii migrate/create $(name)

yii-run:
	@docker compose -p boxes run --rm php-fpm php ./yii $(cmd)

yii-migrate:
	@docker-compose -p boxes run --rm php-fpm php ./yii migrate