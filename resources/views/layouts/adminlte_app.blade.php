<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>二手车</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
</head>

<body class="hold-transition" style="max-width: 680px; margin-left: auto; margin-right: auto;">

<div class="wrapper" style="height: auto; min-height: 100%;">
    <div class="">
        <section class="" style="padding-top: 0px; padding-bottom: 0px;">
            @yield('content')
        </section>
    </div>

    @if(isset($hidden_footer) && $hidden_footer)
        {{-- 设置不需要 footer --}}
    @else
        @include('layouts.adminlte_footer')
    @endif
</div>

<script src="{{ asset('js/adminlte.js') }}"></script>
@include('layouts.adminlte_error_jq')

@yield('content_js')
</body>
</html>
