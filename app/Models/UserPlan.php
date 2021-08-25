<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
