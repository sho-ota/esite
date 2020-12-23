<?php

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
        'register' => true,
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

        //利用者アカウント編集＆削除関連
        Route::get('users/{id}/edit', 'Auth\UsersController@edit')->name('users.edit');
        Route::put('users/{id}/update', 'Auth\UsersController@update')->name('users.update');
        Route::delete('users/{id}/destroy', 'Auth\UsersController@destroy')->name('users.destroy');
        
        //スタッフアカウント編集＆削除関連
        Route::get('staffs/{id}/edit', 'Auth\StaffsController@edit')->name('staffs.edit');
        Route::put('staffs/{id}/update', 'Auth\StaffsController@update')->name('staffs.update');
        Route::delete('staffs/{id}/destroy', 'Auth\StaffsController@destroy')->name('staffs.destroy');
        
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