<?php

namespace App\Core;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class Setsettings{
    public function get()
    {
        $settings = Setting::all();
        $data = new \StdClass();


        foreach($settings as $row)
        {
            $value = json_decode($row->value);

            $data->{$row->key} = empty($value) ? $row->value : $value;

        }

        return $data;
    }
}
