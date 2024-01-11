<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request){
        $user = User::where('token',$request->bearerToken())->first();
        return response()->json([
            'status' => true,
            'result' => [
                'user' => $user,
            ],
        ], 200);
    }

    public function update(Request $request){
        $user = User::where('token',$request->bearerToken())->first();
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email
        ]);
        return response()->json([
            'status' => true,
            'result' => [
                'user' => $user,
            ],
        ], 200);
    }
}
