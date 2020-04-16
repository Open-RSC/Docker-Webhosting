#
# Docker container management
#
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
# Laravel site management
# Utilize the commands followed by "site=" and specify the Laravel site. Ex: make update-laravel site=portal
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

#
# MediaWiki site management
#
upgrade-wiki:
	docker exec -i php bash -c "cd /var/www/html/${site}/public/wiki && composer update --no-dev && php maintenance/update.php"
