@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')
<!-- SZ.chat - Código para o Webchat -->
<script type="text/javascript">
    (function(s, z, c, h, a, t) {
        s.SZchat = s.SZchat || function() {
            (s.SZchat.q = s.SZchat.q || []).push(arguments);
        };
        t = z.createElement(c),
            a = z.getElementsByTagName(c)[0];
        t.async = 1;
        t.src = 'https://cdn.webchat.sz.chat/szchat.js';
        a.parentNode.insertBefore(t, a);
        s.SZchat('cid', '60384b218df9bc079852cb62');
        s.SZchat('host', h);
        s.SZchat('szf_name', 'Douglas Jerônimo da Silva');
        s.SZchat('szf_email', 'douglas@eficienciafiscal.com.br');
    })(window, document, 'script', 'https://eficiencia.sz.chat');
</script>

<style>
    d-none {
        display: none,
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    setTimeout(() => {
        console.log($(".sz4-chat-button").classList);
    }, 5000)
</script>
@endsection