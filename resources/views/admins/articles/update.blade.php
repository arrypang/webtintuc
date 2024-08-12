@extends('admins.layouts.layout')

@section('title', 'Sửa bài viết')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Sửa bài viết</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/admin/article/update/{{$article->articleID}}" method="post" class="mx-4" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="col-7">
                                    <div class="my-2">
                                        <label for="title" class="form-label text-dark">Tiêu đề <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}">
                                    </div>
                                    <div class="my-2">
                                        <label for="content" class="form-label text-dark">Nội dung <span class="text-danger">*</span></label>
                                        <textarea type="text" name="content" id="content" class="form-control" rows="20">{{ old('title', $article->content)}}</textarea>
                                    </div>


                                </div>
                                <div class="col-5">
                                    <div class="my-2">
                                        <label for="categoryID" class="form-label text-dark">Thể loại <span class="text-danger">*</span></label>
                                        <select class="form-select" name="categoryID" id="categoryID">
                                            @foreach($categorys as $category)
                                            <option value="{{$category->categoryID}}" {{$category->categoryID == $article->articleID ? 'selected' : '' }}>{{$category->categoryName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="my-2">
                                        <label for="up_image" class="form-label text-dark">Thêm hình ảnh <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" id="up_image" name="up_image">
                                    </div>
                                    <div class="mt-4 pt-3">
                                        <img src="/uploads/articles/{{ $article->image }}" alt="User Image" class=" border-radius-lg" width="150px" >
                                    </div>

                                </div>
                            </div>

                            <div class="my-3 w-100 text-center">
                                <button type="submit" class="btn btn-success w-50">Lưu bài viết</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection