<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
            $data['birthday']   = $request->birthday;
            $data['username']   = $request->username;
            if ($request->file('avatar')) {
                $image = $request->file('avatar');
                $filename = Str::slug($request->name . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/avatar/' . $filename);
                Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['avatar'] = $filename;
            }
            $user = User::create($data);
            if ($user){
                return redirect()->route('admin.users.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
            }else{
                return redirect()->route('admin.users.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
            }
        }catch(\Exception $e){
            return redirect()->route('admin.users.index')->with(['msg' => 'There is an error in the server. Please try again later', 'status' => 'danger']);
        }
    }
    public function edit($id){
        $user = User::where('id', $id)->first();
        if($user){
            return view('admin.users.edit', compact('user'));
        }else{
            return redirect()->route('admin.users.index')->with(['msg' => 'Sorry, the requested user does not exist', 'status' => 'danger']);
        }
    }
    public function update(Request $request){
        $request->validate([
            'name'          => 'required|min:5',
            'email'         => 'required|email',
            'password'      => 'nullable|min:8',
            'birthday'      => 'nullable|date',
            'avatar'        => 'nullable|image|mimes:png,jpg,gif',
            'username'      => 'required|min:5'
        ]);
        $id = $request->id;
        $check = User::where('id', $id)->first();
        $username = User::where('id', '!=', $id)->whereUsername($request->username)->first();
        if ($check){
            if($username){
                return redirect()->route('admin.users.edit', ['id' => $id])->with(['msg' => 'Username Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $data = [];
                $data['name'] = $request->name;
                $data['username'] = $request->username;
                $data['email'] = $request->email;
                $data['birthday'] = $request->birthday;
                if ($request->password != null){
                    $data['password'] = $request->password;
                }
                if($request->avatar != '' || $request->avatar != null){
                    if ($check->avatar != '' || $check->avatar != null){
                        if (File::exists('/uploads/avatar/' . $check->avatar)){
                            unlink('/uploads/avatar/' . $check->avatar);
                        }
                    }
                    $image = $request->file('avatar');
                    $filename = Str::slug($request->name . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                    $path = public_path('/uploads/avatar/' . $filename);
                    Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, 100);
                    $data['avatar'] = $filename;
                }
                $update = $check->update($data);
                if ($update){
                    return redirect()->route('admin.users.index')->with(['msg' => 'Edit User successfully', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.users.index')->with(['msg' => 'Failed to Edit data', 'status' => 'danger']);
                }
            }
        }else{
            return redirect()->route('admin.users.index')->with(['msg' => 'Sorry, the requested user does not exist', 'status' => 'danger']);
        }
    }
    public function delete($id){
        $user = User::where('id', $id)->first();
        if ($user){
            $check = $user->delete();
            if ($check){
                return redirect()->route('admin.users.index')->with(['msg' => 'User has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.users.index')->with(['msg' => 'Sorry, something went wrong while deleting the User, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.users.index')->with(['msg' => 'Sorry, the requested user does not exist', 'status' => 'danger']);
        }
    }
}
