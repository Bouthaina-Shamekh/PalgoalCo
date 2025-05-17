<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function clients()
    {
        return view('dashboard.clients');
    }

     public function sites()
    {
        return view('dashboard.sites');
    }

    public function subscriptions()
    {
        return view('dashboard.subscriptions');
    }
}
