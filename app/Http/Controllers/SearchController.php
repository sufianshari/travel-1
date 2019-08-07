<?php

namespace App\Http\Controllers;
use App\Parser\TripAdvisor;

class SearchController extends Controller
{
    public function getIndex(){
        return view('search');
    }
    public function postAjax(){
        $query = $_POST['query'];
        $obj=new TripAdvisor;
        $pars=$obj->getParse($query);
        foreach($pars['results'] as $one){
            if($one->type == 'HOTEL' OR $one->type == 'GEO'){
            echo '<div>'.(isset($one->title)?$one->title:'').'</div>';
            echo '<div><b>'.(isset($one->name)?$one->name:"").'</b></div>';
            echo "<a href='http://www.tripadvisor.ru".(isset($one->url)?$one->url:'')."' target='_blank'>Open url</a>";

            echo '<div>Координаты: '. (isset($one->coords)?$one->coords:'').'</div>';
            echo '<hr />';
            }
        }
    }
}
