@extends("common.layout")

@section("title", $title)

@section("navbar")
    @include("common.navbar")
@endsection

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
                                        {{ Carbon\Carbon::parse($article -> created_at)->format('Y-m-d') }}
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
