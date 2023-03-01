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
	php artisan db:seed --class=SettingSeeder
	php artisan db:seed --class=AdminSeeder
	php artisan db:seed --class=AdsenSeeder

restart:
	php artisan migrate:fresh
	php artisan db:seed --class=SettingSeeder
	php artisan db:seed --class=AdminSeeder
	php artisan db:seed --class=AdsenSeeder
	php artisan db:seed --class=UserSeeder
	php artisan db:seed --class=BonusSeeder
	php artisan db:seed --class=PaymentSeeder

job:
	php artisan schedule:run >> /dev/null 2>&1

