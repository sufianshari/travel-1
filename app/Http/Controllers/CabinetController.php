<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryEn;
use App\Gallery;
use App\CityGeo;
use Auth;


class CabinetController extends Controller
{
	public function getIndex(){
		$countries=CountryEn::orderBy("country_name")->get();
		return view('cabinet', compact('countries'));
	}
	public function postIndex(){
		$city=$_POST['cityInput'];
		$country_id=(int)$_POST['countryInput'];
		$description=$_POST['description'];
		$user_id=(Auth::user())?Auth::user()->id:0;
		$city_obj=CityGeo::where('name', $city)->first();
		$city_id=(isset($city_obj))?$city_obj->id:0;
		$obj=new Gallery;
		$obj->user_id=$user_id;
		$obj->country_id=$country_id;
		$obj->city_id=$city_id;
		$obj->city_name=$city;
		$obj->picture='';
		$obj->description=$description;
		$obj->keywords='';
		$obj->status='default';
		$obj->save();
		return redirect()->back();
	}
}
