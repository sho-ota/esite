<?php

Route::get('/', function () {
    return view('welcome');
});



//-----------利用者-----------------------------------------------------------------------
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    //ログイン認証関連
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false
    ]);

    //ログイン認証後
    Route::middleware('auth:user')->group(function () {
        Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::resource('user/attendance', 'Auth\AttendanceController', ['only' => ['show', 'update']]);
        Route::resource('room/{id}/messages', 'Auth\MessageController', ['only' => ['index', 'store', 'destroy']]);
    });
});




//-----------スタッフ----------------------------------------------------------------------
Route::namespace('Staff')->prefix('staff')->name('staff.')->group(function () {

    //ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);
    
    //ログイン認証後
    Route::middleware('auth:staff')->group(function () {
        Route::resource('home', 'HomeController', ['only' => 'index']);
        
        Route::get('staffs', 'Auth\StaffsController@index')->name('staffs.index');
        Route::get('staffs/create', 'Auth\StaffsController@create')->name('staffs.create');
        Route::post('staffs/store', 'Auth\StaffsController@store')->name('staffs.store');
        Route::get('staffs/{id}/edit', 'Auth\StaffsController@edit')->name('staffs.edit');
        Route::put('staffs/{id}/update', 'Auth\StaffsController@update')->name('staffs.update');
        Route::get('staffs/{id}/destroy_show', 'Auth\StaffsController@destroy_show')->name('staffs.destroy_show');
        Route::delete('staffs/{id}/destroy', 'Auth\StaffsController@destroy')->name('staffs.destroy');
        
        Route::get('users', 'Auth\UsersController@index')->name('users.index');
        Route::get('users/create', 'Auth\UsersController@create')->name('users.create');
        Route::post('users/store', 'Auth\UsersController@store')->name('users.store');
        Route::get('users/{id}/edit', 'Auth\UsersController@edit')->name('users.edit');
        Route::put('users/{id}/update', 'Auth\UsersController@update')->name('users.update');
        Route::get('users/{id}/show', 'Auth\UsersController@show')->name('users.show');
        Route::get('users/{id}/destroy_show', 'Auth\UsersController@destroy_show')->name('users.destroy_show');
        Route::delete('users/{id}/destroy', 'Auth\UsersController@destroy')->name('users.destroy');
        
        Route::resource('room/{id}/messages', 'Auth\MessageController', ['only' => ['store', 'destroy']]);
        
        Route::get('calendar', 'Auth\CalendarController@show')->name('calendar');;
        
        Route::name('user.')->group(function () {
            Route::resource('user/attendances', 'Auth\AttendanceController', ['only' => ['store', 'index', 'destroy']]);
        });
    });
});