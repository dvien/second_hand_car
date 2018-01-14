@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <style>
        .icon {
            width: 40px;
        }
    </style>



    <div class="row text-center">
        <a href="{{ url('wechat/agent/rule') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 30px;">
                <div>
                    <img class="icon" src="{{ asset('images/rule.png') }}">
                </div>
                代理规则
            </div>
        </a>
        <a href="{{ url('wechat/agent/qr_code') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 30px;">
                <div>
                    <img class="icon" src="{{ asset('images/qr_code.png') }}">
                </div>
                推广二维码
            </div>
        </a>
        <a href="{{ url('wechat/agent/my_user') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 30px;">
                <div>
                    <img class="icon" src="{{ asset('images/my_user.png') }}">
                </div>
                我的团队
            </div>
        </a>
    </div>

    <div class="row text-center">
        <a href="{{ url('wechat/agent/my_car') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 30px;">
                <div>
                    <img class="icon" src="{{ asset('images/my_car.png') }}">
                </div>
                我的车库
            </div>
        </a>
        <a href="{{ url('wechat/agent/my_account') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 30px;">
                <div>
                    <img class="icon" src="{{ asset('images/my_account.png') }}">
                </div>
                我的账户
            </div>
        </a>
        <a href="{{ url('wechat/agent/apply') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 30px;">
                <div>
                    <img class="icon" src="{{ asset('images/apply.png') }}">
                </div>
                申请提现
            </div>
        </a>
    </div>
@endsection