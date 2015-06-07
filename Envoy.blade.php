@servers(['production' => 'forge@104.131.182.125'])

@task('prod_deploy')
	cd /home/forge/default
	git reset --hard HEAD
	git pull origin production
	rm -rf vendor
	composer install
	composer dump-autoload
	php artisan migrate --force
@endtask

@task('dev_deploy')
	cd /home/forge/default
	git reset --hard HEAD
	git pull origin production
	rm -rf vendor
	composer install
	composer dump-autoload
    php artisan migrate:refresh --seed
@endtask
