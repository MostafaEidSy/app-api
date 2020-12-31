<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request){
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
    }
    public function register(Request $request){
        $this->validate($request, [
            "name" => "required|string|min:4",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|max:10"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            "status" => true,
            "user" => $user
        ]);
    }
}
