<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChartController extends Controller
{
    public function chart()
    {
        $suspect = collect(Http::get('https://api.kawalkorona.com/indonesia/provinsi')->json());
        dd($suspect);
    }
}
