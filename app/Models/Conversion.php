<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    public $timestamps = true;
    protected $fillable = ['wallet_id','user_id','code_from','code_to','code_old','code_new','status','state','message','amount','transid'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet','wallet_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
