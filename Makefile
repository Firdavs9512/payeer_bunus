mysql_login: 
	mysql -h 127.0.0.1 -u root -p payeer_bonus -P 3000

docker_up:
	docker-compose up -d

docker_down:
	docker-compose down

run:
	@echo "App running..."
	php artisan serve

ports:
	netstat -tunlp

migrate:
	php artisan migrate

job:
	php artisan schedule:run >> /dev/null 2>&1