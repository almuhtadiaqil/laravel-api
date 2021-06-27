<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function getData()
    {
        return [
            'name' => 'aqil',
            'email' => 'almuhtadiaqil13@gmail.com',
            'number' => '083101679036',
        ];
    }
}
