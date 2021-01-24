<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MessageRoom extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'room_name',
    ];
    
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
