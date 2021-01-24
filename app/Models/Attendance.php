<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['what_day','select'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
