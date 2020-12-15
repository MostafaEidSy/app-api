<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function createUser(){
        return view('admin.users.create');
    }
    public function storyUser(CreateUserRequest $request){
        try {
            $data = [];
            $data['name']       = $request->name;
            $data['email']      = $request->email;
            $data['password']   = bcrypt($request->password);
            $user = User::create($data);
            if ($user){
                return redirect()->route('admin.users.index');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }catch(\Exception $e){
            return redirect()->route('admin.users.create');
        }
    }
}
