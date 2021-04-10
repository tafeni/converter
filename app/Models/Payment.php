<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet','wallet_id');
    }

    public function bundle(){
        return $this->belongsTo('App\Models\Bundle','bundle_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
