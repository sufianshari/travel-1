<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityGeo extends Model
{
    protected $table='cities_geo';
	public function country(){
		return $this->belongsTo('App\CountryEn', 'country_id');
	}
}
