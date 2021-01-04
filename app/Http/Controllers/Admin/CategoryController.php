<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with(['subCategory'])->get();
        $subCategories = SubCategories::with(['categories'])->get();
        return view('admin.category.index', compact('categories', 'subCategories'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }
    public function story(CategoryRequest $request){
        $slug = $request->slug;
        $check1 = Category::where('slug', $slug)->first();
        $check2 = SubCategories::where('slug', $slug)->first();
        $data = [];
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['status'] = $request->status;
        $data['description'] = $request->description;
        $data['content'] = $request->category_content;
        if ($request->parent != '0' || $request->parent != 0){
            if($check2){
                return redirect()->route('admin.category.create')->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $data['parent'] = $request->parent;
                $category = SubCategories::create($data);
                if($category){
                    return redirect()->route('admin.category.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.category.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
                }
            }
        }else{
            if($check1){
                return redirect()->route('admin.category.create')->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $category = Category::create($data);
                if($category){
                    return redirect()->route('admin.category.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.category.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
                }
            }
        }
    }
    public function editCategory($id){
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }
    public function editSubCategory($id){
        $category = SubCategories::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.category.edit-sub', compact('category', 'categories'));
    }
    public function update(Request $request){
        $id = $request->id;
        $slug = $request->slug;
        $data = [];
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['status'] = $request->status;
        $data['description'] = $request->description;
        $data['content'] = $request->category_content;
        if($request->type == 'category'){
            $category = Category::where('id', $id)->first();
            $check = Category::where('id', '!=', $id)->whereSlug($slug)->first();
            if($check){
                return redirect()->route('admin.category.edit', ['id' => $id])->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $updateCat = $category->update($data);
                if ($updateCat){
                    return redirect()->route('admin.category.index')->with(['msg' => 'The Category has been successfully updated', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
                }
            }
        }elseif ($request->type == 'sub'){
            $subCategory = SubCategories::where('id', $id)->first();
            $check2 = SubCategories::where('id', '!=', $id)->whereSlug($slug)->first();
            if($check2){
                return redirect()->route('admin.sub.category.edit', ['id' => $id])->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $data['parent'] = $request->parent;
                $updateSub = $subCategory->update($data);
                if ($updateSub){
                    return redirect()->route('admin.category.index')->with(['msg' => 'The Category has been successfully updated', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
                }
            }
        }
        return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, the requested Category does not exist', 'status' => 'danger']);
    }
    public function deleteCat($id){
        $category = Category::where('id', $id)->first();
        if ($category){
            $check = $category->delete();
            if ($check){
                return redirect()->route('admin.category.index')->with(['msg' => 'Category has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, something went wrong while deleting the article, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, the requested Category does not exist', 'status' => 'danger']);
        }
    }
    public function deleteSub($id){
        $category = SubCategories::where('id', $id)->first();
        if ($category){
            $check = $category->delete();
            if ($check){
                return redirect()->route('admin.category.index')->with(['msg' => 'Category has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, something went wrong while deleting the article, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.category.index')->with(['msg' => 'Sorry, the requested Category does not exist', 'status' => 'danger']);
        }
    }
}
