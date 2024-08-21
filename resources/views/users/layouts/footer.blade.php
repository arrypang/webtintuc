@php
	use App\Models\Category;
	use App\Models\Article;
	$categorys = Category::limit(5)->get();
	$articles = Article::orderBy('created_at','desc')->take(3)->get();
@endphp
<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="index.html">
								<img class="max-s-full" src="/assets/users/images/logo/logo.svg" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
							Giấy phép xuất bản số 110/GP - BTTTT cấp ngày 24.3.2020 © 2003-2024 Bản quyền thuộc về Báo Thanh Niên. Cấm sao chép dưới mọi hình thức nếu không có sự chấp thuận bằng văn bản.
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-twitter"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Bài viết mới
							</h5>
						</div>

						<ul>
							@foreach($articles as $article)
							<li class="flex-wr-sb-s p-b-20">
								<a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="/uploads/articles/{{$article->image}}" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="{{route('slug',$article->slug)}}" class="f1-s-5 cl11 hov-cl10 trans-03">
											{{$article->title}}
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										{{$article->created_at->format('d/m/Y')}}
									</span>
								</div>
							</li>
							@endforeach
						</ul>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Thể loại
							</h5>
						</div>

						<ul class="m-t--12">
							@foreach($categorys as $category)
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="{{route('slug',$category->slug)}}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									{{$category->categoryName}} ({{$category->article->count()}})
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>