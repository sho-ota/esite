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

// MEMO: トップページにアクセスされたら、welcome.blade.phpを表示するという記述

Route::get('/', function () {
    return view('welcome');
});


// 利用者
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false
    ]);
    

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        
        Route::resource('user/attendance', 'Auth\AttendanceController');
        /*
        Route::group(['prefix' => '/{id}'], function () {
            Route::show('user/attendance', 'Auth\AttendanceController')->name('user.attendance.show');
            Route::update('user/attendance', 'Auth\AttendanceController')->name('user.attendance.update');
        });
        */
    });
});

// スタッフ
Route::namespace('Staff')->prefix('staff')->name('staff.')->group(function () {

    // ログイン認証関連
    
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false
    ]);
    

    // ログイン認証後
    Route::middleware('auth:staff')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        
        
        //   /staff/staffsでスタッフ一覧を表示
        Route::get('staffs', 'Auth\StaffsController@index')->name('staffs.index');
        //   /staff/usersで利用者一覧を表示
        Route::get('users', 'Auth\UsersController@index')->name('users.index');
        
        //   /staff/staffs/createでスタッフ作成フォーム画面を表示
        Route::get('staffs/create', 'Auth\StaffsController@create')->name('staffs.create');
        Route::post('staffs/store', 'Auth\StaffsController@store')->name('staffs.store');
        //   /staff/users/createで利用者作成フォーム画面を表示
        Route::get('users/create', 'Auth\UsersController@create')->name('users.create');
        Route::post('users/store', 'Auth\UsersController@store')->name('users.store');
        
        
        Route::name('user.')->group(function () {
            // 利用者出欠確認表新規作成
            Route::resource('user/attendances', 'Auth\AttendanceController');
        });
        
                    /*
                    Route::get('users/attendance/create', 'Auth\AttendanceController@create')->name('users.attendance.create');
                    Route::post('users/attendance/store', 'Auth\AttendanceController@store')->name('users.attendance.store');
                    */      
        // TODO: やること
        // 1. larave/uiをいれる
        // 2. StaffsControllerとUsersControllerを作成する
        // 2のコントローラーにindexとcreate、storeアクションを実装して、処理を記述する
    });

});