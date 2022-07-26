<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //
    public function setCookie(Request $request)
    {
        $minute = 1;
        $response = new Response('Hai Rad');
        $response->withCookie(cookie('name', 'radit', $minute));
        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        echo $value;
    }
}
