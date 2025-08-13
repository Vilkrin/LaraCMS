<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class URLShortener extends Controller
{
    /**
     * Display the URL shortener management page.
     */
    public function index()
    {
        return view('admin.url-short');
    }
}
