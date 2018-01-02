@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">￥xxx 可提现</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">￥xxx 处理中</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">￥xxx 已提现</button>
        </div>
    </div>

    <form class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <div class="col-sm-12">
                <label>提现方式</label>
                <select class="form-control">
                    <option>支付宝</option>
                    <option>微信</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">账号:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" placeholder="Password" type="password">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">真实姓名:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" placeholder="Password" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">提现金额:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" placeholder="Password" type="text">
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