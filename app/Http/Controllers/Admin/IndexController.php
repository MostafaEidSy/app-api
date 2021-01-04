<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function login(LoginRequest $request){
        $remember_me = $request->has('remember_token') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.getLogin')->with(
            [
                'message' => 'There Is An Error In The Data',
                'alert-type' => 'danger'
            ]
        );
    }
    public function dashboard(){
        return view('admin.index');
    }
    public function logout(){
        auth('admin')->logout();
        return redirect()->route('admin.getLogin');
    }
}
