<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RequestCategory;
use App\Http\Requests\admin\RequestCategoryPUT;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function show()
    {
        $categorys = Category::all();
        return view('admins.categorys.show',['categorys' => $categorys]);
    }

    public function create()
    {
       return view('admins.categorys.add') ;
    }

    public function store(RequestCategory $request)
    {
        $data = [
            'categoryName' => $request['categoryName'],
            'description' => $request['description'],
            'slug' => Str::slug($request['categoryName']),
        ];
        Category::create($data);
    
        return redirect()->route('admin.category')->with('success', 'Thêm chuyên mục thành công');
    }

    public function edit($categoryID)
    {
        $category = Category::where('categoryID',$categoryID)->first();

        return view('admins.categorys.update',compact('category'));
    }

    public function update(RequestCategoryPUT $request, $categoryID)
    {

        $category = Category::where('categoryID',$categoryID)->findOrFail($categoryID);

        $category->update([
            'categoryName' => $request['categoryName'],
            'slug' => Str::slug($request['categoryName']),
            'description' => $request['description'],
        ]);

        return redirect()->route('admin.category')->with('success', 'Cập nhật chuyên mục thành công');
    }

    public function delete($categoryID)
    {
        $category = Category::where('categoryID',$categoryID)->first();
        $category->delete();

        return redirect()->route('admin.category')->with('success','Xóa thành công');
    }
}
