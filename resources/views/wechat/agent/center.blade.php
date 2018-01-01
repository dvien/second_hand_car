@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="row text-center">
        <a href="{{ url('wechat/agent/rule') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">代理规则</div>
        </a>
        <a href="{{ url('wechat/agent/qr_code') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">推广二维码</div>
        </a>
        <a href="{{ url('wechat/agent/my_user') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">我的团队</div>
        </a>
    </div>

    <div class="row text-center">
        <a href="{{ url('wechat/agent/my_car') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">我的车库</div>
        </a>
        <a href="{{ url('wechat/agent/my_account') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">我的账户</div>
        </a>
        <a href="{{ url('wechat/agent/apply') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">申请提现</div>
        </a>
    </div>
@endsection