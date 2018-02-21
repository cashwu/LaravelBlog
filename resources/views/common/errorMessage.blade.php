@if($errors AND count($errors))
    <ul style="color: #ff6666;font-size: larger;">
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </ul>
@endif
