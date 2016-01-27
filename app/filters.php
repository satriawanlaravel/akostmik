<?php


/*
|--------------------------------------------------------------------------
| Authentication Filters Administrator
|--------------------------------------------------------------------------
| Filter ini digunakan untuk mengecek apakah yang mengakses routing dengan
| filter ini adalah admin atau bukan, jika bukan akan dipaksa untuk
| login terlebih dahulu, tapi jika ya akan dibiarkan untuk mengakses
| halaman yang diinginkan.
|
|
*/


Route::filter('admin', function()
{
	$user = Sentry::getUser();

	$admin = Sentry::findGroupByName('admin');

	if($user == null || $user == "")
		return Redirect::guest('/auth/admin/login')
	->with('msge', 'Anda harus login terlebih dahulu untuk mengakses halaman tersebut');

	if(!$user->inGroup($admin)) {
		return Redirect::guest('/auth/admin/login')
		->with('msge', 'Anda tidak diijinkan untuk mengakses halaman ini!');
	}

});


/*
|--------------------------------------------------------------------------
| Authentication Filters Mahasiswa
|--------------------------------------------------------------------------
| Filter ini adalah regular user atau bukan, jika bukan akan dipaksa untuk
| login terlebih dahulu, tapi jika ya akan dibiarkan untuk mengakses
| halaman yang diinginkan.
| 
|
*/


Route::filter('mahasiswa', function(){
	$user = Sentry::getUser();
	$admin = Sentry::findGroupByName('admin');
	$mhs = Sentry::findGroupByName('mahasiswa');
	$dsn = Sentry::findGroupByName('dosen');

	// return ($user);

	if($user == null || $user == "")
		return Redirect::guest('/')
	->with('msge', 'Anda harus login terlebih dahulu untuk mengakses halaman tersebut');

	if(!$user->inGroup($mhs)) {
		return Redirect::guest('/')
		->with('msge', 'Anda tidak diijinkan untuk mengakses halaman ini!');
	}

});


/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
| Filter User Dosen
|
|
*/

Route::filter('dosen', function(){
	$user = Sentry::getUser();
	$admin = Sentry::findGroupByName('admin');
	$mhs = Sentry::findGroupByName('mahasiswa');
	$dsn = Sentry::findGroupByName('dosen');

	// return ($user);

	if($user == null || $user == "")
		return Redirect::guest('/logindosen')
	->with('msge', 'Anda harus login terlebih dahulu untuk mengakses halaman tersebut');

	if(!$user->inGroup($dsn)) {
		return Redirect::guest('/logindosen')
		->with('msge', 'Anda tidak diijinkan untuk mengakses halaman ini!');
	}

});


/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{

	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
