<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function get(){
        $events = Event::select('id','title','info','date','status')
            ->with('media')
            ->with('cnt')
            ->where('status',1)
            ->where('date','>',date("Y-m-d H:i:s"))
            ->get();
        return response()->json([
            'status' => true,
            'result' => [
                'events' => $events,
            ],
        ], 200);
    }

    public function set(Request $request){
        $user = User::where('token',$request->bearerToken())->first();
        EventUser::create([
            'user_id' => $user->id,
            'event_id' => $request->event_id
        ]);
        return response()->json([
            'status' => true,
        ], 200);
    }
}
