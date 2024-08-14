<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function show()
    {
        $articles = Article::where('status', '!=', 'draft')->get();
        $users = User::all();
        $categories = Category::all();
        return view('admins.articles.show', compact('articles', 'users', 'categories'));
    }

    public function showDraft() 
    {
        $articles = Article::where('status', 'like', 'draft' )->where('userID',auth()->id())->get();
        $users = User::all();
        $categories = Category::all();
        return view('admins.articles.show', compact('articles', 'users', 'categories'));
    }

    public function create()
    {
        $categorys = Category::all();
        return view('admins.articles.add', compact('categorys'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:2000',
            'content' => 'required|string',
            'categoryID' => 'required|exists:categories,categoryID',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/articles'), $imageName);
            $validatedData['image'] = $imageName;
        }

        ($request['draft'])? $request['status'] = 'draft' : $request['status'] = 'pending_review';

        Article::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'slug' => Str::slug($validatedData['title']),
            'userID' => auth()->id(),
            'categoryID' => $validatedData['categoryID'],
            'status' => $request['status'],
            'image' => $validatedData['image'],
        ]);

        return redirect()->route('admin.article')->with('success', 'Thêm bài viết thành công.');
    }
    public function edit($id)
    {
        $categorys = Category::all();
        $article = Article::where('articleID', $id)->first();
        return view('admins.articles.update', compact('article', 'categorys'));
    }

    public function updateStatus($articleID)
    {
        $article = Article::where('articleID', $articleID)->first();
        $article['status'] = 'published';
        $article->save();

        return redirect()->route('admin.article')->with('success', 'Duyệt bài id:' . $article->articleID . ' thành công');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:2000',
            'content' => 'required|string',
            'categoryID' => 'required|exists:categories,categoryID',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $article = Article::where('articleID', $id)->firstOrFail();

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->slug = Str::slug($article->title);
        $article->categoryID = $request->input('categoryID');
        $article->status = 'draft';

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
