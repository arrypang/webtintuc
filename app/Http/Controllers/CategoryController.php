<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $articles = Article::where('categoryID',$category->categoryID)->where('status','like', 'published')->get();
        return view('users.category',compact('category','articles'));
    }
}
