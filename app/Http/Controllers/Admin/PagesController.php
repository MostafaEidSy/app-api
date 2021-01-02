<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PagesRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $pages = Page::with(['user'])->get();
        return view('admin.pages.index', compact('pages'));
    }
    public function create(){
        return view('admin.pages.create');
    }
    public function story(PagesRequest $request){
        $slug = $request->slug;
        $check = Page::where('slug', $slug)->first();
        $data = [];
        $data['admin_id'] = auth()->user()->id;
        $data['name'] = $request->name;
        $data['content'] = $request->content_articles;
        $data['status'] = $request->status;
        $data['slug'] = $request->slug;
        try {
            if($check){
                return redirect()->route('admin.pages.create')->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $post = Page::create($data);
                if ($post){
                    return redirect()->route('admin.pages.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.pages.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
                }
            }
        }catch (\Exception $e){
            return redirect()->route('admin.pages.index')->with(['msg' => 'There is an error in the server. Please try again later', 'status' => 'danger']);
        }
    }
    public function edit($id){
        $pages = Page::where('id', $id)->first();
        if ($pages){
            return view('admin.pages.edit', compact('pages'));
        }else{
            return redirect()->route('admin.pages.index')->with(['msg' => 'Sorry, the requested page does not exist', 'status' => 'danger']);
        }
    }
    public function update(PagesRequest $request){
        $id = $request->id;
        $data = [];
        $page = Page::where('id', $id)->first();
        $check = Page::where('id', '!=', $id)->whereSlug($request->slug)->first();
        if($page){
            if($check){
                return redirect()->route('admin.pages.edit', ['id' => $id])->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $data['name'] = $request->name;
                $data['content'] = $request->content_articles;
                $data['status'] = $request->status;
                $data['slug'] = $request->slug;
                $update = $page->update($data);
                if ($update){
                    return redirect()->route('admin.pages.index')->with(['msg' => 'The page has been successfully updated', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.pages.index')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
                }
            }
        }else{
            return redirect()->route('admin.pages.index')->with(['msg' => 'Sorry, the requested article does not exist', 'status' => 'danger']);
        }
    }
    public function delete($id){
        $check = Page::where('id', $id)->first();
        if($check){
            $deleted = $check->delete();
            if($deleted) {
                return redirect()->route('admin.pages.index')->with(['msg' => 'Page has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.pages.index')->with(['msg' => 'Sorry, something went wrong while deleting the page, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.pages.index')->with(['msg' => 'Sorry, the requested page does not exist', 'status' => 'danger']);
        }
    }
}
