<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function get(Request $request)
    {
        $user = User::where('token',$request->bearerToken())->first();
        $modules = Module::select('id','name')
            ->where('status',1)
            ->get()
            ->toArray();
        foreach ($modules as $key => $module){
            $point = Point::select('point','status')
                ->where('model',Module::class)
                ->where('model_id',$module['id'])
                ->where('user_id',$user->id)
                ->first();
            if ($point)
                $modules[$key]['point'] = [
                    'point' => $point->point,
                    'status' => $point->status,
                ];
            else
                $modules[$key]['point'] = null;
        }
        return response()->json([
            'status' => true,
            'result' => [
                'modules' => $modules,
            ],
        ], 200);
    }
}
