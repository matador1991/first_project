<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Auth::routes();
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function (){

    Route::group(['namespace'=>'Admin\Auth','prefix'=>'admin','middleware'=>'guest:admin'],function (){
        route::get('/login','LoginController@showLoginForm')->name('adminGetLogin');
        route::post('/login','LoginController@Login')->name('adminLogin');
    });

    Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function (){
        route::get('/','HomeController@index')->name('dashboard');
        route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
        route::get('/admin_accounts','AdminController@index')->name('admin.index');
        route::post('/passwordUpdate','AdminController@reset')->name('admin.update');

        //Settings Operations
        Route::group(['prefix'=>'settings'],function (){
            route::get('/','SettingController@index')->name('setting.index');
            route::post('/update','SettingController@update')->name('setting.update');
        });

        //Services Operations
        Route::group(['prefix'=>'services'],function (){
            route::get('/','ServiceController@index')->name('service.index');
            route::get('/create','ServiceController@create')->name('service.create');
            route::post('/store','ServiceController@store')->name('service.store');
            route::get('/edit/{id}','ServiceController@edit')->name('service.edit');
            route::post('/update','ServiceController@update')->name('service.update');
            route::get('/delete/{id}','ServiceController@delete')->name('service.delete');
        });

        //Clients Operations
        Route::group(['prefix'=>'clients'],function (){
            route::get('/','ClientController@index')->name('client.index');
            route::get('/create','ClientController@create')->name('client.create');
            route::post('/store','ClientController@store')->name('client.store');
            route::get('/edit/{id}','ClientController@edit')->name('client.edit');
            route::post('/update','ClientController@update')->name('client.update');
            route::get('/delete/{id}','ClientController@delete')->name('client.delete');
        });

        //projects Operations
        Route::group(['prefix'=>'projects'],function (){
            route::get('/','ProjectController@index')->name('project.index');
            route::get('/create','ProjectController@create')->name('project.create');
            route::post('/store','ProjectController@store')->name('project.store');
            route::get('/edit/{id}','ProjectController@edit')->name('project.edit');
            route::post('/update','ProjectController@update')->name('project.update');
            route::get('/delete/{id}','ProjectController@delete')->name('project.delete');
        });

        //Team Member Operations
        Route::group(['prefix'=>'team_members'],function (){
            route::get('/','TeamMemberController@index')->name('member.index');
            route::get('/create','TeamMemberController@create')->name('member.create');
            route::post('/store','TeamMemberController@store')->name('member.store');
            route::get('/edit/{id}','TeamMemberController@edit')->name('member.edit');
            route::post('/update','TeamMemberController@update')->name('member.update');
            route::get('/delete/{id}','TeamMemberController@delete')->name('member.delete');
        });

        //News_Letters Operations
        Route::group(['prefix'=>'news_letters'],function (){
            route::get('/','NewsLetterController@index')->name('news_letter.index');
            route::get('/delete/{id}','NewsLetterController@delete')->name('news_letter.delete');
        });
    });




});
