<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bookmaker extends Model
{
    public $timestamps = true;

    protected $guarded = [];

    public function admin(){
        return $this->belongsTo('App\Models\Admin','admin_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }
}
