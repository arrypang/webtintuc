<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $user = number_format(User::count()) ;
        $category = number_format(Category::count());
        $article = number_format(Article::count()) ;
        $comment = number_format(Comment::count());


        $days7 = Carbon::now()->subDays(7);
        $newUser = User::where('created_at', '>=' ,$days7)->count();
        $newCategory = Category::where('created_at', '>=',$days7)->count();
        $newArticle = Article::where('created_at', '>=',$days7)->count();
        $newComment = Comment::where('created_at', '>=',$days7)->count();

        return view('admins.home',compact('user','category','article','comment','newUser','newCategory','newArticle','newComment'));
    }
}
