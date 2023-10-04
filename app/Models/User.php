<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'login_code',
        'remember_token',
    ]; // any request that needs to grab my user information, the attributes specified here will not be shown.

    //We used this function because by default twilio search for phone_number attribute and sends the sms on it, but because here we called it phone not phone_number so we need this function to tell twilio that phone is the phone_numnber that must look for.
    public function routeNotificationForTwilio()
    {
        return $this->phone;
    }

    public function driver() {
        return $this->hasOne(Driver::class);
    }

    public function trips() {
        return $this->hasMany(Trip::class);
    }
}
