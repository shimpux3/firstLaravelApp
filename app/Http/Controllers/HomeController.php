<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {
        dd($request->all());
    }

    public function roles()
    {
        $service = new UserService();
        dd($service->roles());
    }
}
