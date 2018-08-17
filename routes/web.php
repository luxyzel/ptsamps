<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@index' )->name('approver.login');

Route::prefix('admin')->group(function(){

	// admin login
	Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	
	// admin login submit
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	// admin login submit
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	// admin manage user
	Route::resource('/manage/users', 'Admin\ManageUsersController');

	// create new admin
	Route::resource('/manage/admin', 'Admin\AdminController');

	//ADMIN Account Settings route
	Route::get('/account/settings', 'Admin\AdminController@accountInfo')->name('acc.settings');

	//ADMIN Account Settings submit
	Route::match(['put', 'patch'], '/account/settings/update', 'Admin\AdminController@updateInfo')->name('acc.settings.submit'); 

	
	// CATEGORY
	Route::resource('/category', 'Admin\CategoryController');

	// CONDITION
	Route::resource('/manage/conditions', 'Admin\ConditionsController');

	// LOCATION
	Route::resource('/manage/locations', 'Admin\LocationsController');

	// STATUS
	Route::resource('/manage/statuses', 'Admin\StatusesController');

	//Asset Management route
	Route::resource('/assets-management', 'Admin\AssetsController');

	//Create new Assets route
	Route::get('/assets/create', 'Admin\AssetsController@showCreate')->name('create.assets');

		//Create new Assets route
	Route::get('/assets/search', 'Admin\SearchController@assetSearch')->name('asset-search');


	//IMPORT ASSETS VIEW
	Route::get('/import-asset', 'Admin\ImportController@importAssetsView')->name('import-assets');

	//IMPORT ASSETS
	Route::post('/import/assets', 'Admin\ImportController@import')->name('import');


	// PEREPHERALS INDEX ROUTE
	Route::resource('/manage/peripherals', 'Admin\PeripheralsController');

	//IMPORT PEREPHERALS INDEX
	Route::get('/import-peripherals', 'Admin\PeripheralsController@importView')->name('import-per');

		//IMPORT PEREPHERALS
	Route::post('/import/peripherals', 'Admin\PeripheralsController@import')->name('importP');

	//IMPORT PEREPHERALS
	Route::post('/peripherals/search', 'Admin\SearchController@peripheralsSearch')->name('p-search');

		//Create new Assets route
	Route::get('/assets/search', 'Admin\AssetsController@assetSearch')->name('asset-search');


	//Deployed Units Index
	Route::get('/assets/deployed', 'Admin\DeployedAssetsController@Index')->name('assets.deployed');

	//Deployed Units Filter
	Route::get('/assets/deployed/Units', 'Admin\DeployedAssetsController@DeployedAsset')->name('deployed-units');

	//Stock Assets Index
	Route::get('/assets/stocks', 'Admin\AssetsController@StocksIndex')->name('assets.stocks');

	//Asset Track Filter
	Route::get('/assets-tracking/filter', 'Admin\AssetTrackController@TrackAsset')->name('track-units');

	//Assets Tracking
	Route::resource('/assets-tracking', 'Admin\AssetTrackController');

	
});

// PROCUREMENT INDEX ROUTE
Route::resource('/procurement', 'Admin\ProcureController');

// VENDOR INDEX ROUTE
Route::resource('/vendor', 'Admin\VendorController');

// REQUESTOR INDEX ROUTE
Route::resource('/requestor', 'Admin\RequestorController');


// user auth route
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// admin auth route
Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');