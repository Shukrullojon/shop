<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ball;
use App\Models\Day;
use App\Models\Grammer;
use App\Models\Result;
use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function set(Request $request)
    {
        $user = User::where('token', $request->bearerToken())->first();
        $table = '';
        if ($request->table == 'Vocabulary') {
            $table = Vocabulary::class;
        } else if ($request->table == 'Grammer') {
            $table = Grammer::class;
        }
        $ball = Ball::where('model', Day::class)
            ->where('model_id', $request->day_id)
            ->where('table', $table)
            ->first();
        Result::updateOrCreate(
            [
                'model' => Day::class,
                'model_id' => $request->day_id,
                'user_id' => $user->id,
                'table' => $table
            ],
            [
                'is_done' => 1,
                'scores' => $ball->scores,
                'coins' => $ball->coins,
            ]
        );
        return response()->json([
            'status' => true,
        ], 200);
    }

    public function get(Request $request){
        $user = User::where('token',$request->bearerToken())->first();
        $result = Result::select(DB::raw('sum(scores) as scores'), DB::raw('sum(coins) as coins'))
            ->where('user_id',$user->id)
            ->where('is_done',1)
            ->groupBy('user_id')
            ->first();
        return response()->json([
            'status' => true,
            'result' => [
                'result' => $result,
            ],
        ], 200);
    }

}
