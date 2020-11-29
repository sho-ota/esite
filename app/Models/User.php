<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
    
    
    //この利用者が持つ出欠確認結果
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    
}
