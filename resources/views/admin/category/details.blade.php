@extends("common.layout")

@section("title", "Admin Article Details" )

@section("navbar")
    @include("common.navbar_admin")
@endsection

@section("content")

    <div style="margin-top: 70px;"></div>

    <div id="content">
        <h3>分類管理</h3>
        <fieldset>
            <legend>詳細內容</legend>

            <dl>
                <dt class="control-label">name</dt>
                <dd>{{ $category -> name }}</dd>

                <dt class="control-label">CreateDate</dt>
                <dd>{{ $category -> created_at }}</dd>

                <dt class="control-label">UpdateUser</dt>
                <dd>{{ $category -> updated_at }}</dd>
            </dl>

        </fieldset>

        <div class="form-actions">
            <a class="btn btn-success" href="{{ url("/admin/category/edit/".$category->id) }}">編輯</a>
            | <a class="btn btn-primary" href="{{ url("/admin/category") }}">回到列表</a>
        </div>
    </div>
@endsection
