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
# Utilize the following with the command, followed by "site=" and specify which site.
# Example 1: make update-laravel site=cabbage
# Example 2: make update-laravel site=openrsc
#
upgrade-laravel:
	docker exec -i php bash -c "cd /var/www/html/${site} && composer install && composer update && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix"

clear-all-laravel:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan view:clear && php artisan route:clear && php artisan config:cache"

migrate-laravel:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan migrate --seed"

make-laravel:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan make:controller MyController"

list-route:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan route:list"

clear-views:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan view:clear"

clear-route:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan route:clear"

migrate:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan migrate"

migrate-refresh:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan migrate:refresh"

clear-config:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan config:cache"

publish-pagination:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan vendor:publish --tag=laravel-pagination"

version:
	docker exec -i php bash -c "cd /var/www/html/${site} && php artisan --version"

npm-install:
	docker exec -i php bash -c "cd /var/www/html/${site} && npm install"

npm-dev:
	docker exec -i php bash -c "cd /var/www/html/${site} && npm run dev"

npm-prod:
	docker exec -i php bash -c "cd /var/www/html/${site} && npm run prod"

npm-watch:
	docker exec -i php bash -c "cd /var/www/html/${site} && npm run watch"
