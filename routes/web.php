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

// Public Routes
Route::group( [ 'middleware' => 'guest' ], function (){
    Route::get( '/', 'PublicController@index' )
        ->name( 'home' );

    Route::get( '/privacy-policy', 'PublicController@privacyPolicy' )
        ->name( 'privacy-policy' );
    Route::get( '/terms-of-use', 'PublicController@termsOfUse' )
        ->name( 'terms-of-use' );

    // Authentication Routes
    Route::get( 'login', 'Auth\LoginController@showLoginForm' )
        ->name( 'login' );
    Route::post( 'login', 'Auth\LoginController@login' );
    Route::get( 'logout', 'Auth\LoginController@logout' )
        ->name( 'logout' );

    // Registration Routes
    // Route::get( 'register', 'Auth\RegisterController@showRegistrationForm' )->name( 'register' );
    // Route::post( 'register', 'Auth\RegisterController@register' );

    // Password Reset Routes
    Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' );
    Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm' );

    Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail' );
    Route::post( 'password/reset', 'Auth\ResetPasswordController@reset' );
} );

//Secure Routes
Route::group( [ 'middleware' => 'auth' ], function (){
    Route::get( '/dashboard', 'SecureController@dashboard' )
        ->name( 'dashboard' );

    // User
    Route::get( '/profile', 'UserController@view' )
        ->name( 'profile' );
    Route::get( '/profile/updatePassword', 'UserController@view_update_password' )
        ->name( 'profile.password.reset' );

    Route::put( '/users/updatePassword', 'UserController@update_password' );
    Route::put( '/users/{user_id}', 'UserController@update' );
} );

//Auth::routes();