@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="row">
        <div class="col-xs-1"></div>
        <div class="col-xs-10 text-center">
            <p>高价收车</p>
            <p>上门评估</p>

            <div>
                <img src="{{ $qrcode_url }}">
            </div>

            <p style="padding-top: 10px;">仅限闽D车</p>
        </div>
        <div class="col-xs-1"></div>
    </div>
@endsection