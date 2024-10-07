<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function () {

    // Route::post('login', 'AuthController@login'); // == Login ==
    // Route::post('register', 'AuthController@register'); // == register ==


    // Get Public Data
    Route::get('space/type', 'GetController@get_space_type'); // == get space type==
    Route::get('states', 'GetController@get_state'); // == get all State ==
    Route::get('state/{id}/cities', 'GetController@get_cities'); // == get all cities by state id ==

    // parcels
    Route::get('parcels/catigories', 'GetController@get_parcels_category'); // == get space type==
    Route::get('parcels/type', 'GetController@get_parcels_type'); // == get space type==
    Route::post('parcels', 'GetController@get_parcels'); // == get all parcels ==
    Route::get('parcels/{id}', 'GetController@get_parcels_by_id'); // == get parcel by id ==

    // houses
    Route::post('houses', 'GetController@get_houses'); // == get all houses ==
    Route::get('houses/{id}', 'GetController@get_houses_by_id'); // == get parcel by id ==

    // apartments
    Route::post('apartments', 'GetController@get_apartments'); // == get all apartments ==
    Route::get('apartments/{id}', 'GetController@get_apartments_by_id'); // == get parcel by id ==

    // hotels
    Route::post('hotels', 'GetController@get_hotels'); // == get all hotels ==
    Route::get('hotels/{id}', 'GetController@get_hotels_by_id'); // == get hotels by id ==

    // for company
    Route::get('ads', 'GetController@get_all_ads'); // == get ads==
    Route::get('company/profile', 'GetController@get_company_profile'); // == get company Profile==
    Route::get('agent', 'GetController@get_agent_count'); // == get company Profile==





    // For Authentication
    // Route::get('profile', 'AuthController@get_profile')->middleware('auth:api');
    // Route::post('profile', 'AuthController@edit_profile')->middleware('auth:api');
    Route::get('payment_data', 'GetController@payment_data')->middleware('auth:api'); // == get payment data ==
    Route::post('payment', 'PostController@payment')->middleware('auth:api'); // == post payment  ==


    // Route::group(['middleware' => ['auth:api', 'status', 'expired']], function () {

        // For Parcel
        Route::get('parcel/index', 'ParcelController@index_parcels'); // == all  his Parcel  ==
        Route::post('parcel/create', 'ParcelController@create_parcels'); // == create Parcel ==
        Route::post('parcel/{id}/edit', 'ParcelController@edit_parcels'); // == edit Parcel ==
        Route::get('parcel/{id}/show', 'ParcelController@show_parcels'); // == show Parcel ==
        Route::delete('parcel/{id}/delete', 'ParcelController@delete_parcels'); // == delete  Parcel ==

        // For house
        // Route::get('house/index', 'HouseController@index_house'); // == all  his house  ==
        Route::post('house/create', 'HouseController@create_house'); // == create house ==
        Route::post('house/{id}/edit', 'HouseController@edit_house'); // == edit house ==
        Route::get('house/{id}/show', 'HouseController@show_house'); // == show house ==
        Route::delete('house/{id}/delete', 'HouseController@delete_house'); // == delete  house ==

        // For apartment
        // Route::get('apartment/index', 'ApartmentController@index_apartment'); // == all  his apartment  ==
        Route::post('apartment/create', 'ApartmentController@create_apartment'); // == create apartment ==
        Route::post('apartment/{id}/edit', 'ApartmentController@edit_apartment'); // == edit apartment ==
        Route::get('apartment/{id}/show', 'ApartmentController@show_apartment'); // == show apartment ==
        Route::delete('apartment/{id}/delete', 'ApartmentController@delete_apartment'); // == delete  apartment ==

        // For hotels
        // Route::get('hotel/index', 'HotelController@index_hotels'); // == all  his hotels  ==
        Route::post('hotel/create', 'HotelController@create_hotels'); // == create hotels ==
        Route::post('hotel/{id}/edit', 'HotelController@edit_hotels'); // == edit hotels ==
        Route::get('hotel/{id}/show', 'HotelController@show_hotels'); // == show hotels ==
        Route::delete('hotel/{id}/delete', 'HotelController@delete_hotels'); // == delete  hotels ==

    // });



    // Route::group(
    //     [
    //         'prefix' => LaravelLocalization::setLocale(),
    //         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    //     ],
    //     function () {
    //         // == This routes user must be logged in ==
    //         Route::group(['middleware' => ['auth:api']], function () {
    //         });
    //     }
    // );
});
