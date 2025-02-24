up:
	docker-compose up -d

down:
	docker-compose down

restart:
	docker-compose down && docker-compose up -d

logs:
	docker-compose logs -f

migrate:
	docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction

seed:
	docker-compose exec php php bin/console doctrine:fixtures:load --no-interaction

bash:
	docker-compose exec php bash

mysql:
	docker-compose exec mysql mysql -uapp_user -papp_password app_db

clean:
	docker-compose down -v