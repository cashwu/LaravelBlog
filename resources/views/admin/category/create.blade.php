@extends("common.layout")

@section("title", "Admin Article Create" )

@section("navbar")
    @include("common.navbar_admin")
@endsection

@section("content")

    <div style="margin-top: 70px;"></div>

    <h3>分類管理</h3>

    @include("common.errorMessage")

    <fieldset>
        <legend>建立</legend>

        <form action="{{ url("/admin/category/create") }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old("name") }}">
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" value="建立"/>
                | <a class="btn btn-primary" href="{{ url("/admin/category") }}">回到列表</a>
            </div>
        </form>
    </fieldset>
@endsection

