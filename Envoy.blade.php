@servers(['web' => 'production'])

@task('deploy')
	cd /path/to/site
	git pull origin master
@endtask
