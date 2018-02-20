@extends("common.layout")

@section("title", "index")
@section("content")
    <div class="hero-unit">
        <h1>CashWu - Blog</h1>
        <br />
        <p class="lead">
            Hello !!
        </p>
    </div>

    <!-- 測試ddl -->
    {{--@Html.DropDownList("ArticleCategories")--}}

    <!-- 最新文章 -->
    <fieldset>
        <legend>最新文章</legend>
        <div class="row">
            article
        </div>
    </fieldset>
@endsection
