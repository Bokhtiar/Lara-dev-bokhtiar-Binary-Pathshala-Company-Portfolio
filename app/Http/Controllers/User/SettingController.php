<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function term()
    {
        return view('user.setting.term');
    }

    public function policy()
    {
        return view('user.setting.policy');
    }
}
