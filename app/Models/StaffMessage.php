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
}
