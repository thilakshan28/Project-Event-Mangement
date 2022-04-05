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

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');



Route::group(['prefix' => 'users',], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/create','UserController@create')->name('user.create');
    Route::post('/store','UserController@store')->name('user.store');

    Route::group(['prefix' => '{user}'], function () {
    Route::get('/show','UserController@show')->name('user.show');
    Route::get('/edit','UserController@edit')->name('user.edit');
    Route::patch('/','Usercontroller@update')->name('user.update');
    Route::get('/delete','UserController@delete')->name('user.delete');
    Route::delete('/','UserController@destroy')->name('user.destroy');

    });
});


Route::group(['prefix' => 'customers',], function () {
    Route::get('/', 'CustomerController@index')->name('customer.index');


    Route::group(['prefix' => '{customer}'], function () {
    Route::get('/show','CustomerController@show')->name('customer.show');
    Route::get('/edit','CustomerController@edit')->name('customer.edit');
    Route::patch('/','CustomerController@update')->name('customer.update');
    Route::get('/delete','CustomerController@delete')->name('customer.delete');
    Route::delete('/','CustomerController@destroy')->name('customer.destroy');

    });
});

Route::group(['prefix' => 'events',], function () {
    Route::get('/', 'EventController@index')->name('event.index');
    Route::get('/create','EventController@create')->name('event.create');
    Route::post('/store','EventController@store')->name('event.store');

    Route::group(['prefix' => '{event}'], function () {
    Route::get('/show','EventController@show')->name('event.show');
    Route::get('/edit','EventController@edit')->name('event.edit');
    Route::patch('/','EventController@update')->name('event.update');
    Route::post('/add', 'EventController@add')->name('event.add');
    Route::get('/delete','EventController@delete')->name('event.delete');
    Route::delete('/','EventController@destroy')->name('event.destroy');

    });
});


Route::group(['prefix' => 'travels',], function () {
    Route::get('/', 'TravelController@index')->name('travel.index');
    Route::get('/create','TravelController@create')->name('travel.create');
    Route::post('/store','TravelController@store')->name('travel.store');

    Route::group(['prefix' => '{travel}'], function () {
    Route::get('/edit','TravelController@edit')->name('travel.edit');
    Route::patch('/','TravelController@update')->name('travel.update');
    Route::get('/delete','TravelController@delete')->name('travel.delete');
    Route::delete('/','TravelController@destroy')->name('travel.destroy');

    });
});

Route::group(['prefix' => 'parkings',], function () {
    Route::get('/', 'ParkingController@index')->name('parking.index');
    Route::get('/create','ParkingController@create')->name('parking.create');
    Route::post('/store','ParkingController@store')->name('parking.store');

    Route::group(['prefix' => '{parking}'], function () {
    Route::get('/show','ParkingController@show')->name('parking.show');
    Route::get('/edit','ParkingController@edit')->name('parking.edit');
    Route::patch('/','ParkingController@update')->name('parking.update');
    Route::get('/delete','ParkingController@delete')->name('parking.delete');
    Route::delete('/','ParkingController@destroy')->name('parking.destroy');

    });
});


Route::group(['prefix' => 'venues',], function () {
    Route::get('/', 'VenueController@index')->name('venue.index');
    Route::get('/create','VenueController@create')->name('venue.create');
    Route::post('/store','VenueController@store')->name('venue.store');

    Route::group(['prefix' => '{venue}'], function () {
    Route::get('/show','VenueController@show')->name('venue.show');
    Route::get('/edit','VenueController@edit')->name('venue.edit');
    Route::patch('/','VenueController@update')->name('venue.update');
    Route::get('/delete','VenueController@delete')->name('venue.delete');
    Route::delete('/','VenueController@destroy')->name('venue.destroy');

    });
});

Route::group(['prefix' => 'foods',], function () {
    Route::get('/', 'MealController@index')->name('food.index');
    Route::get('/create','MealController@create')->name('food.create');
    Route::post('/store','MealController@store')->name('food.store');

    Route::group(['prefix' => '{food}'], function () {
    Route::get('/show','MealController@show')->name('food.show');
    Route::get('/edit','MealController@edit')->name('food.edit');
    Route::patch('/','MealController@update')->name('food.update');
    Route::get('/delete','MealController@delete')->name('food.delete');
    Route::delete('/','MealController@destroy')->name('food.destroy');

    });
});



Route::group(['prefix' => 'facilities',], function () {
    Route::get('/', 'FacilityController@index')->name('facility.index');
    Route::get('/create','FacilityController@create')->name('facility.create');
    Route::post('/store','FacilityController@store')->name('facility.store');

    Route::group(['prefix' => '{facility}'], function () {
    Route::get('/show','FacilityController@show')->name('facility.show');
    Route::get('/edit','FacilityController@edit')->name('facility.edit');
    Route::patch('/','FacilityController@update')->name('facility.update');
    Route::get('/delete','FacilityController@delete')->name('facility.delete');
    Route::delete('/','FacilityController@destroy')->name('facility.destroy');

    });
});

Route::group(['prefix' => 'orders',], function () {
    Route::get('/', 'OrderController@index')->name('order.index');
    Route::get('/create','OrderController@create')->name('order.create');
    Route::get('ajaxRequest','OrderController@dropdown')->name('get.parking');
    Route::post('/store','OrderController@store')->name('order.store');

    Route::group(['prefix' => '{order}'], function () {
    Route::get('/show','OrderController@show')->name('order.show');
    Route::get('/change','OrderController@change')->name('order.change');
    Route::post('/change/update','OrderController@changeupdate')->name('order.change.update');
    Route::get('/edit','OrderController@edit')->name('order.edit');
    Route::patch('/','OrderController@update')->name('order.update');
    Route::get('/delete','OrderController@delete')->name('order.delete');
    Route::delete('/','OrderController@destroy')->name('order.destroy');

    });
});

Route::group(['prefix' => 'reports'], function() {
    Route::get('/event','ReportController@event')->name('report.event');
});


});






require __DIR__.'/auth.php';
