<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public $articles;
    public function __construct()
    {
        Return $this->articles = Article::where('status','like','published') ;
    }

    public function index()
    {   
        $articleHots = $this->articles->limit(4)->get();
        $articleNews = $this->articles->orderBy('created_at','desc')->take(10)->get();
        $categoryArticle = Category::limit(5)->get();
        $articles = Article::where('status','like','published')->get() ;
        return view('users.home',compact('articleHots','categoryArticle','articles','articleNews'));
    }

    public function search(Request $request)
    {
        $search = $request['search'];

        $articles = Article::where('title', 'LIKE', "%$search%")->get();

        return view('users.search',compact('articles','search'));
    }
}
