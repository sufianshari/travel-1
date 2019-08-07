<?php

namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;
use Auth;

class TripAdvisor implements ParseContract
{
    use ParseTrait;
    public $crawler;

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse($url="Belarus")
    {
        $http = 'https://www.tripadvisor.ru/TypeAheadJson?interleaved=true&geoPages=true&details=true&types=geo%2Chotel%2Ceat%2Cattr%2Cvr%2Cair%2Ctheme_park%2Cal%2Cship&neighborhood_geos=true&link_type=geo&matchTags=true&matchGlobalTags=true&matchKeywords=true&matchOverview=true&matchUserProfiles=true&strictAnd=false&scoreThreshold=0.8&hglt=true&disableMaxGroupSize=true&max=7&injectNewLocation=true&injectLists=true&nearby=true&local=true&parentids=&typeahead1_5=true&geoBoostFix=true&nearPages=true&nearPagesLevel=strict&rescue=true&supportedSearchTypes=find_near_stand_alone_query&query='.$url.'&action=API&uiOrigin=MASTHEAD&source=MASTHEAD';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $http);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $ke = 0;
        $data_arr = (array)json_decode($result);
		return $data_arr;
    }
}