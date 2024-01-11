<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function phone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:9|max:9',
        ]);
        if ($validator->fails()) {
            $errorPhone = $validator->errors()->get('phone');
            return response()->json([
                'status' => false,
                'result' => [
                    'message' => [
                        'uz' => $errorPhone[0],
                        'ru' => $errorPhone[0],
                        'en' => $errorPhone[0],
                    ],
                ],
            ], 203);
        }

        $user = User::updateOrCreate(
            [
                'phone' => $request->phone,
            ],
            [
                'token' => Str::uuid(),
                'status' => 0,
            ]
        );
        if ($user->otpSend())
            return response()->json([
                'status' => true,
                'result' => [
                    'token' => $user->token,
                    /*'message' => [
                        'uz' => "Tasdiqlash kodini kiriting!!!",
                        'ru' => "Tasdiqlash kodini kiriting!!!",
                        'en' => "Tasdiqlash kodini kiriting!!!",
                    ],*/
                ],
            ], 200);
        else
            return response()->json([
                'status' => false,
                'error' => [
                    'token' => $user->token,
                    'message' => [
                        'uz' => "Sms yuborishda xatolik!!!",
                        'ru' => "Sms yuborishda xatolik!!!",
                        'en' => "Sms yuborishda xatolik!!!",
                    ],
                ],
            ]);
    }

    public function code(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|integer|min:10000|max:99999',
            'token' => 'required|exists:users,token'
        ]);

        if ($validator->fails()) {
            $errorCode = $validator->errors()->get('code');
            $errorToken = $validator->errors()->get('token');
            return response()->json([
                'status' => false,
                'result' => [
                    'message' => [
                        'uz' => (isset($errorCode[0])) ? $errorCode[0] : $errorToken[0],
                        'ru' => (isset($errorCode[0])) ? $errorCode[0] : $errorToken[0],
                        'en' => (isset($errorCode[0])) ? $errorCode[0] : $errorToken[0],
                    ],
                ],
            ], 203);
        }

        $user = User::where('token', $request->token)->first();
        $check = $user->otpCheck($request->code);
        if (!is_array($check) and $check) {
            $user->update([
                'status' => 1,
            ]);
            return response()->json([
                'status' => true,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'error' => [
                    'uz' => $check['message'],
                    'ru' => $check['message'],
                    'en' => $check['message'],
                ],
            ], 200);
        }

        $otp = Otp::where('user_id', $user->id)
            ->where('status', 0)
            ->where('attemp', '<', 3)
            ->where('created_at', "<", date("Y-m-d H:i:s", strtotime("-1 minute")))
            ->latest()
            ->first();
        if (!empty($otp)) {
            if (Hash::check($request->code, $otp->code)) {
                $user->update([
                    'name' => "NO NAME",
                ]);
                return response()->json([
                    'status' => true,
                ], 200);
            } else {
                $otp->update([
                    'attemp' => $otp->attemp + 1
                ]);
                return response()->json([
                    'status' => false,
                    'result' => [
                        'message' => [
                            'uz' => "Kodni to'g'ri kiriting!!!",
                            'ru' => "Kodni to'g'ri kiriting!!!",
                            'en' => "Kodni to'g'ri kiriting!!!",
                        ],
                    ],
                ], 203);
            }
        } else {
            return response()->json([
                'status' => false,
                'result' => [
                    'is_return' => true,
                ],
            ], 203);
        }
    }
}
