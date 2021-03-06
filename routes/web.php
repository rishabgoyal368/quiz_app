<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backEnd\ProfileController;

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


Route::match(['get','post'],'/',[AuthController::class, 'login']);
Route::match(['get','post'],'/admin',[AuthController::class, 'login']);
Route::match(['get','post'],'/login',[AuthController::class, 'login']);
Route::match(['get','post'],'/admin/login',[AuthController::class, 'login']);
Route::match(['get','post'],'/admin/forgot-password',[AuthController::class, 'forgot_password']);
Route::match(['get','post'],'admin/forgot-password',[AuthController::class, 'forgot_password']);
Route::match(['get','post'],'admin/set/password/{user_id}/{security_code}',[AuthController::class, 'set_password']);

Route::get('validate/email',[AuthController::class, 'check_admin_email']);


Route::group(['prefix'=>'admin', 'middleware'=>'CheckAdminAuth'],function(){

	Route::get('/logout',[AuthController::class, 'logout']);
	Route::get('/dashboard',[AuthController::class, 'dashboard']);

	// profile
	Route::match(['get','post'],'/profile',[ProfileController::class, 'index']);
	Route::post('/change-password',[ProfileController::class, 'change_password']);



});

// common
define('PROJECT_NAME','Laravel 8');
define('systemImgPath',asset('public/images/system'));
define('backEndCssPath','public/backEnd/css');
define('backEndJsPath','public/backEnd/js');
define('COMMON_ERROR', 'Some error occured. Please try again later after sometime');

// controller
define('AdminProfileBasePath','public/images/profile/admin');
define('UserProfileBasePath','public/images/profile/user');

// views
define('AdminProfileImgPath',asset('public/images/profile/admin'));
define('UserProfileImgPath',asset('public/images/profile/user'));


//view file static path
define('DefaultImgPath',asset('public/images/system/default-image.png'));
