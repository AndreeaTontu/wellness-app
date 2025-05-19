<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        // Display the log in form to the admin user
        return view('admin.index');
    }
}
