<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bundlehistory extends Model
{
    public $timestamps = true;
    protected $guarded = [];

    public function bundle(){
        return $this->belongsTo('App\Models\Bundle','bundle_id');
    }

    public function admin(){
        return $this->belongsTo('App\Models\Admin','admin_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
