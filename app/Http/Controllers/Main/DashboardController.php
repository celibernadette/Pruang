<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('main.dashboard');
    }
}
