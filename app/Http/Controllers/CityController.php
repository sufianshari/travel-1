<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetCity;

class CityController extends Controller
{
    public function getCity($id=null){
		$obj=NetCity::find($id);
		return view('city',compact('obj'));
	}
}
