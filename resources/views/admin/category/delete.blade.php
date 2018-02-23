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
            <legend>刪除文章</legend>

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
            <a class="btn btn-success" id="deleteBtn" href="#">刪除</a>
            | <a class="btn btn-primary" href="{{ url("/admin/category") }}">回到列表</a>
        </div>
    </div>

    <div id="ConfirmModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">刪除確認</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="error-text"> 是否確定要刪除此分類? </p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url("/admin/category/delete/".$category -> id) }}" method="post">
                        {{ csrf_field() }}
                        <button class="btn btn-info" data-dismiss="modal">取消</button>
                        <input type="submit" class="btn btn-danger" value="刪除"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("script")
    <script type="text/javascript">
        $(function () {
            $("#deleteBtn").click(function (e) {
                e.preventDefault();
                $('#ConfirmModal').modal('show');
            });
        });
    </script>
@endsection
