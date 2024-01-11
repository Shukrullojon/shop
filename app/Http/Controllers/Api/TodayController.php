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

class TodayController extends Controller
{
    public function get(Request $request){
        $user = User::where('token',$request->bearerToken())->first();
        $vocabularies = Vocabulary::with('media')->where('day_id',$user->today->model_id)->get();
        $ball_voc = Ball::select('id','scores','coins')
            ->where('model',Day::class)
            ->where('table',Vocabulary::class)
            ->where('model_id',$user->today->model_id)
            ->first();
        $result_voc = Result::select('is_done','scores','coins')
            ->where('model_id',$user->today->model_id)
            ->where('model',Day::class)
            ->where('table',Vocabulary::class)
            ->where('user_id',$user->id)
            ->first();

        $grammers = Grammer::with('media')->where('day_id',$user->today->model_id)->first();
        $ball_gra = Ball::select('id','scores','coins')
            ->where('model',Day::class)
            ->where('table',Grammer::class)
            ->where('model_id',$user->today->model_id)
            ->first();
        $result_gra = Result::select('is_done','scores','coins')
            ->where('model_id',$user->today->model_id)
            ->where('model',Day::class)
            ->where('table',Grammer::class)
            ->where('user_id',$user->id)
            ->first();



        return response()->json([
            'status' => true,
            'result' => [
                'vocabularies' => [
                    'words' => $vocabularies,
                    'ball' => $ball_voc,
                    'result' => $result_voc,
                ],
                'grammers' => [
                    'grammer' => $grammers,
                    'ball' => $ball_gra,
                    'result' => $result_gra,
                ],
            ],
        ], 200);
    }
}
