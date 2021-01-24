<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'account_type', 'content',
    ];
    
    
    public function message_room()
    {
        return $this->belongsTo(MessageRoom::class);
    }
    
    
    public function staff_messages()
    {
        return $this->belongsToMany(Staff::class, 'staff_messages', 'message_id', 'staff_id')->withTimestamps();
    }
    
    
     public function user_messages()
    {
        return $this->belongsToMany(User::class, 'user_messages', 'message_id', 'user_id')->withTimestamps();
    }
}
