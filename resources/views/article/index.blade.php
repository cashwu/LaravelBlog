@extends("common.layout")

@section("title", $title)

@section("navbar")
    @include("common.navbar")
@endsection

@section("content")

    <ul class="breadcrumb" style="margin-top: 70px;">
        <li><a href="{{ url("/") }}">首頁</a><span> > </span></li>
        <li><a href="{{ url("/article") }}">文章列表</a></li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($articles as $article)
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2>{{ $article -> subject }}</h2>
                            <p class="card-text">{{ $article -> summary }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-info" role="button"
                                       href="{{ url("/article/details/".$article->id) }}"> Detail</a>
                                </div>
                                <small class="text-muted">
                                    <i class="icon-calendar"> </i>
                                    {{  $article -> created_at }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{ $articles->links() }}

@endsection
