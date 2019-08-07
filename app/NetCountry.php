<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetCountry extends Model
{
    protected $table = 'net_country';
    public function country_geo(){
        return $this->hasOne('App\CountryEn', 'country_iso_code', 'code');
    }
}
