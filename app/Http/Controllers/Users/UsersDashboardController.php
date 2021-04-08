<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersDashboardController extends Controller
{
    public function render()
    {
        return view('users.user-dashboard');
    }
}
