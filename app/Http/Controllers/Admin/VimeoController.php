<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;

class VimeoController extends Controller
{
    protected function changeEnv($data = []){
        if(count($data) > 0){
            $env = file_get_contents(base_path() . '/.env');
            $env = preg_split('/\s+/', $env);;
            foreach((array)$data as $key => $value){
                foreach($env as $env_key => $env_value){
                    $entry = explode("=", $env_value, 2);
                    if($entry[0] == $key){
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        $env[$env_key] = $env_value;
                    }
                }
            }
            $env = implode("\n", $env);
            file_put_contents(base_path() . '/.env', $env);
            return true;
        } else {
            return false;
        }
    }

    public function index(){
        try{
            $video = Vimeo::request('/me/videos', ['per_page' => 100], 'GET');
            return view('admin.vimeo.index', compact('video'));
//            return response()->json($data);
//            dd($data);
        }catch (\Exception $e){
            $video = [];
            return view('admin.vimeo.index', compact('video'));
        }
    }

    public function setting(){
        return view('admin.vimeo.setting');
    }

    public function updateSetting(Request $request){
        $env = $this->changeEnv([
            'VIMEO_CLIENT'          => $request->vimeo_client,
            'VIMEO_SECRET'          => $request->vimeo_secret,
            'VIMEO_ACCESS'          => $request->vimeo_access,
        ]);
        if ($env){
            return redirect()->route('admin.vimeo.index');
        }else{
            return redirect()->route('admin.vimeo.setting');
        }
    }
}
