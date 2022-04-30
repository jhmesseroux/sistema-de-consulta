<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    //
    public function index()
    {
        return view('user.setting');
    }
}