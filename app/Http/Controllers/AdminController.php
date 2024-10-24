<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $breadcrumbsItems = [
            [
                'name' => 'Home',
                'url' => '/',
                'active' => true
            ],
        ];

        return view('admin.dashboard', [
            'pageTitle' => 'Dashboard',
            'breadcrumbItems' => $breadcrumbsItems
        ]);
    }
}
