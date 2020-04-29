@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif

@foreach($errors->all() as $erorr)
    <p class="alert alert-danger">{{$erorr}}</p>
@endforeach