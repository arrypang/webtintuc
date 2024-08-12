<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(){
        $articles = Article::withCount('comments')->get();
        return view('admins.comments.show', compact('articles'));
    }
    
    public function showArticle($articleID){
        $comments = Comment::where('articleID',$articleID)->get();
        $article = Article::find($articleID);
        return view('admins.comments.articleComent',compact('comments','article'));
    }

    public function delete($id){
        $comment = Comment::find($id);
        $article = $comment->articleID ;
        $comment->delete();

        return redirect()->route('admin.comment.article',['articleID' => $article]);
    }
}
