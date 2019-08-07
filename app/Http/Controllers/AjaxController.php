<?php

namespace App\Http\Controllers;
use App\Parser\GoogleNews;
use App\Parser\WikipediaInfo;
use App\Parser\Youtube;
use App\City;
use App\Video;
use App\News;
use App\NetCountry;
use App\NetCity;

class AjaxController extends Controller
{
    public function getNews(){
		$country=$_GET["country"];
		$day = date('Y-m-d');
        $lang = (isset($_COOKIE['lang']))?$_COOKIE['lang']:'RUS';
		$ob = News::where('country_name', $country)->where('putday', $day)->first();
		if(!$ob){
            $obj=new GoogleNews;
            $pars=$obj->getParse($country, $lang);
            $obn  = new News;
            $obn->country_name = $country;
            $obn->body = $pars;
            $obn->lang = 'en';
            $obn->putday = $day;
            $obn->url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            $obn->save();
            $parse = $pars;
        }else{
$parse = $ob->body;
        }
     return view('ajax.iframe',compact("country", "parse", "lang"));
    }
	public function getInfo(){
		$country=$_GET["country"];
		$obj=new WikipediaInfo;
		$pars=$obj->getParse($country);
		
     return view('ajax.info',compact("country"));
	}
	public function getCities(){
		$country=$_GET["country"];
		$obj=NetCountry::where("code_3",$country)->first();
		$cities=NetCity::where("country_id",$obj->id)->get();
     return view('ajax.city',compact("country","cities"));
	}
	public function getCabinet(){
		$id=(int)$_POST['id'];
		$cities=CityGeo::where('country_id',$id)->get();
		return view('ajax.cabinet', compact("cities"));
	}
	public function getVideo(){
        $country=$_GET["country"];
        $obj=new Youtube;
        $pars=$obj->getParse($country);
echo $pars;
       // return view('ajax.info',compact("country"));
    }
}
