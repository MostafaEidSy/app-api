<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\RegisterRequest;
use App\Models\Expert;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public $loginAfterSignUp = true;
    public function index(){
        $threads = Thread::with(['details'])->get();
        $experts = Expert::all();
        return view('site.home.index', compact('threads', 'experts'));
    }
    public function getLogin(){
        return view('site.home.login');
    }
    public function login(LoginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->attempt(['username' => $request->input("username"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('home.dashboard.mastermind');
        }
        return redirect()->route('home.getLogin')->with(
            [
                'message' => 'There Is An Error In The Data',
                'alert-type' => 'danger'
            ]
        );
    }
    public function getRegister(){
        return view('site.home.register');
    }
    public function register(RegisterRequest $request){
        $data = [];
        $data['name'] = $request->fullName;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        if($user){
            if ($this->loginAfterSignUp){
                $remember_me = $request->has('remember_me') ? true : false;
                if (auth()->attempt(['username' => $request->input("username"), 'password' => $request->input("password")], $remember_me)) {
                    return redirect()->route('home.dashboard.mastermind');
                }else{
                    return redirect()->route('home.index');
                }
            }else{
                return redirect()->route('home.getLogin');
            }
        }else{
            return redirect()->route('home.getRegister')->with(
                [
                    'message' => 'There Is An Error In The Data',
                    'alert-type' => 'danger'
                ]
            );
        }
    }
}
