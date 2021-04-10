<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone','gender', 'email', 'password','avatar','email_verified_at','provider_id','provider','access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = true;

    public function wallet(){
        return $this->hasOne('App\Models\Wallet', 'user_id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment','user_id');
    }

    public function conversions(){
        return $this->hasMany('App\Models\Conversion','user_id');
    }

    public function fullname(){
        return $this->fname.' '.$this->lname;
    }

    public function userproviders(){
        return $this->belongsTo('App\Models\Userprovider');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
