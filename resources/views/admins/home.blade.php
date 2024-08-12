@extends('admins.layouts.layout')

@section('title','Home Admin')

@section('navmini')
<nav aria-label="breadcrumb">
    <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bảng điều</li>
    </ol> -->
    <h6 class="font-weight-bolder mb-0">Bảng điều khiển</h6>
</nav>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <a href="{{route('admin.user')}}">
                            <i class="material-icons opacity-10">person</i>
                        </a>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Người dùng</p>
                        <h4 class="mb-0">{{ $user }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <span class="text-danger text-sm font-weight-bolder">Tuần qua:</span>
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$newUser}} </span>người dùng mới</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <a href="{{route('admin.category')}}">
                            <i class="material-icons opacity-10">category</i>
                        </a>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Loại tin</p>
                        <h4 class="mb-0">{{ $category}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <span class="text-danger text-sm font-weight-bolder">Tuần qua:</span>
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$newCategory}} </span>Chuyên mục mới</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <a href="{{route('admin.article')}}">
                            <i class="material-icons opacity-10">article</i>
                        </a>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Bài viết</p>
                        <h4 class="mb-0">{{$article}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <span class="text-danger text-sm font-weight-bolder">Tuần qua:</span>
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$newArticle}}</span> bài viết mới</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <a href="{{route('admin.comment')}}">
                            <i class="material-icons opacity-10">comment</i>
                        </a>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Bình luận</p>
                        <h4 class="mb-0">{{ $comment }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <span class="text-danger text-sm font-weight-bolder">Tuần qua:</span>
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$newComment}} </span>bình luận mới</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection