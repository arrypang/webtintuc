@extends('admins.layouts.layout')

@section('title', 'Danh sách bình luận')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Danh sách bình luận</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tin tức</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng bình luận</th>
                                    <th class="text-secondary opacity-7"></th>
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
                                                <h6 class="mb-0 text-sm">{{$article->title}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $article->comments_count }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex">
                                            <button class="btn">
                                                <a href="/admin/comment/{{$article->articleID}}" class="text-success font-weight-bold text-xs m-0" data-toggle="tooltip" data-original-title="Edit user">
                                                    Bình luận sản phẩm
                                                </a>
                                            </button>
                                        </div>

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


<!-- <div class="modal fade" id="ArticleModal" tabindex="-1" aria-labelledby="ArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ArticleModalLabel">Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Content
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        modalBody.textContent = content;
    });
</script> -->
@endsection
@endsection