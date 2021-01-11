<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMessage extends Model
{
    protected $fillable = ['content'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    
    public function message_for_users()
    {
        return $this->belongsToMany(User::class, 'staff_message_for_users', 'staff_message_id', 'user_id')->withTimestamps();
    }
    
    public function sent_message_for_user($userId)
    {
        $this->message_for_users()->attach($userId);
        return true;
    }
}
