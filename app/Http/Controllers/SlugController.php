<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function checkSlug($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $article = Article::where('slug',$slug)->first();
        if($category){
            return app(CategoryController::class)->show($category);
        }

        if($article){
            return app(ArticleController::class)->showDetail($article);
        }

        abort(404);
    }
}
