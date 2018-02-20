@extends("common.layout")

@section("title", $title)
@section("content")
    <div class="hero-unit">
        <h1>CashWu - Blog</h1>
        <br/>
        <p class="lead">
            Hello !!
        </p>
    </div>

    <fieldset>
        <legend>最新文章</legend>
        <div class="row">
            @foreach($articles as $article)
                <div class="span8">
                    <h4>
                        <a href="{{ url("/article/details/".$article->id) }}"> {{ $article -> subject }} </a>
                    </h4>
                    <p>
                        {{ $article -> summary }}
                    </p>
                    <p class="pull-right">
                        <i class="icon-calendar"></i> {{ date("Y-m-d", strtotime($article -> created_at)) }}
                    </p>
                </div>
            @endforeach
        </div>
    </fieldset>
@endsection
