start:
	sudo docker-compose up -d

start-prod:
	sudo docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d

stop:
	sudo docker-compose down -v

restart:
	sudo docker-compose down -v
	sudo docker-compose up -d

restart-prod:
	sudo docker-compose down -v
	sudo docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d

ps:
	sudo docker-compose ps

logs:
	sudo docker-compose logs -f

#
# Utilize the following with the command, followed by "game=" and specify which game.
# Example 1: sudo make update-laravel game=cabbage
# Example 2: sudo make update-laravel game=openrsc
#
update-laravel:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && composer install && composer update && php artisan key:generate && php artisan optimize && npm install && npm update && npm audit fix"

clear-all-laravel:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan view:clear && php artisan route:clear && php artisan config:cache"

migrate-laravel:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan migrate --seed"

make-laravel:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan make:controller MyController"

list-route:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan route:list"

clear-views:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan view:clear"

clear-route:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan route:clear"

migrate:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan migrate"

migrate-refresh:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan migrate:refresh"

clear-config:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan config:cache"

publish-pagination:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan vendor:publish --tag=laravel-pagination"

version:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && php artisan --version"

npm-install:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && npm install"

npm-run-dev:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && npm run dev"

npm-run-prod:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && npm run prod"

npm-run-watch:
	sudo docker exec -i php bash -c "cd /var/www/html/${game}_web && npm run watch"
