@extends('users.layouts.layouts')

@section('breadcrumb')
<a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">Trang chủ</a>
<span class="breadcrumb-item f1-s-3 cl9">Tìm kiếm bài viết</span>
@endsection

@section('content')
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
       Kết quả tìm kiếm cho: {{$search }}
    </h2>
</div>

@if(!$articles)
<h3 class="" style="color: #000;">Không có kết quả</h3>
@else
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-10 col-lg-12 p-b-80">
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-sm-4 p-r-25 p-r-15-sr991">
                        <div class="m-b-45">
                            <a href="{{route('slug',$article->slug)}}" class="wrap-pic-w wrap-pic-h hov1 trans-03">
                                <img src="/uploads/articles/{{$article->image}}" alt="IMG">
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="{{route('slug',$article->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{$article->title}}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    <a href="{{route('slug',$article->slug)}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{$article->user->fullName}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{$article->created_at}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection