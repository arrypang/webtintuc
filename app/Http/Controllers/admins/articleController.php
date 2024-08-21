<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RequestArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class articleController extends Controller
{
    public function show()
    {
        if (auth()->user()->roles == 'author') {
            $articles = Article::where('status', '!=', 'draft')->orderBy('created_at', 'desc')->where('userID',auth()->id())->get();    
        } else {
            $articles = Article::where('status', '!=', 'draft')->orderBy('created_at', 'desc')->get();
        }
        $categories = Category::all();
        return view('admins.articles.show', compact('articles', 'categories'));
    }

    public function showDraft()
    {
        $articles = Article::where('status', 'like', 'draft')->where('userID', auth()->id())->get();
        $users = User::all();
        $categories = Category::all();
        return view('admins.articles.show', compact('articles', 'users', 'categories'));
    }

    public function create()
    {
        $categorys = Category::all();
        return view('admins.articles.add', compact('categorys'));
    }

    public function store(RequestArticle $request)
    {
        ($request['draft']) ? $request['status'] = 'draft' : $request['status'] = 'pending_review';
        $validatedData = [
            'title' => $request['title'],
            'content' => $request['content'],
            'categoryID' => $request['categoryID'],
            'slug' => Str::slug($request['title']),
            'userID' => auth()->id(),
            'status' => $request['status'],
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/articles'), $imageName);
            $validatedData['image'] = $imageName;
        }

        Article::create($validatedData);
        return redirect()->route('admin.article')->with('success', 'Thêm bài viết thành công.');
    }

    public function edit($id)
    {
        $categorys = Category::all();
        $article = Article::where('articleID', $id)->first();
        return view('admins.articles.update', compact('article', 'categorys'));
    }

    public function updateStatus(Request $request, $articleID)
    {
        $article = Article::where('articleID', $articleID)->first();
        $article['status'] = $request['status'];
        $article->save();
        if ($request['status'] == 'published') {
            return redirect()->route('admin.article')->with('success', 'Duyệt bài thành công');
        } else {
            return redirect()->route('admin.article')->with('danger', 'Từ chối thành công');
        }
    }

    public function update(RequestArticle $request, $id)
    {

        $article = Article::where('articleID', $id)->firstOrFail();

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->slug = Str::slug($article->title);
        $article->categoryID = $request->input('categoryID');
        ($request['draft']) ? $article->status = 'draft' : $article->status;

        if ($request->hasFile('up_image')) {
            if ($article->image && file_exists(public_path('uploads/articles/' . $article->image))) {
                unlink(public_path('uploads/articles/' . $article->image));
            }

            $image = $request->file('up_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/articles'), $imageName);
            $article->image = $imageName;
        }
        $article->save();

        return redirect()->route('admin.article')->with('success', 'Cập nhật thành công.');
    }


    public function delete($id)
    {
        $article = Article::where('articleID', $id)->first();
        $article->delete();

        return redirect()->route('admin.article')->with('success', 'Xóa thành công.');
    }
}
