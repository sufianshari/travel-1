<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryEn;
use App\NetCountry;
use App;

class CountryController extends Controller
{
 protected $data;
	public function __construct(){
		$path = config_path().'/countries_states.json';
		$json = file_get_contents($path);
		$data = json_decode($json,true);
		$this->data = $data; 
	}

    public function getIndex($url = null){
        $obj = CountryEn::where('country_iso_code', $url)->first();
        //$cities = City::where('country_iso_code', $obj->country_iso_code)->get();
        //dd($cities);
        return view('country',compact('obj','cities'));
    }
	public function getName($url=null, $name = null){
        $obj = NetCountry::where('code_3', $url)->first();
        $map = CountryEn::where('country_iso_code', $obj->code)->first();
        $lang = (isset($_COOKIE['lang']))?$_COOKIE['lang']:'RUS';
        if($lang == 'ENG'){
            $name_cook = $obj->name_en;
        }else{
            $name_cook = $obj->name_ru;
        }
		    $states = [];
		 foreach($this->data['countries'] as $i => $v)
            {
			 if($v['country'] == $name){
			  $states = $v['states'];
			 } 
            } 
		//$cities = City::where('country_iso_code', $obj->country_iso_code)->get();
		return view('country', compact('obj', 'states','name','name_cook', 'map'));
	}
}
