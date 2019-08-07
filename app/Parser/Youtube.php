<?php

namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;

class Youtube implements ParseContract
{
    use ParseTrait;
    public $crawler;
    public $body;

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse($country="Belarus")
    {
        $str = str_replace(" ", "+", $country);
        $ff = 'https://www.youtube.com/results?search_query='.$str;
        $file = file_get_contents($ff);
        $this->crawler = new Crawler($file);
        $this->crawler->filter(".contains-addto")->each(function (Crawler $node, $i) {
            $pic = $node->filter('img')->attr('src');
            $time = $node->filter('a')->text();
            $url = $node->filter('a')->attr('href');
            $this->body .="<a href='http://youtube.com$url' target='_blank'>";
            $this->body .= "<img src='$pic'><br />";
            $this->body .= $url."";
            $this->body .="</a>";
            $this->body .="<span>$time</span><br />";
            $this->body .="<hr />";
        });
        return $this->body;
    }
}