<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('web.login.index', ['login_url' => route('login')]);
    }
}
