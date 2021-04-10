<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userprovider extends Model
{
    protected $fillable = ['user_id','provider','provider_id','access_token'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }


}
