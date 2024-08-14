@extends('admins.layouts.layout')

@section('title', 'Danh sách bài viết')

@php
$currentRoute = Route::currentRouteName();
@endphp
@section('navmini')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin')}}">Trang chủ</a></li>
        @if($currentRoute == 'admin.article.draft')
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('admin.article')}}">Bài viết</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bản nháp</li>
        @else
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bài viết</li>
        @endif
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
                        <div class="flex-row">
                            <h6 class="text-white text-capitalize ps-3">
                                {{ ($currentRoute=='admin.article.draft')? 'Danh sách bản nháp  ' :'Danh sách bài viết' }}
                            </h6>
                        </div>
                        <div class="flex-row-reverse">
                            <a href="{{route('admin.article.add')}}" class="text-white me-3"><i class="material-icons fs-5 me-1">articleadd</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <ul class="nav justify-content-end mx-5 pt-0 pb-2">
                        <li class="nav-item">
                            @if($currentRoute == 'admin.article.draft')
                            <a class="nav-link active text-sm text-dark" aria-current="page" href="{{route('admin.article')}}">Danh sách</a>
                            @else
                            <a class="nav-link active text-sm text-dark" aria-current="page" href="{{route('admin.article.draft')}}">Bản nháp</a>
                            @endif

                        </li>
                    </ul>

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tiêu đề</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nội dung</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đăng</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thể loại</th>
                                    @if($currentRoute == 'admin.article.draft')
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                     @endif
                                    @if($currentRoute == 'admin.article')
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phê duyệt</th>
                                    @endif
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="/uploads/articles/{{$article->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="Hình ảnh {{$article->fullName}}">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm text-truncate" style="width: 200px;">{{$article->title}}</h6>
                                                <p class="text-xs text-secondary mb-0 text-truncate" style="width: 200px;"><span>Slug: </span>{{$article->slug}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#ArticleModal" data-title="{{ $article->title }}" data-content="{{$article->content}}">
                                            Nội dung chi tiết
                                        </a>

                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?php
                                            $user = $users->firstWhere('userID', $article->userID);
                                            ?>
                                            {{$user ? $user->fullName : ''}}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?php
                                            $category = $categories->firstWhere('categoryID', $article->categoryID)
                                            ?>
                                            {{$category ? $category->categoryName : ''}}
                                        </p>
                                    </td>
                                    @if($currentRoute == 'admin.article.draft')
                                    <td class="align-middle text-center">
                                        @php
                                        $statusText = '';
                                        switch ($article->status) {
                                        case 'draft':
                                        $statusText = 'Bản nháp';
                                        }
                                        @endphp
                                        <p class="text-xs font-weight-bold mb-0">{{ $statusText }}</p>
                                    </td>
                                    @endif
                                    @if($currentRoute == 'admin.article')
                                    <td class="align-middle text-center">
                                        @if(($article->status === 'pending_review'))
                                        <a href="" class="text-warning font-weight-bold text-xs m-0"
                                            onclick="event.preventDefault();document.getElementById('updateStatus_form{{$article->articleID}}').submit();">
                                            <p class=" text-xs font-weight-bold mb-0 rounded-pill border p-1 border-warning">Duyệt</p>
                                        </a>

                                        <form action="{{route('admin.article.edit',$article->articleID)}}" method="post" id="updateStatus_form{{$article->articleID}}" hidden>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        @else
                                        <p class="text-success text-xs font-weight-bold mb-0">Đã duyệt</p>
                                        @endif

                                    </td>
                                    @endif
                                    
                                    <td class="align-middle text-center">
                                        <a href="/admin/article/update/{{$article->articleID}}" class="text-success font-weight-bold text-xs m-0">
                                            <i class="material-icons fs-6 ">draw</i>
                                        </a>
                                        <a href="" class="text-danger font-weight-bold text-xs m-0"
                                            onclick="event.preventDefault(); if (confirm('Bạn muốn xóa bài viết có id: {{$article->articleID}}?')) { document.getElementById('delete_form{{$article->articleID}}').submit(); }">
                                            <i class="material-icons fs-6">delete</i>
                                        </a>
                                        <form action="/admin/article/delete/{{$article->articleID}}" method="post" id="delete_form{{$article->articleID}}" style="display: none;">
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


<div class="modal fade" id="ArticleModal" tabindex="-1" aria-labelledby="ArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <h5 class="modal-title" id="ArticleModalLabel">Title</h5>
            </div>
            <div class="modal-body">
                Content
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    var articleModal = document.getElementById('ArticleModal');
    articleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var title = button.getAttribute('data-title');
        var content = button.getAttribute('data-content');

        var modalTitle = articleModal.querySelector('.modal-title');
        var modalBody = articleModal.querySelector('.modal-body');

        modalTitle.textContent = title;
        modalBody.innerHTML = content;
    });
</script>
@endsection
@endsection