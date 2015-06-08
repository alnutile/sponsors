@servers(['production' => 'forge@104.131.182.125', 'dev' => 'forge@104.131.182.125'])

@task('prod_deploy', ['on' => 'production'])
	cd /home/forge/default
    php artisan down
	git reset --hard HEAD
	git pull origin production
	rm -rf vendor
	composer install
	composer dump-autoload
    php artisan view:clear
	php artisan migrate --force
    php artisan up
@endtask

@task('dev_deploy', ['on' => 'dev'])
	cd /home/forge/dev
	git reset --hard HEAD
	git pull origin production
	rm -rf vendor
	composer install
	composer dump-autoload
	rm storage/database.sqlite && touch storage/database.sqlite
    php artisan migrate:refresh --seed
@endtask
