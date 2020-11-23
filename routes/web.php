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
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

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
        
        // MEMO: ここでスタッフ追加や利用者追加の処理を担うコントローラーのアクションを呼び出す
        
        // Staff
        // MEMO: /staff/staffsでスタッフ一覧を表示
        // Route::get('staffs', 'StaffsController@index');
        // MEMO: /staff/staffs/createでスタッフ作成フォーム画面を表示
        // Route::get('staffs/create', 'StaffsController@create');
        
        // User
        // MEMO: /staff/usersでスタッフ一覧を表示
        // Route::get('users', 'UsersController@index');
        // MEMO: /staff/users/createでスタッフ作成フォーム画面を表示
        // Route::get('users/create', 'UsersController@create');
        
        // TODO: やること
        // 1. larave/uiをいれる
        // 2. StaffsControllerとUsersControllerを作成する
        // 2のコントローラーにindexとcreate、storeアクションを実装して、処理を記述する
    });

});
