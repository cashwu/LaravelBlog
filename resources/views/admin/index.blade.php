@extends("common.layout")

@section("title", "Admin")

@section("navbar")
    @include("common.navbar_admin")
@endsection


@section("content")

    <div style="margin-top: 70px;"></div>

    {{--@Html.BeginForm("Index", "Article", FormMethod.Get, new { @class = "form-search pull-right" })--}}
    {{--{--}}
    {{--<div class="input-append">--}}
    {{--@Html.HiddenFor(a => a.Page)--}}
    {{--@Html.HiddenFor(a => a.PageSize)--}}
    {{--@Html.HiddenFor(a => a.Column)--}}
    {{--@Html.HiddenFor(a => a.Order)--}}

    {{--@Html.TextBoxFor(a => a.Keyword,new {@class="input-small search-query" ,placeholder="搜尋 ..."})--}}

    {{--<button type="submit" class="btn"><i class="icon icon-search"></i></button>--}}
    {{--</div>--}}
    {{--}--}}

    <div class="container">
        <div class="row mb-4">
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="{{ url("admin/article/create") }}" class="btn btn-success">建立文章</a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr style="background-color: #E8EEF4;">
                        <th>#</th>
                        <th>Category</th>
                        <th>Subject</th>
                        <th>IsPublish</th>
                        <th>PublishDate</th>
                        <th>ViewCount</th>
                        <th>CreatedDate</th>
                        <th>UpdateDate</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td> {{ $article -> id }} </td>
                            <td> {{ $article -> category -> name }} </td>
                            <td> {{ $article -> subject }} </td>
                            <td> {{ $article -> is_publish ? "是" : "否" }} </td>
                            <td> {{ date("Y-m-d", strtotime($article -> publish_date)) }} </td>
                            <td> {{ $article -> view_count }} </td>
                            <td> {{ $article -> created_at }} </td>
                            <td> {{ $article -> updated_at }} </td>
                            <td>
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        操作
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item"
                                               href="{{ url("admin/article/details/".$article -> id) }}">檢視</a></li>
                                        <li><a class="dropdown-item"
                                               href="{{ url("admin/article/edit/".$article -> id) }}">編輯</a></li>
                                        <li><a class="dropdown-item"
                                               href="{{ url("admin/article/delete/".$article -> id) }}">刪除</a></li>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $articles->links() }}

@endsection

