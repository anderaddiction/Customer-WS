<?php

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Unique Code
function uniqueString()
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 500);
}

function getRandomString()
{
    $session_time = Carbon::now();
    $time = $session_time->format('y_m_d_h_m');
    $email = Auth::user()->email;
    $token_structure  = $time . $email;
    $characters     = $token_structure;
    $randomString     = "";

    for ($i = 0; $i < 40; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
