<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GenralController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function logout(){
        auth('admin')->logout();
        return redirect()->route('admin.getLogin');
    }
    public function profile(){
        $id = auth()->user()->id;
        $user = Admin::where('id', $id)->first();
        if ($user){
            return view('admin.profile', compact('user'));
        }else{
            return redirect()->route('admin.dashboard')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
        }
    }
    public function update(Request $request){
        $request->validate([
            'name'          => 'required|min:5',
            'email'         => 'required|email',
            'password'      => 'nullable|min:8',
            'avatar'        => 'nullable|image|mimes:png,jpg,gif',
        ]);
        $id = auth()->user()->id;
        $check = Admin::where('id', '!=', $id)->whereEmail($request->email)->first();
        $user = Admin::where('id', $id)->first();
        if($check){
            return redirect()->route('admin.profile')->with(['msg' => 'Sorry, email already exists', 'status' => 'danger']);
        }else{
            if($user){
                $data = [];
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                if ($request->password != null){
                    $data['password'] = $request->password;
                }
                if($request->avatar != '' || $request->avatar != null){
                    if ($user->avatar != '' || $user->avatar != null){
                        if (File::exists('/uploads/avatar/' . $user->avatar)){
                            unlink('/uploads/avatar/' . $user->avatar);
                        }
                    }
                    $image = $request->file('avatar');
                    $filename = Str::slug('admin_' . $request->name . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                    $path = public_path('/uploads/avatar/' . $filename);
                    Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, 100);
                    $data['avatar'] = $filename;
                }
                $update = $user->update($data);
                if ($update){
                    return redirect()->route('admin.dashboard')->with(['msg' => 'Edit Profile successfully', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.dashboard')->with(['msg' => 'Failed to Edit Profile', 'status' => 'danger']);
                }
            }else{
                return redirect()->route('admin.dashboard')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
            }
        }
    }
}
