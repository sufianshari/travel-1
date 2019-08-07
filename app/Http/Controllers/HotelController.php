<?php

namespace App\Http\Controllers;
use App\Parser\Booking;
class HotelController extends Controller
{
    public function getXml(){
        $xml='http://localhost:83/xml/generate_all_sitemaps.pl_datasitembk-hotel-redesigned-ru.0000.xml';
        $obj=new Booking;
        $pars=$obj->getXml($xml);
    }
}
