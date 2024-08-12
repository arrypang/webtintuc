@extends('admins.layouts.layout')

@section('title', 'Cập nhật chuyên mục')


@section('navmini')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin.category')}}">Chuyên mục</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cập nhật</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Cập nhật chuyên mục</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form action="/admin/category/update/{{$category->categoryID}}" method="post" class="mx-4">
                            @csrf
                            @method('PUT')
                            <div class="my-2">
                                <label for="categoryName" class="form-label text-dark">Tên loại<span class="text-danger"> *</span></label>
                                <input type="text" name="categoryName" id="categoryName" class="form-control" value="{{ old('categoryName', $category->categoryName) }}">
                                @error('categoryName')
                                <em class="invalid-feedback">{{ $message }}</em>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="form-label text-dark" for="description">Mô tả</label>
                                <textarea type="description" class="form-control" name="description" id="description" rows="5">{{ old('description', $category->description) }}</textarea>
                            </div>
                            <div class="my-3 w-100 text-center">
                                <button type="submit" class="btn btn-success w-50">Lưu thể loại</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection