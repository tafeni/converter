<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo('App\Models\Admin','admin_id');
    }

    public function bundlehistories(){
        return $this->hasMany('App\Models\Bundlehistory','bundle_id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment','bundle_id');
    }
    public function wallets(){
        return $this->belongsTo('App\Models\Wallet','bundle_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
