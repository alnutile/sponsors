<?php


Route::get('/', function() {
	return Redirect::to('/sponsor');
});

require __DIR__ . '/routes.sponsor.php';

require __DIR__ . '/routes.profile.php';

require __DIR__ . '/routes.auth.php';


