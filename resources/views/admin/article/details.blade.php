@extends("common.layout")

@section("title", "Admin Article Details" )

@section("navbar")
    @include("common.navbar_admin")
@endsection

@section("content")

    <div style="margin-top: 70px;"></div>

    <div id="content">
        <h3>文章管理</h3>
        <fieldset>
            <legend>詳細內容</legend>

            <dl>
                <dt class="control-label">文章分類</dt>
                <dd>{{ $article -> category -> name }}</dd>

                <dt class="control-label">Subject</dt>
                <dd>{{ $article -> subject }}</dd>

                <dt class="control-label">Summary</dt>
                <dd>{{ $article -> summary }}</dd>

                <dt class="control-label">ContentText</dt>
                <dd>{{ $article -> content }}</dd>

                <dt class="control-label">IsPublish</dt>
                <dd>{{ $article -> is_publish ? "是" : "否" }}</dd>

                <dt class="control-label">PublishDate</dt>
                <dd>{{ $article -> publish_date }}</dd>

                <dt class="control-label">ViewCount</dt>
                <dd>{{ $article -> view_count }}</dd>

                <dt class="control-label">CreateDate</dt>
                <dd>{{ $article -> created_at }}</dd>

                <dt class="control-label">UpdateUser</dt>
                <dd>{{ $article -> updated_at }}</dd>
            </dl>

        </fieldset>

        <div class="form-actions">
            <a class="btn btn-success" href="{{ url("/admin/article/edit/".$article->id) }}">編輯</a>
            | <a class="btn btn-primary" href="{{ url("/admin") }}">回到列表</a>
        </div>
    </div>
@endsection
