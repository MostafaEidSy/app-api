<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function categories(){
        $category = Category::all();
        $subCategory = SubCategories::all();
        $allData = array_merge_recursive([$category, $subCategory]);
        return response()->json($allData);
    }
    public function infoCategories($id){
        $category = Category::where('id', $id)->with(['subCategory'])->first();
        return response()->json($category);
    }
    public function subCategory($parent){
        $sub = SubCategories::where('parent', $parent)->get();
        return response()->json($sub);
    }
    public function articles(){
        $articles = Article::with(['category', 'subCategory'])->get();
        return response()->json($articles);
    }
    public function search($keyword){
        $articles = Article::with(['category'])->where('name', 'like' , '%'.$keyword.'%')->orWhere('content', 'like' , '%'.$keyword.'%')->get();
        return response()->json($articles, 200);
    }
}
