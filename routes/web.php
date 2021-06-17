<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//middleware
Route::group(['middleware' =>['auth']],function(){

//Category Controller
Route::get('admin','CategoryController@create');
Route::post('admin/insert','CategoryController@save');
Route::get('admin/category','CategoryController@display');
Route::get('admin/edit/{id}','CategoryController@edit');
Route::post('admin/update','CategoryController@update');
Route::get('admin/delete/{id}','CategoryController@delete');

//Courses Controller

Route::get('admin/courses','CoursesController@create');
Route::post('admin/courses/save','CoursesController@save');
Route::get('admin/courses','CoursesController@display');
Route::get('admin/course_edit/{id}','CoursesController@edit');
Route::post('admin/course/update','CoursesController@update');
Route::get('admin/course/delete/{id}','CoursesController@delete');

//Banner Controller

Route::get('admin/banner','BannerController@create');
Route::post('admin/banner/save','BannerController@save');
Route::get('admin/banner','BannerController@display');
Route::get('admin/banner_edit/{id}','BannerController@edit');
Route::post('admin/banner/update','BannerController@update');
Route::get('admin/banner/delete/{id}','BannerController@delete');

//Team controller

Route::get('admin/our_team','TeamController@create');
Route::post('admin/save','TeamController@save');
Route::get('admin/our_team','TeamController@display');
Route::get('admin/team_edit/{id}','TeamController@edit');
Route::post('admin/team/update','TeamController@update');
Route::get('admin/team_delete/{id}','TeamController@delete');

//PlacementController

Route::get('admin/placement','PlacementController@create');
Route::post('admin/p_save','PlacementController@save');
Route::get('admin/placement','PlacementController@display');
Route::get('admin/placement_edit/{id}','PlacementController@edit');
Route::post('admin/placement/update','PlacementController@update');
Route::get('admin/placement_delete/{id}','PlacementController@delete');

//InternController

Route::get('admin/intern','InternController@create');
Route::post('admin/i_save','InternController@save');
Route::get('admin/intern','InternController@display');
Route::get('admin/intern_edit/{id}','InternController@edit');
Route::post('admin/intern/update','InternController@update');
Route::get('admin/intern_delete/{id}','InternController@delete');

//contact controller

Route::get('admin/contact','ContactController@contact');
Route::post('admin/contact/save','ContactController@save');
Route::get('admin/contact','ContactController@display');
Route::get('admin/contact/edit/{id}','ContactController@edit');
Route::post('admin/contact/update','ContactController@update');
Route::get('admin/contact/delete/{id}','ContactController@delete');
Route::get('admin/contact_data','ContactController@contact_data');

//NotificationController

Route::get('admin/notification','NotificationController@notification');
Route::post('admin/notification/save','NotificationController@save');
Route::get('admin/notification','NotificationController@display');
Route::get('admin/notification/edit/{id}','NotificationController@edit');
Route::post('admin/notification/update','NotificationController@update');
Route::get('admin/notification/delete/{id}','NotificationController@delete');

//Coupon Controller

Route::get('admin/coupon','CouponController@coupon');
Route::post('admin/coupon/save','CouponController@save');
Route::get('admin/coupon','CouponController@display');
Route::get('admin/coupon/edit/{id}','CouponController@edit');
Route::post('admin/coupon/update','CouponController@update');
Route::get('admin/coupon/delete/{id}','CouponController@delete');

//workshop controller

Route::get('admin/workshop','WorkshopController@workshop');
Route::post('admin/workshop/save','WorkshopController@save');
Route::get('admin/workshop','WorkshopController@display');
Route::get('admin/workshop/edit/{id}','WorkshopController@edit');
Route::post('admin/workshop/update','WorkshopController@update');
Route::get('admin/workshop/delete/{id}','WorkshopController@delete');

Route::get('admin/course_order','AdminController@course_order');
Route::get('admin/invoice/{id}','AdminController@invoice');
Route::get('admin/view_order/{id}','AdminController@view_order');
Route::post('admin/update_order_status/{id}','AdminController@update_order_status');

});//middleware closed

//Frontend Controller

Route::get('/','FrontendController@create');
Route::post('front/insert','FrontendController@save');
Route::get('front/online_course','FrontendController@display');
Route::get('front/online_course_edit/{id}','FrontendController@edit');
Route::post('front/updatee','FrontendController@update');
Route::get('front/deletee/{id}','FrontendController@delete');
Route::get('front/signup','FrontendController@signup');
Route::post('front/signup_save','FrontendController@signup_save');
Route::get('front/login','FrontendController@login');
Route::post('front/login_save','FrontendController@login_save');
Route::get('front/our_team','FrontendController@our_team');
Route::get('front/interns','FrontendController@interns');
Route::get('front/placements','FrontendController@placements');
Route::get('front/contact','FrontendController@contact');
Route::post('front/add_contact','ContactFormController@save');
Route::get('front/checkout','FrontendController@checkout');

// Frontend Work Workshop

Route::get('front/MPCT','FrontendController@MPCT_workshop');
Route::get('front/Xiaomi','FrontendController@Xiaomi_workshop');
Route::get('front/Bentchair','FrontendController@Bentchair_workshop');
Route::get('front/RJIT','FrontendController@RJIT_workshop');

//add to cart

Route::get('front/cart','FrontendController@cart');
Route::post('add_cart','FrontendController@add_cart');
Route::get('cart/quantity_update/{id}/{course_quantity}','FrontendController@quantity_update');

//Navbar Controller

Route::get('front/navbar','NavbarController@create');
Route::post('front/save','NavbarController@save');
Route::get('front/navbar','NavbarController@display');
Route::get('front/navbar_edit/{id}','NavbarController@edit');
Route::post('front/update','NavbarController@update');
Route::get('front/delete/{id}','NavbarController@delete');

//course detail work (frontend)

Route::get('front/course_detail/{id}','CoursesController@course_detail');
Route::get('front/course_detail/{id}','FrontendController@course_detail');
Route::get('front/category/courses','FrontendController@courses_nav');
Route::get('front/category_course/{id}','FrontendController@category_course');

//course order route work 
Route::post('front/checkout/insert_order','CourseOrderController@insert');

//thanks route
Route::get('front/thanks','CourseOrderController@thanks');

//Google Login
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

//Facebook Login
Route::get('auth/facebook', 'FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'FacebookController@handleFacebookCallback');

//cache clear
Route::get('/clear', function() { 
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear'); 
        return "Cleared!"; 
    });

//payment gateway

Route::get('/payment','PaytmController@pay');
Route::post('/payment/status', 'PaytmController@paymentCallback');

//paytym route
Route::post('/paytm-callback', 'CourseOrderController@paytmCallback');

//search bar
Route::post('front/search','FrontendController@search_course');

//Coupan WorK
Route::post('front/apply-coupon','FrontendController@applyCoupon');

//cart remove route
Route::get('front/cart_remove/{id}','FrontendController@cart_remove');

//Rating Route Work
Route::post('front/review-rating/insert','FrontendController@insert_rating');

//forgot password
Route::get('front/forgot_password','Frontendcontroller@forgot_password');

//middleware
Route::group(['middleware' =>['auth']],function(){

//user order data
Route::get('front/profile/user_order_data/{user_id}','FrontendController@user_order_data');

//profile
Route::get('front/profile','FrontendController@profile');
Route::get('front/invoice/{id}','FrontendController@invoice');
Route::get('front/view_order/{id}','FrontendController@view_order');

});//middleware close













