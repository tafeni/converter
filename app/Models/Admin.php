<?php

namespace App\Models;

use Carbon\Carbon;
use App\Notifications\AdminResetNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use notifiable;

    public $timestamps = true;
    protected $guarded = [];

    public function bundles(){
        return $this->hasMany('App\Models\Bundle','admin_id');
    }

    public function bundlehistories(){
        return $this->hasMany('App\Models\Bundlehistory','admin_id');
    }

    public function bookmakers(){
        return $this->hasMany('App\Models\Bookmaker','admin_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
