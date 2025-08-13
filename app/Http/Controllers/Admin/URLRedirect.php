<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class URLRedirect extends Controller
{
    /**
     * Display the URL redirect management page.
     */
    public function index()
    {
        return view('admin.url-redirect');
    }
}
