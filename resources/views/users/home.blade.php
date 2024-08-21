@extends('users.layouts.layouts')

@section('content')
<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            @foreach($articleHots as $index=>$article)
            @if($index == 0)
            <div class="col-md-6 p-rl-1 p-b-2">
                <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(/uploads/articles/{{$article->image}});">
                    <a href="{{route('slug',$article->slug)}}" class="dis-block how1-child1 trans-03"></a>

                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="{{route('slug',$article->categories->slug)}}"
                            class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{$article->categories->categoryName}}
                        </a>

                        <h3 class="how1-child2 m-t-14 m-b-10">
                            <a href="{{route('slug',$article->slug)}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {{$article->title}}
                            </a>
                        </h3>

                        <span class="how1-child2">
                            <span class="f1-s-4 cl11">
                                {{$article->user->fullName}}
                            </span>

                            <span class="f1-s-3 cl11 m-rl-3">
                                -
                            </span>

                            <span class="f1-s-3 cl11">
                                {{$article->created_at->format('d/m/Y')}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <div class="col-md-6 p-rl-1">
                <div class="row m-rl--1">
                    @foreach($articleHots as $index=>$article)
                    @if($index == 1)
                    <div class="col-12 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-4 how1 pos-relative"
                            style="background-image: url(/uploads/articles/{{$article->image}});">
                            <a href="{{route('slug',$article->slug)}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                <a href="{{route('slug',$article->categories->slug)}}"
                                    class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$article->categories->categoryName}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="{{route('slug',$article->slug)}}"
                                        class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        {{$article->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @elseif($index > 1 && $index <= 3)
                        <div class="col-sm-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-5 how1 pos-relative"
                            style="background-image: url(/uploads/articles/{{$article->image}});">
                            <a href="{{route('slug',$article->slug)}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="{{route('slug',$article->categories->slug)}}"
                                    class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$article->categories->categoryName}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="{{route('slug',$article->slug)}}"
                                        class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{$article->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>

<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    @foreach($categoryArticle as $caAr)
                    <div class="p-b-20">
                        <div class=" how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991 justify-content-between">
                            <h3 class="f1-m-2 cl12">
                                {{$caAr->categoryName}}
                            </h3>
                            <a href="{{route('slug',$caAr->slug)}}" class=" f1-s-1 cl9 hov-cl10 trans-03">
                                Xem thêm
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                        </div>

                        <div class="row p-t-35">
                            @php 
                            $articleC = $articles->where('categoryID',$caAr->categoryID); 
                            @endphp
                            @foreach($articleC as $article)
                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
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
                                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Tạo bơi {{$article->user->fullName}}
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                            {{$article->created_at->format('d/m/Y')}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <div>
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Bài viết mới
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach($articleNews as $index=>$articleNew)
                            <li class="flex-wr-sb-s p-b-22">
                                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                    {{$index+1}}
                                </div>

                                <a href="{{route('slug',$articleNew->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                    {{$articleNew->title}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection