<?php

namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;
//use App\ProductUser;
use App\Googlenew;
use Auth;

class GoogleNews implements ParseContract
{
    use ParseTrait;
    public $crawler;

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse($country="Belarus", $lang='ru')
    {
        $ff = 'https://news.google.com/search?q='.$country.'&hl=en-US&gl=US&ceid=US%3Aen';
        $file = file_get_contents($ff);
        $this->crawler = new Crawler($file);
        //$tt = $this->html($this->crawler, '.images_table');
		$body=$this->crawler->filter('.lBwEZb')->html();
		return $body;
    }
}