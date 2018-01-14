@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div class="row">
        <div class="col-xs-1"></div>

        <div class="col-xs-10 text-center" style="width: 100%;">
            <img class="img-responsive" src="{{ $qrcode_url }}">
        </div>

        <div class="col-xs-1"></div>
    </div>
@endsection