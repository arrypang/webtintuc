@extends('users.layouts.layouts')


@section('breadcrumb')
<a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">Trang chủ</a>
<a href="{{route('slug',$article->categories->slug)}}" class="breadcrumb-item f1-s-3 cl9">{{$article->categories->categoryName}}</a>
<span class="breadcrumb-item f1-s-3 cl9">{{$article->title}}</span>
@endsection

@section('content')
<section class="bg0 p-b-70 p-t-5">
    <div class="bg-img1 size-a-18 how-overlay1" style="background-image: url(/uploads/articles/{{$article->image}});">
        <div class="container h-full flex-col-e-c p-b-58">
            <a href="#" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
                {{$article->categories->categoryName}}
            </a>

            <h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
                {{$article->title}}
            </h3>

            <div class="flex-wr-c-s">
                <span class="f1-s-3 cl8 m-rl-7 txt-center">
                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                        {{$article->user->fullName}}
                    </a>

                    <span class="m-rl-3">-</span>

                    <span>
                        {{$article->created_at}}
                    </span>
                </span>

                <span class="f1-s-3 cl8 m-rl-7 txt-center">
                    5239 Views
                </span>

                <a href="" class="f1-s-3 cl8 m-rl-7 txt-center hov-cl10 trans-03">
                    0 Comment
                </a>
            </div>
        </div>
    </div>

    <!-- Detail -->
    <div class="container p-t-82">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-100">
                <div class="p-r-10 p-r-0-sr991">
                    <div class="p-b-70">
                        {!! $article->content !!}
                    </div>

                    <div>
                        <h4 class="f1-l-4 cl3 p-b-12">
                            Bình luận
                        </h4>
                        <div class="mt-1">
                            <div class="card">
                                <div class="card-body">
                                    @if(Auth::check())
                                    <form action="{{route('comment')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" value="{{$article->articleID}}" name="articleID" hidden>
                                            <input type="text" value="{{$article->slug}}" name="slug" hidden>
                                            <textarea class="form-control" rows="3" name="content" placeholder="Bình luận với vai trò {{auth()->user()->fullName}}"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </form>
                                    @else
                                    <h2 class="text-center"><a href="/login">Đăng nhập</a> để bình luận</h2>
                                    @endif

                                    @foreach($comment as $cmt)
                                    <div class="media mt-4 pb-3" style="border-bottom: 0.1px solid #ccc; padding-bottom: 10px;">
                                        @if($cmt->user->image)
                                        <img class="d-flex mr-3 rounded-circle" width="40px" height="40px" src="/uploads/users/{{$cmt->user->image}}" alt="User Avatar">
                                        @else
                                        <img class="d-flex mr-3 rounded-circle" width="40px" height="40px" src="/uploads/users/users_default.png" alt="User Avatar">
                                        @endif
                                        <div class="media-body">
                                            <h5 class="mt-0" style="color: black;">{{$cmt->user->fullName}}</h5>
                                            {{$cmt->content}}
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-4 p-b-100">
            </div>
        </div>
    </div>
</section>
@endsection