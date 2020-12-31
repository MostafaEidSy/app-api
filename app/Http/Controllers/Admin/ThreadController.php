<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThreadRequest;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index(){
        $threads = Thread::with(['details'])->get();
        return view('admin.frontend.thread.index', compact('threads'));
    }
    public function create(){
        return view('admin.frontend.thread.create');
    }
    public function story(ThreadRequest $request){
        try {
            $data = [];
            $data['title'] = $request->name;
            $thread = Thread::create($data);
            $details_list = [];
            for ($i = 0; $i < count($request->detail); $i++) {
                $details_list[$i]['detail'] = $request->detail[$i];
            }
            $details = $thread->details()->createMany($details_list);
            if ($details) {
                return redirect()->route('admin.thread.index')->with(['msg' => 'Added successfully', 'status' => 'success']);
            } else {
                return redirect()->route('admin.thread.index')->with(['msg' => 'Failed to add data', 'status' => 'danger']);
            }
        }catch (\Exception $e){
            return redirect()->route('admin.thread.index')->with(['msg' => 'There is an error in the server. Please try again later', 'status' => 'danger']);
        }
    }
    public function edit($id){
        $thread = Thread::where('id', $id)->with(['details'])->first();
        if ($thread){
            return view('admin.frontend.thread.edit', compact('thread'));
        }else{
            return redirect()->route('admin.thread.index')->with(['msg' => 'Sorry, the requested Thread does not exist', 'status' => 'danger']);
        }
    }
    public function update(ThreadRequest $request){
        $id = $request->id;
        $thread = Thread::where('id', $id)->first();
        if($thread){
            $data = [];
            $data['title'] = $request->name;
            $update = $thread->update($data);
            $thread->details()->delete();
            $details_list = [];
            for ($i = 0; $i < count($request->detail); $i++) {
                $details_list[$i]['detail'] = $request->detail[$i];
            }
            $details = $thread->details()->createMany($details_list);
            if($update && $details){
                return redirect()->route('admin.thread.index')->with(['msg' => 'The Thread has been successfully updated', 'status' => 'success']);
            }else{
                return redirect()->route('admin.thread.index')->with(['msg' => 'Sorry, something went wrong, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.thread.index')->with(['msg' => 'Sorry, the requested Thread does not exist', 'status' => 'danger']);
        }
    }
    public function delete($id){
        $thread = Thread::where('id', $id)->first();
        if($thread){
            $delete = $thread->delete();
            if($delete){
                return redirect()->route('admin.thread.index')->with(['msg' => 'Thread has been successfully deleted', 'status' => 'success']);
            }else{
                return redirect()->route('admin.thread.index')->with(['msg' => 'Sorry, something went wrong while deleting the thread, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('admin.thread.index')->with(['msg' => 'Sorry, the requested thread does not exist', 'status' => 'danger']);
        }
    }
}
