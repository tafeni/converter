<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trendingcode extends Model
{
    public $timestamps = true;
    protected $fillable = ['day','status','influencer','code','odd','booky','created_at','updated_at'];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
