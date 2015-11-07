<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function test() {
        return config('database.default');
    }
}
