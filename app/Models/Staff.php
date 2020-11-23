<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;


/**
     * モデルと関連しているテーブル
     *
     * @var string
     */
//Laravelテーブル名をstaffではなくstaffsとして認識して！
    protected $table = 'staffs';
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    
    protected $fillable = [
        'last_name', 'first_name', 'last_name_hiragana', 'first_name_hiragana', 'email', 'password',
    ];
    
    /*
    protected $fillable = [
        'name', 'email', 'password',
    ];
    */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
