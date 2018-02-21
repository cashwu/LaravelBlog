@extends("common.layout")

@section("title", $title)
@section("content")

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Cash Wu Blog</h1>
            <p>My Coding, My Life</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <legend>最新文章</legend>
                    @foreach($articles as $article)
                        <div class="card mb-12 box-shadow">
                            <div class="card-body">
                                <h2>{{ $article -> subject }}</h2>
                                <p class="card-text">{{ $article -> summary }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info" role="button"
                                           href="{{ url("/article/details/".$article->id) }}"> Detail</a>
                                    </div>
                                    <small class="text-muted">
                                        <i class="icon-calendar"></i> {{ date("Y-m-d", strtotime($article -> created_at)) }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </fieldset>
            </div>
        </div>

    </div>
@endsection
