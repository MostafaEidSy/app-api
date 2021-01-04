<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function categories(){
        $category = Category::with(['subCategory'])->get();
        return response()->json($category);
    }
}
