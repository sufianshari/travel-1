<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetCity extends Model
{
    protected $table = 'net_city';
    public function country(){
        return $this->belongsTo('App\NetCountry', 'country_id');
    }
}
