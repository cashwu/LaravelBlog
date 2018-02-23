@extends("common.layout")

@section("navbar")
    @include("common.navbar_admin")
@endsection

@section("title", "Category")

@section("content")

    <div style="margin-top: 70px;"></div>

    <div class="container">
        <div class="row mb-4">
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="{{ url("admin/category/create") }}" class="btn btn-success">建立分類</a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr style="background-color: #E8EEF4;">
                        <th>#</th>
                        <th>Name</th>
                        <th>CreatedDate</th>
                        <th>UpdateDate</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td> {{ $category -> id }} </td>
                            <td> {{ $category -> name }} </td>
                            <td> {{ $category -> created_at }} </td>
                            <td> {{ $category -> updated_at }} </td>
                            <td>
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                       id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        操作
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item"
                                               href="{{ url("admin/category/details/".$category -> id) }}">檢視</a></li>
                                        <li><a class="dropdown-item"
                                               href="{{ url("admin/category/edit/".$category -> id) }}">編輯</a></li>
                                        <li><a class="dropdown-item"
                                               href="{{ url("admin/category/delete/".$category -> id) }}">刪除</a></li>
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

    {{ $categories ->links() }}
@endsection