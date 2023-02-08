<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Twilio\Rest\Client;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use HasApiTokens;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        'state',
        'country',
        'address',
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
    ];

    // public static function boot() {
    //     parent::boot();
    //     self::saved(function ($model) {
    //         Notification::send($model, new WelcomeUserNotification());
    //     });
    // }

        //laravel relationship
        public function profile()
        {
            return $this->hasOne(Profile::class);
        }
        public function fcm()
        {
            return $this->hasMany(FCM::class);
        }
        //custom
        // public function routeNotificationForFcm($notification)
        // {
        // return $this->device_token;
        // }

    public function generateCode()
    {
        $code = rand(100000, 999999);
        
        UserCode::updateOrCreate([
            'user_id' => auth()->user()->id,
        ],[
            'user_id' => auth()->user()->id,
            'code' => $code
        ]);
    
        $receiverNumber = auth()->user()->phone;
        $message = "Your 6 Digit OTP Number is ". $code;
    
        try {
            $account_sid = env("TWILIO_SID");
            $auth_token = env("TWILIO_TOKEN");
            $from_number = env("TWILIO_FROM");
    
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $from_number, 
                'body' => $message]);
        } catch (\Exception $e) {
            
        }
    }    
}
