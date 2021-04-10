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
Route::get('/blogdetail/{id}','Frontend\HomePageController@getblogdetail')->name('blogdetail');
Route::get('/faq','Frontend\HomePageController@getfaq')->name('faq');
Route::get('/terms','Frontend\HomePageController@getterms')->name('terms');
Route::get('/testimonals','Frontend\HomePageController@gettestimonals')->name('testimonals');
Route::get('/team','Frontend\HomePageController@getteam')->name('team');
Route::get('/register','UserController@register')->name('registerpage')->middleware('guestuser');
Route::get('/login' ,'UserController@login')->name('loginpage')->middleware('guestuser');
Route::post('/register','UserController@postregister')->name('postregister');
Route::post('/login','UserController@postlogin')->name('login');

Route::get('/forgot-password','UserController@forgotPassword')->name('forgotPasswordPage');
Route::post('/forgot-password','UserController@postForgotPassword')->name('forgotPasswordSubmit');
Route::get('/reset-password/{email}/{token}','UserController@resetPassword')->name('resetPasswordPage');
Route::post('/post-reset-password','UserController@postResetPassword')->name('resetPasswordSubmit');

Route::get('/logout','UserController@logout')->name('logout');

Route::get('/add-to-compare/{id}','frontend\CompareController@addToCompare')->name('addToCompare');
Route::get('/compare_cars','frontend\CompareController@index')->name('compare_cars');
Route::get('/remove-compare/{id}','frontend\CompareController@removeFromCompare')->name('removeFromCompare');


######search#####
Route::get('/search','backend\CarController@searchcar')->name('searchcar');

// filter with brands
Route::get('/carbrand/{id}','backend\CarController@carbrand')->name('carbrand');

Route::get('/filtercars','backend\CarController@filtercars')->name('filtercars');





############cardetail#########
Route::get('/cardetails/{id}','backend\CarController@cardetails')->name('cardetails');

Route::group([
    'middleware'=>['auth']
], function(){
    Route::get('/buy_car','backend\CarController@buycar')->name('buy_car');
    Route::get('/cart','frontend\CartController@cartPage')->name('cart_page');

    Route::post('/book_appointment','frontend\DashboardController@submitAppointment')->name('post_book_appointment');
    Route::get('/confirm_appointment/{id}','frontend\DashboardController@confirmAppointment')->name('appointmentConfirm');

    Route::get('/dashboard','frontend\DashboardController@dashboard')->name('userdashboard');
    Route::post('/sellmycar','frontend\DashboardController@sellCar')->name('sellmycar');
});

Route::group([
    'middleware' => ['auth','admin']
],
function(){


Route::get('/admin','backend\AdminController@dashboard')->name('admindashboard');
Route::get('/admin/brands','backend\BrandController@getbrand')->name('brands');
Route::get('/admin/brand_add','backend\BrandController@addbrand')->name('add_brand');
Route::post('admin/brand_add','backend\BrandController@postbrand')->name('postbrand');
Route::get('/admin/brand_edit/{id}','backend\BrandController@geteditbrand')->name('editbrand');
Route::post('/admin/brand_edit/{id}','backend\BrandController@posteditbrand')->name('posteditbrand');
Route::get('/admin/brand_delete/{id}','backend\BrandController@getdeletebrand')->name('deletebrand');



######cars####
Route::get('/carsadmin','backend\AdminController@carpage')->middleware(['auth','admin'])->name('carsadmin');
Route::get('/addcar','backend\AdminController@addcar')->name('add_car');
Route::post('/addcarsubmit','backend\AdminController@addcarsubmit')->name('addcarsubmit');

Route::get('/editcars/{id}','backend\AdminController@editcar')->name('editcar');
Route::post('/editcarsubmit/{id}','backend\AdminController@editcarsubmit')->name('editcarsubmit');
Route::get('/deletecar/{id}','backend\AdminController@deletecar')->name('deletecar');

#faqs###########
Route::get('/addfaq','backend\AdminController@addfaq')->name('addfaq');
Route::post('/addfaqsubmit','backend\AdminController@addfaqsubmit')->name('addfaqsubmit');
Route::get('/faqs','backend\AdminController@faqs')->name('faqs');

Route::get('/editfaq/{id}','backend\AdminController@editfaq')->name('editfaq');
Route::post('/editfaqsubmit/{id}','backend\AdminController@editfaqsubmit')->name('editfaqsubmit');

Route::get('/deletefaq/{id}','backend\AdminController@deletefaq')->name('deletefaq');

    // blogs#########
    Route::get('/blogs','backend\BlogController@blogs')->name('blogs');
    Route::get('/addblog','backend\BlogController@addblog')->name('addblog');
    Route::post('/addblogsubmit','backend\BlogController@addblogsubmit')->name('addblogsubmit');
    Route::get('/editblog/{id}','backend\BlogController@editblog')->name('editblog');
    Route::post('/editblogsubmit/{id}','backend\BlogController@editblogsubmit')->name('editblogsubmit');
    Route::get('/deleteblog/{id}','backend\BlogController@deleteblog')->name('deleteblog');


    #########teams#########
    Route::get('/teams','backend\TeamController@teams')->name('teams');

    Route::get('/addteam','backend\TeamController@addteam')->name('addteam');
    Route::post('/addteamsubmit','backend\TeamController@addteamsubmit')->name('addteamsubmit');

    Route::get('/editteam/{id}','backend\TeamController@editteam')->name('editteam');
    Route::post('/editteamsubmit/{id}','backend\TeamController@editteamsubmit')->name('editteamsubmit');

    Route::get('/deleteteam/{id}','backend\TeamController@deleteteam')->name('deleteteam');

    ###########testomonials###############
    Route::get('/testomonials','backend\TestomonialController@testomonials')->name('testomonials');
    Route::get('/addtestomonials','backend\TestomonialController@addtestomonials')->name('addtestomonials');
    Route::post('/addtestomonialssubmit','backend\TestomonialController@addtestomonialssubmit')->name('addtestomonialssubmit');
    Route::get('/edittestomonial/{id}','backend\TestomonialController@edittestomonial')->name('edittestomonial');
    Route::post('/edittestomonialssubmit/{id}','backend\TestomonialController@edittestomonialssubmit')->name('edittestomonialssubmit');
    Route::get('/deletetestomonial/{id}','backend\TestomonialController@deletetestomonial')->name('deletetestomonial');


    // Roles#############
    Route::get('/roles','backend\RoleController@roles')->name('roles');
    Route::get('/addroles','backend\RoleController@addroles')->name('addroles');
    Route::post('/addrolessubmit','backend\RoleController@addrolessubmit')->name('addrolessubmit');

    // Admin appointments
    Route::get('/admin-appointments','backend\BlogController@allAppointments')->name('admin.appointments');

    // About Page Data #########
    Route::get('/about-page','backend\BlogController@editAboutPage')->name('editAboutPage');
    Route::post('/about-page','backend\BlogController@updateAboutPage')->name('updateAboutPage');
});
