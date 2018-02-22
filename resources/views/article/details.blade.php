@extends("common.layout")

@section("title", $title)

@section("navbar")
    @include("common.navbar")
@endsection

@section("content")

    <ul class="breadcrumb" style="margin-top: 70px;">
        <li><a href="{{ url("/") }}">首頁</a><span> > </span></li>
        <li><a href="{{ url("/article") }}">文章列表</a><span> > </span></li>
        <li class="current">{{ $article -> subject }}</li>
    </ul>

    <div id="content">
        <div id="post">

            <div class="page-header">
                <h1 class="page-title">{{ $article -> subject }}</h1>
            </div>
            <div class="post-meta">
                <p>
                    <i class="icon-calendar"></i> {{ date("Y-m-d", strtotime($article -> publish_date)) }} |
                    <i class="icon-tags"></i>分類： {{ $article -> Category -> name }} |
                    <i class="icon-eye-open"></i>瀏覽次數： {{ $article -> view_count }}
                </p>
            </div>

            <div class="post-entry">
                {{--@if (Model.Photo.Count > 0)--}}
                {{--{--}}
                {{--var photo = Model.Photo.FirstOrDefault();--}}
                {{--var url = Url.Action("ArticlePhoto", "Article", new { id = photo.ID, w = 240, h = 180, fit = true--}}
                {{--});--}}

                {{--<img src="@url" alt="@photo.FileName" class="pull-right span2 clearfix img-rounded"--}}
                {{--style='margin-right: 10px; margin-bottom: 10px; width: 240px; height: 180px;'>--}}
                {{--}--}}
                <span>{!! $article -> content !!}</span>
            </div>

        </div>
        {{--@if (Model.Photo.Count > 1)--}}
        {{--{--}}
        {{--@Html.Partial("_Photos", Model.Photo)--}}
        {{--}--}}
    </div>
@endsection