<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $timestamps = true;
    protected  $fillable = [
        'user_id','bundle_id','balance', 'status', 'expiry_date'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function conversions(){
        return $this->hasMany('App\Models\Conversion','wallet_id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment','wallet_id');
    }

    public function bundle(){
        return $this->belongsTo('App\Models\Bundle','bundle_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }


}
