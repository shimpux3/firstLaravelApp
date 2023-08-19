<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    public function index()
    {
        //dd(Hash::make('welcome'));
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator->errors());
        }
       // dd(Hash::make('welcome123'));
        $email = $request->email;
        $password = $request->password;



        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('home');
        } else {
            return redirect('login');
        }
    }

    public function roles()
    {
        $service = new UserService();
        dd($service->roles());
    }

    public function viewHome()
    {
        return view('dashboard');
    }

    public function logout()
    {
        \request()->session()->flush();
        return redirect('login');
    }

    public function viewChangePassword()
    {
        return redirect('view_change_password');
    }

    public function changePassword(Request $request)
    {
        dd($request->all());
    }
}
