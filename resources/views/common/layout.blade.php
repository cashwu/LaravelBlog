<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield("title")</title>
    <link href="{{ asset("content/bootstrap.css")  }}" rel="stylesheet"/>
    <link href="{{ asset("content/bootstrap-responsive.css") }}" rel="stylesheet"/>
    <link href="{{ asset("content/Frontend.css") }}" rel="stylesheet"/>
</head>
<body>
<div class="container">
    @include("common.sitemap")

    @yield("content")

    @include("common.footer")
</div>

<script src="{{ asset("script/jquery-1.9.1.min.js") }}"></script>
<script src="{{ asset("script/bootstrap.min.js") }}"></script>
</body>
</html>