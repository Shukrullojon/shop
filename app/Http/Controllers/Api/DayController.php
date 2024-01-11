<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Module;
use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function get(Request $request)
    {
        $user = User::where('token',$request->bearerToken())->first();
        $days = Day::select('id','name')
            ->where('status',1)
            ->where('module_id',$request->module_id)
            ->get()
            ->toArray();
        foreach ($days as $key => $day){
            $point = Point::select('point','status')
                ->where('model',Day::class)
                ->where('model_id',$day['id'])
                ->where('user_id',$user->id)
                ->first();
            if ($point)
                $days[$key]['point'] = [
                    'point' => $point->point,
                    'status' => $point->status,
                ];
            else
                $days[$key]['point'] = null;
        }
        return response()->json([
            'status' => true,
            'result' => [
                'days' => $days,
            ],
        ], 200);
    }
}
