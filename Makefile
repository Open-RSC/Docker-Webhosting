include .env
MYSQL_DUMPS_DIR=./data

start:
	docker-compose up -d

stop:
	@docker-compose down -v

restart:
	@docker-compose down -v
	docker-compose up -d

ps:
	docker-compose ps

logs:
	@docker-compose logs -f

init-laravel:
	cp Website/openrsc_web/.env.example Website/openrsc_web/.env

update-laravel:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && composer install && composer update && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix"

migrate-laravel:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan migrate --seed"

make-laravel:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan make:controller MyController"

list-route:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan route:list"

clear-views:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan view:clear"

clear-route:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan route:clear"

migrate:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan migrate"

migrate-refresh:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan migrate:refresh"

clear-config:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan config:cache"

publish-pagination:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan vendor:publish --tag=laravel-pagination"

version:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && php artisan --version"

npm-install:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && npm install"

npm-run-dev:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && npm run dev"

npm-run-prod:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && npm run prod"

npm-run-watch:
	docker exec -i php bash -c "cd /var/www/html/openrsc_web && npm run watch"
