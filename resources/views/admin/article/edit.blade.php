@extends("common.layout")

@section("title", "Admin Article Create" )

@section("navbar")
    @include("common.navbar_admin")
@endsection

@section("content")

    <div style="margin-top: 70px;"></div>

    <h3>文章管理</h3>

    @include("common.errorMessage")

    <fieldset>
        <legend>編輯</legend>

        <form action="{{ url("/admin/article/edit/".$article -> id ) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($category as $item)
                        <option value="{{ $item -> id }}" {{ $item -> id == $article -> category_id ? "selected" : "" }} >
                            {{ $item -> name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject"
                       value="{{ old("subject", $article -> subject) }}">
            </div>
            <div class="form-group">
                <label for="summary">Summary</label>
                <input type="text" class="form-control" id="summary" name="summary"
                       value="{{ old("summary", $article -> summary) }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="5" class="form-control" id="content" name="content"
                >{{ old("content", $article -> content) }}</textarea>
            </div>
            <div class="form-group" style="position:relative;">
                <label for="publish_date">Publish Date</label>
                <input type="text" class="form-control" id="publish_date" name="publish_date"
                       value="{{ old("publish_date", $article -> publish_date) }}">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_publish" name="is_publish"
                            {{ old("is_publish", $article -> is_publish) == true ? "checked" : ""  }} >
                    <label class="form-check-label" for="is_publish">Is Publish</label>
                </div>
            </div>
            {{--<div class="form-group">--}}
            {{--<label>檔案上傳</label>--}}
            {{--<div class="form-controls">--}}
            {{--<div>--}}
            {{--<input type="file" name="Uploads[0]"/>--}}
            {{--</div>--}}
            {{--<div>--}}
            {{--<input type="file" name="Uploads[1]"/>--}}
            {{--</div>--}}
            {{--<div>--}}
            {{--<input type="file" name="Uploads[2]"/>--}}
            {{--</div>--}}
            {{--<div>--}}
            {{--<input type="file" name="Uploads[3]"/>--}}
            {{--</div>--}}
            {{--<div>--}}
            {{--<input type="file" name="Uploads[4]"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="form-actions">
                <input type="submit" class="btn btn-success" value="儲存"/>
                | <a class="btn btn-primary" href="{{ url("/admin") }}">回到列表</a>
            </div>
        </form>
    </fieldset>
@endsection

@section("script")
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#publish_date').datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endsection
