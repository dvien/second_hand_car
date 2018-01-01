@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8 text-center" style="border: 1px #ccc solid;">
            <p>高价收车</p>
            <p>上门评估</p>

            <div>
                <img class="img-responsive" style="min-width: 130px;" src="https://adminlte.io/themes/AdminLTE/dist/img/default-50x50.gif">
            </div>

            <p style="padding-top: 10px;">仅限闽D车</p>
        </div>
        <div class="col-xs-2"></div>
    </div>
@endsection