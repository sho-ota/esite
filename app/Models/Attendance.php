<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['what_day','select'];
    
    
    //この出欠確認データを有する利用者
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
