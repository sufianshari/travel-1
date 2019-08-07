<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class BaseController extends Controller
{
    public function getIndex(){
        $news = News::orderBy('id','DESC')->limit(30)->get();
        return view('welcome', compact('news'));
    }
}
