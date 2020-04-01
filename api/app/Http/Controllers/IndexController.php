<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class IndexController extends Controller
{
    public function index()
    {
        return response()->view('index');
    }
}
