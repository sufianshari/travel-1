<?php

namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;
use App\Hotel;
use Auth;

class Booking implements ParseContract
{
    use ParseTrait;
    public $crawler;

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse(){

    }

    public function getXml($url=null)
    {
        $file = file_get_contents($url);
        $this->crawler = new Crawler($file);
        $this->crawler->filter("url")->each(function (Crawler $node, $i) {
            $path = $node->filter('loc')->text();
            //echo $patch.'<br />';
            $arr_patch = explode('/',$path);
            $country_iso = $arr_patch[4];
            $http_url = file_get_contents($path);
            $book = new Crawler($http_url);
            $name = $book->filter('h1.b-crumb__hp-current')->text();
            $name2 =  str_replace("\"", "", $name);
            $city = $book->filter('.bui-link')->eq(2)->text();
            $body = $book->filter('#bodyconstraint')->html();
            $obj = Hotel::where('url',$path)->first();
            if(!$obj){
                $hotel = new Hotel;
                $hotel->url = $path;
                $hotel->country_iso = $country_iso;
                $hotel->status = '';
                $hotel->city = $city;
                $hotel->name = $name2;
                $hotel->body = $body;
                $hotel->save();
            }
            sleep(1);
        });

    }
}