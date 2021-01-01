<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;


    protected $table = 'staffs';
    
    
    protected $fillable = [
        'last_name', 'first_name', 'last_name_hiragana', 'first_name_hiragana', 'email', 'password',
    ];
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function staff_messages()
    {
        return $this->hasMany(StaffMessage::class);
    }
    
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('staff_messages');
    }
    
}
