@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div class="row">
        <div class="col-xs-12 text-center" style="width: 100%;">
            <img class="img-responsive" src="{{ $qrcode_url }}">
        </div>
    </div>
@endsection