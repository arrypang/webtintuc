@extends('admins.layouts.layout')

@section('title', 'Danh sách chuyên mục')

@section('navmini')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Chuyên mục</li>
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
                        <h6 class="text-white text-capitalize ps-3">Danh sách chuyên mục</h6>
                        <a href="{{route('admin.category.add')}}" class="text-white me-3"><i class="material-icons fs-5 me-1">categoryadd</i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên thể loại</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">thời gian tạo</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Thời gian cập nhật</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorys as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$category->categoryName}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$category->slug}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$category->description}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm"> 
                                        <p class="text-xs font-weight-bold mb-0">{{$category->created_at}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$category->updated_at}}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="/admin/category/update/{{$category->categoryID}}" class="text-success font-weight-bold text-xs m-0" data-toggle="tooltip">
                                            <i class="material-icons fs-6 ">draw</i>
                                        </a>
                                        <a href="#" class="text-danger font-weight-bold text-xs m-0"
                                            onclick="event.preventDefault(); if (confirm('Bạn muốn xóa chuyên mục: {{$category->categoryName}}?')) { document.getElementById('delete_form{{$category->categoryID}}').submit(); }">
                                            <i class="material-icons fs-6">delete</i>
                                        </a>
                                        <form action="/admin/category/delete/{{$category->categoryID}}" method="post" id="delete_form{{$category->categoryID}}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection