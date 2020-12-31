<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpertRequest;
use App\Models\Expert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ExpertController extends Controller
{
    public function index(){
        $experts = Expert::all();
        return view('admin.frontend.expert.index', compact('experts'));
    }
    public function create(){
        return view('admin.frontend.expert.create');
    }
    public function story(ExpertRequest $request){
        $data = [];
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->name . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/uploads/experts/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['image'] = $filename;
        }
        $expert = Expert::create($data);
        if($expert){
            return redirect()->route('admin.expert.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
        }else{
            return redirect()->route('admin.expert.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
        }
    }
    public function edit($id){
        $expert = Expert::where('id', $id)->first();
        if ($expert){
            return view('admin.frontend.expert.edit', compact('expert'));
        }else{
            return redirect()->route('admin.expert.index')->with(['msg' => 'Sorry, the requested Expert does not exist', 'status' => 'danger']);
        }
    }
    public function update(ExpertRequest $request){
        $id = $request->id;
        $expert = Expert::where('id', $id)->first();
        if($expert){
            $data = [];
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            if($request->file('image')){
                if ($expert->image != '' || $expert->image != null){
                    if (File::exists('/uploads/experts/' . $expert->image)){
                        unlink('/uploads/experts/' . $expert->image);
                    }
                }
                $image = $request->file('image');
                $filename = Str::slug($request->name . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/experts/' . $filename);
                Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['image'] = $filename;
            }
            $update = $expert->update($data);
            if($update){
                return redirect()->route('admin.expert.index')->with(['msg' => 'Edit Expert successfully', 'status' => 'success']);
            }else{
                return redirect()->route('admin.expert.index')->with(['msg' => 'Failed to Edit data', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.expert.index')->with(['msg' => 'Sorry, the requested Expert does not exist', 'status' => 'danger']);
        }
    }
    public function delete($id){
        $expert = Expert::where('id', $id)->first();
        if ($expert){
            $check = $expert->delete();
            if($check){
                return redirect()->route('admin.expert.index')->with(['msg' => 'Expert has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.expert.index')->with(['msg' => 'Sorry, something went wrong while deleting the Expert, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.expert.index')->with(['msg' => 'Sorry, the requested Expert does not exist', 'status' => 'danger']);
        }
    }
}
