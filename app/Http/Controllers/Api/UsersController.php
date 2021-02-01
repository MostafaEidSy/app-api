<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public $loginAfterSignUp = true;
    public function checkAuth(){
        if (auth('api')->check()){
            return response()->json('Auth', 200);
        }else{
            return response()->json('UnAuth', 401);
        }
    }
    public function login(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
            if ($validator->failed()) {
                return response()->json(['error' => true, 'message' => $validator->errors()], 401);
            }
            $credentials = request(['email', 'password']);

            $token = auth('api')->attempt($credentials);
            if (!$token) {
                return response()->json(['message' => 'There Is An Error In The Data'], 401);
            }
            return response()->json(['token' => $token], 200);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function register(Request $request){
        $this->validate($request, [
            "name" => "required|string|min:4",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
            "username" => "required|min:6|unique:users"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->username = $request->username;
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            "status" => true,
            "user" => $user
        ]);
    }
    public function profile(){
        $id = auth('api')->user()->id;
        $user = User::where('id', $id)->first();
        return response()->json($user);
    }
}
