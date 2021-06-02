@if ($errors->any())
<div class="alert alert-warnig">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(session('sucesso'))
    <div class="alert alert-success">
        {{session('sucesso')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif