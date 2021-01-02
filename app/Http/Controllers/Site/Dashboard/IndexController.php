<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function index(){
        return view('site.dashboard.index');
    }
    public function logout(){
        auth('web')->logout();
        return redirect()->route('home.index');
    }
    public function mastermind(){
        return view('site.dashboard.pages.mastermind');
    }
    public function services(){
        return view('site.dashboard.pages.services');
    }
    public function account(){
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('site.dashboard.pages.account', compact('user'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'name'          => 'required|min:5',
            'password'      => 'nullable|min:8',
            'username'      => 'required|min:5',
            'birthday'      => 'nullable|date',
            'avatar'        => 'nullable|image|mimes:png,jpg,gif'
        ]);
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        $check = User::where('id', '!=', $id)->whereUsername($request->username)->first();
        if ($check){
            return redirect()->route('home.dashboard.account')->with([
                'message' => 'Benutzername existiert bereits',
                'alert-type' => 'danger'
            ]);
        }else{
            $data = [];
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['birthday'] = $request->birthday;
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
                $filename = Str::slug($request->name . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/avatar/' . $filename);
                Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['avatar'] = $filename;
            }
            $update = $user->update($data);
            if($update){
                return redirect()->route('home.dashboard.account')->with([
                    'message' => 'Die Daten wurden erfolgreich aktualisiert',
                    'alert-type' => 'success'
                ]);
            }else{
                return redirect()->route('home.dashboard.account')->with([
                    'message' => 'Etwas ist schief gelaufen. Bitte versuche es erneut',
                    'alert-type' => 'danger'
                ]);
            }
        }
    }
    public function categorySlug($slug){
        $cate = Category::where('slug', $slug)->first();
        if($cate){
            return view('site.dashboard.pages.content', compact('cate'));
        }else{
            return redirect()->route('home.dashboard');
        }
    }
    public function subCategorySlug($category, $slug){
        $cate = SubCategories::where('slug', $slug)->first();
        if($cate){
            return view('site.dashboard.pages.content', compact('cate'));
        }else{
            return redirect()->route('home.dashboard');
        }
    }
}
