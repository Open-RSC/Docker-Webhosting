start:
	docker-compose up -d

stop:
	docker-compose down -v

restart:
	docker-compose down -v
	docker-compose up -d

ps:
	docker-compose ps

logs:
	docker-compose logs -f

#
# Utilize the following with the command, followed by "game=" and specify which game.
# Example 1: make update-laravel game=cabbage
# Example 2: make update-laravel game=openrsc
#
update-laravel:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && composer install && composer update && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix"

clear-all-laravel:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan view:clear && php artisan route:clear && php artisan config:cache"

migrate-laravel:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan migrate --seed"

make-laravel:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan make:controller MyController"

list-route:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan route:list"

clear-views:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan view:clear"

clear-route:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan route:clear"

migrate:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan migrate"

migrate-refresh:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan migrate:refresh"

clear-config:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan config:cache"

publish-pagination:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan vendor:publish --tag=laravel-pagination"

version:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan --version"

npm-install:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && npm install"

npm-run-dev:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && npm run dev"

npm-run-prod:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && npm run prod"

npm-run-watch:
	docker exec -i php bash -c "cd /var/www/html/${game}_web && npm run watch"
