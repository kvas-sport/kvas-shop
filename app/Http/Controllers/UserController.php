<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('users.profile');
    }

    public function admin(): View
    {
        return view('users.admin');
    }
}
