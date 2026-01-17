<?php

namespace App\Http\Controllers;

class AdvertisingController extends Controller
{
    /**
     * Display the advertising page.
     */
    public function index()
    {
        return view('advertising.index');
    }
}
