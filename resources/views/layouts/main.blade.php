<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="sortcut icon" href="/img/icon_browser.png" type="image/png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/css/page.css">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="@yield('css')">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>




<body>
    <div class="imagem">
        <a href="/" tabindex="-1">
            <img class="image_logo" src="/img/logo-menu.png" title="Eficiência Fiscal" height="50%">
        </a>
    </div>


    @if(session('msg'))
    @foreach(session('msg') as $msg)
    <script>
        M.toast({
            html: "{{$msg}}",
            classes: 'rounded'
        })
    </script>
    @endforeach
    @endif


    @yield('content')

    <footer>
        <!--<p>Eficiência Fiscal &copy; 2020</p>-->
    </footer>

</body>


<script>
    $(document).ready(function() {
        $('.modal').modal();
    });
    const elemsModal = document.querySelectorAll(".modal");
    const instancesModal = M.Modal.init(elemsModal);

    setTimeout(function() {
        $('#mensagem').fadeOut('slow');
    }, 6000);

    $(document).ready(function() {
        $('.tooltipped').tooltip();
    });

    $(document).ready(function(){
    $('select').formSelect();
  });
</script>

</html>