<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        $posts = Article::with(['user'])->get();
        return view('admin.articles.index', compact('posts'));
    }
    public function create(){
        return view('admin.articles.create');
    }
    public function story(ArticleRequest $request){
        $slug = $request->slug;
        $check = Article::where('slug', $slug)->first();
        $data = [];
        $data['admin_id'] = auth()->user()->id;
        $data['name'] = $request->name;
        $data['content'] = $request->content_articles;
        $data['status'] = $request->status;
        $data['slug'] = $request->slug;
        try {
            if($check){
                return redirect()->route('admin.articles.create')->with(['msg' => 'Slug Error : This value already exists', 'status' => 'danger'])->withInput();
            }else{
                $post = Article::create($data);
                if ($post){
                    return redirect()->route('admin.articles.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
                }else{
                    return redirect()->route('admin.articles.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
                }
            }
        }catch (\Exception $e){
            return redirect()->route('admin.articles.index')->with(['msg' => 'There is an error in the server. Please try again later', 'status' => 'danger']);
        }
    }
    public function edit($id){
        $article = Article::where('id', $id)->first();
        if ($article){
            return view('admin.articles.edit', compact('article'));
        }else{
            return redirect()->route('admin.articles.index')->with(['msg' => 'Sorry, the requested article does not exist', 'status' => 'danger']);
        }
    }
    public function update(ArticleRequest $request){
        $id = $request->id;
        $data = [];
        $article = Article::where('id', $id)->first();
        if($article){
            $data['name'] = $request->name;
            $data['content'] = $request->content_articles;
            $data['status'] = $request->status;
            $data['slug'] = $request->slug;
            $update = $article->update($data);
            if ($update){
                return redirect()->route('admin.articles.index')->with(['msg' => 'The article has been successfully updated', 'status' => 'success']);
            }else{
                return redirect()->route('admin.articles.index')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.articles.index')->with(['msg' => 'Sorry, the requested article does not exist', 'status' => 'danger']);
        }
    }
    public function delete($id){
        $check = Article::where('id', $id)->first();
        if($check){
            $deleted = $check->delete();
            if($deleted) {
                return redirect()->route('admin.articles.index')->with(['msg' => 'Article has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.articles.index')->with(['msg' => 'Sorry, something went wrong while deleting the article, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.articles.index')->with(['msg' => 'Sorry, the requested article does not exist', 'status' => 'danger']);
        }
    }
}
