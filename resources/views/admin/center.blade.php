@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    @include('admin.common.admin_car_state')

    <div class="row text-center">
        <a href="{{ url('admin/car') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">车库</div>
        </a>
        <a href="{{ url('admin/agent') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">代理</div>
        </a>
        <a href="{{ url('admin/apply?pay_state=1') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">提现</div>
        </a>
    </div>

    <div class="row text-center">
        <a href="{{ url('admin/user') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">系统设置</div>
        </a>
        <a href="{{ url('admin/finance') }}" style="color: #333;">
            <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">财务</div>
        </a>
        <div class="col-xs-4" style="padding: 20px; border: 1px solid #ccc; line-height: 50px;">&nbsp;</div>
    </div>
@endsection