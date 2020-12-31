<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\Thread;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $threads = Thread::with(['details'])->get();
        $experts = Expert::all();
        return view('site.home.index', compact('threads', 'experts'));
    }
    public function getLogin(){
        return view('site.home.login');
    }
    public function getRegister(){
        return view('site.home.register');
    }
}
