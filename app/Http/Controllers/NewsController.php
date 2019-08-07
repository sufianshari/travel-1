<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function getAll(){
        $news = News::orderBy('id','DESC')->paginate(50);
        return view('news', compact('news'));
    }
    public function getOne($id = null){
        $one = News::find($id);
        return view('new_one', compact('one'));
    }
}
