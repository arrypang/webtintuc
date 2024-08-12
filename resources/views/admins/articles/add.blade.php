@extends('admins.layouts.layout')

@section('title', 'Thêm bài viết')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Thêm bài viết</h6>
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
                        <form action="/admin/article/add" method="post" class="mx-4" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="col-7">
                                    <div class="my-2">
                                        <label for="title" class="form-label text-dark">Tiêu đề <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                    <div class="my-2">
                                        <label for="editor" class="form-label text-dark">Nội dung <span class="text-danger">*</span></label>
                                        <textarea name="content" id="editor" class="form-control"></textarea>
                                    </div>


                                </div>
                                <div class="col-5">
                                    <div class="my-2">
                                        <label for="categoryID" class="form-label text-dark">Thể loại <span class="text-danger">*</span></label>
                                        <select class="form-select" name="categoryID" id="categoryID">
                                            <option selected disabled>--- Chọn thể loại ---</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->categoryID}}">{{$category->categoryName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="my-2">
                                        <label for="image" class="form-label text-dark">Thêm hình ảnh <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" id="image" name="image">
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