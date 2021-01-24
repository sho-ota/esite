<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'last_name', 'first_name', 'last_name_hiragana', 'first_name_hiragana', 'email', 'password',
    ];
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    
    
    public function user_messages()
    {
        return $this->belongsToMany(Message::class, 'user_messages', 'user_id', 'message_id')->withTimestamps();
    }
    
    
    public function sent_user_messages($messagesId)
    {
        $this->user_messages()->attach($messagesId);
        return true;
    }
}
