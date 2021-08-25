<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded =[];

    function user()
    {
        return $this->hasOne(User::class,'user_plans');
    }

    function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
