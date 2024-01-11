<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\SmsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function today(){
        return $this->hasOne(Point::class)
            ->where('model', Day::class)
            ->where('point',1)
            ->latest();
    }

    public function otpSend(){
        //$rand = rand(10000,99999);
        $rand = 12345;
        $otp = Otp::create([
            'model' => User::class,
            'model_id' => $this->id,
            'phone' => $this->phone,
            'code' => Hash::make($rand),
            'attemp' => 0,
            'phone_name' => 'Samsung',
            'status' => 0,
        ]);
        $message = "Parolni hech kimga bermang. Sizning parol: {$rand}";
        $service = SmsService::login();
        if (!isset($service["data"]["token"])) return false;
        $token = $service["data"]["token"];
        $send = SmsService::send([
            'token' => $token,
            'mobile_phone' => '+998'.$otp->phone,
            'message' => $message,
        ]);
        return $send ? true : false;
    }

    public function otpCheck($code){
        $otp = Otp::where('model',User::class)
            ->where('model_id',$this->id)
            ->latest()
            ->first();
        if (!empty($otp)){
            if ($otp->status == 1){
                return [
                    'message' => 'Bu sms allaqachon tasdiqlangan!!!',
                ];
            }

            /*if (strtotime($otp->created_at) > date("Y-m-d H:i:s", strtotime("-2 minute"))){
                return [
                    'message' => 'Time Error!!!',
                ];
            }*/

            if (!empty($otp) and $otp->attemp >= 3){
                return [
                    'message' => 'Urunishlar soni oshib ketdi!!!',
                ];
            }

            if (Hash::check($code,$otp->code)){
                $otp->update([
                    'status' => 1,
                ]);
                return true;
            }else{
                $otp->update([
                    'attemp' => $otp->attemp + 1
                ]);
                return [
                    'message' => 'Parol xato!!!',
                ];
            }
        }else{
            return [
                'message' => 'Otp topilmadi!!!',
            ];
        }
    }
}
