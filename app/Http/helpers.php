<?php

// App\Models\Setting;

function set($code = null)
{
    $option = DB::table('settings')->where('name', $code)->first();
    return $option->value;
}

