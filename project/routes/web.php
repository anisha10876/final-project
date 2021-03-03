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

use Illuminate\Support\Facades\Route;

Route::get('/','Frontend\HomePageController@index')->name('home');
Route::get('/cars','Frontend\HomePageController@getCars')->name('cars');
Route::get('/contact','Frontend\HomePageController@getContact')->name('contact');
Route::get('/about','Frontend\HomePageController@getabout')->name('about');
Route::get('/blog','Frontend\HomePageController@getblog')->name('blog');
Route::get('/blogdetail','Frontend\HomePageController@getblogdetail')->name('blogdetail');
Route::get('/faq','Frontend\HomePageController@getfaq')->name('faq');
Route::get('/terms','Frontend\HomePageController@getterms')->name('terms');
Route::get('/testimonals','Frontend\HomePageController@gettestimonals')->name('testimonals');
Route::get('/team','Frontend\HomePageController@getteam')->name('team');
Route::get('/register','UserController@register')->name('registerpage')->middleware('guestuser');
Route::get('/login' ,'UserController@login')->name('loginpage')->middleware('guestuser');
Route::post('/register','UserController@postregister')->name('postregister');
Route::post('/login','UserController@postlogin')->name('postlogin');

Route::get('/logout','UserController@logout')->name('logout');



Route::get('/admin','backend\AdminController@dashboard')->name('admindashboard');
Route::get('/admin/brands','backend\BrandController@getbrand')->name('brands');
Route::get('/admin/brand_add','backend\BrandController@addbrand')->name('add_brand');
Route::post('admin/brand_add','backend\BrandController@postbrand')->name('postbrand');
Route::get('/admin/brand_edit/{id}','backend\BrandController@geteditbrand')->name('editbrand');
Route::post('/admin/brand_edit/{id}','backend\BrandController@posteditbrand')->name('posteditbrand');
Route::get('/admin/brand_delete/{id}','backend\BrandController@getdeletebrand')->name('deletebrand');
