<?php


namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait UserTrait {
    function isAdmin()
    {
        if(Auth::user()->is_admin == 1)
        {
            return true;
        }

        return false;
    }
}
