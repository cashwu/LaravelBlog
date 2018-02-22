<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="collapse navbar-collapse" id="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url("/") }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url("/admin") }}">Article</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url("/admin/category") }}">Category</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ url("/admin/logout") }}" method="post">
            {{csrf_field()}}
            {{--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>