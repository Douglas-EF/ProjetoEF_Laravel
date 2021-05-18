<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <h1>Hello Word</h1>
    <a href="/">Voltar</a>  
    @if($nome == 'Douglas')
    <p>O nome é Douglas, e sua idade é {{$idade}}</p>

    @elseif($nome == 'Lucas')
    <p>O nome é {{$nome}}, e sua idade é {{$idade}}</p>

    @else
    <p>O nome não é Douglas, e sua idade é {{$idade}}</p>
    @endif
    
    <p>{{$nome}}</p>

    @for($i = 0; $i < count($array); $i++)
    <p>{{$array[$i]}} - {{$i}}</p>
        @if($i == 2)
        <p>O $i é 2</p>
        @endif
    @endfor

    @foreach($nomes as $value)
    <p>{{$loop->index}}</p>
    <p>{{$value}}</p>

    @endforeach
    @php
     $cidade = 'Ji-Paraná';
     echo $cidade;  
    @endphp

    {{-- Comentário blade --}}


</body>

</html>