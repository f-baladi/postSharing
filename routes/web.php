<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $posts = Post::with(['tags','categories','author'])
        ->where('status',1)->Paginate(7);
    return view('welcome',compact('posts'));
})->name('welcome');

Route::group([
    'middleware'=> 'auth'
],function (){
    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagController');
    Route::resource('categories', 'CategoryController');
    Route::get('myTags','TagController@myTags')->name('tags.myTags');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/checkMobile', 'Auth\MobileVerificationController@checkMobile')->name('check.mobile');
Route::get('/insertMobile', 'Auth\LoginController@showLoginForm');
Route::post('/verifyMobile', 'Auth\MobileVerificationControllerr@verifyMobile')->name('verify.mobile');
Route::get('/verifyMobile', 'Auth\MobileVerificationController@showVerifyForm');

Route::get('post/{post}/publish' , 'PublishPostController@publish')->name('post.publish');
Route::get('post/{post}/draft' , 'PublishPostController@draft')->name('post.draft');
