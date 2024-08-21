<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showDetail(Article $article)
    {
        $comment = Comment::where('articleID',$article->articleID)->get();
        return view('users.articleDetail', compact('article','comment'));
    }

    public function comment(Request $request)
    {
        $data = [
            'content' => $request['content'],
            'userID' => auth()->id() ,
            'articleID' => $request['articleID']
        ];

        Comment::create($data);
        return redirect()->route('slug',$request['slug']);
    }
}
