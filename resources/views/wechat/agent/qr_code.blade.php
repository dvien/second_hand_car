@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="row">
        <div class="col-xs-1"></div>
        <div class="col-xs-10 text-center">
            <div >
                <img class="img-responsive" src="{{ $qrcode_url }}">
            </div>
        </div>
        <div class="col-xs-1"></div>
    </div>
@endsection