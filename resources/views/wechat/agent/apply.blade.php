@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">{{ $can_get_price }} 可提现</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">{{ $getting_price}} 处理中</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">{{ $has_get_price}} 已提现</button>
        </div>
    </div>

    <form class="form-horizontal" method="POST" action="{{ url("wechat/agent/apply") }}">
        {{ csrf_field() }}

        <div class="box-body">
            <div class="form-group">
                <label for="pay_type" class="col-sm-2 control-label">提现方式:</label>

                <div class="col-sm-10">
                    <select class="form-control col-sm-10" name="pay_type" id="pay_type">
                        @foreach($pay_types AS $pay_type)
                            <option value={{ $pay_type['code'] }}>
                                {{ $pay_type['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="account" class="col-sm-2 control-label">账号:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="account" name="account" placeholder="账号" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="real_name" class="col-sm-2 control-label">真实姓名:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="real_name" name="real_name" placeholder="真实姓名" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">提现金额:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="price" name="price" placeholder="提现金额" type="number">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center" style="border: none;">
            <button type="submit" class="btn btn-info">&nbsp;&nbsp;申请&nbsp;&nbsp;</button>
        </div>
        <!-- /.box-footer -->
    </form>

@endsection