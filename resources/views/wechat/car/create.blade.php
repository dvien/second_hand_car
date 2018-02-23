@extends('layouts.adminlte_app')

@section('content')
<style>
body {
    background-color: #30313d;
    color: white;
}
</style>

<div class="">
    <div class="row text-center">
        <div class="col-xs-12">
            <img class="img-responsive" src="{{ asset('images/wechat_car_create_header.jpg') }}">
        </div>
    </div>

    <form class="form-horizontal" method="POST" action="{{ url('wechat/car') }}">
        {{ csrf_field() }}

        <div class="box-body">
            <div class="form-group">
                <label for="owner_name" class="col-sm-2 control-label">车主姓名:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="owner_name" name="owner_name" placeholder="车主姓名" type="text" maxlength=6>
                </div>
            </div>

            <div class="form-group">
                <label for="owner_sex" class="col-sm-2 control-label">性别:</label>

                <div class="col-sm-10">
                    @foreach($owner_sex as $sex)
                        @if($sex['code'] > 0)
                        <div class="radio col-xs-6 text-center">
                            <label>
                                <input name="owner_sex" value={{ $sex['code'] }} checked="" type="radio">
                                {{ $sex['name'] }}
                            </label>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">手机号码:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="phone" name="phone" placeholder="手机号码" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="brand" class="col-sm-2 control-label">品牌车型:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="brand" name="brand" placeholder="品牌车型" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">期望售价:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="price" name="price" placeholder="期望售价" type="text" maxlength="8">
                </div>
            </div>

            <div class="form-group">
                <label for="date" class="col-sm-2 control-label">预约时间:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="date" name="date" placeholder="预约时间" type="date">
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">预约地点:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="address" name="address" placeholder="预约地点" type="text">
                </div>
            </div>
        </div>

        <div class="box-footer text-center" style="border: none; background-color: #30313d;">
            <button type="button" class="btn btn-flat btn-info" style="background-color: #505265; border: none;"
                data-toggle="modal" data-target="#modal-default">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog" style="margin: 200px auto; color: black;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body text-center">
                        <p>请您点击 "确认" 提交信息.</p>
                        <p>我们将尽快联系您.</p>
                        <p>请保持手机通畅！</p>
                    </div>
                    <div class="modal-footer">
                        {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                        <button type="submit" class="btn btn-flat btn-primary" style="background-color: #505265; border: none;">确认</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>

    <div class="row text-center">
        <div class="col-xs-12">
            <img class="img-responsive" src="{{ asset('images/wechat_car_create_footer.jpg') }}">
        </div>
    </div>

    <div class="row navbar-fixed-bottom">
        @if($wechat_user_type == 1)
            <a href="{{ url('wechat/agent/center') }}">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button " class="btn btn-flat btn-primary" style="background-color: #ffa509; border: none; height: 50px;">代理中心</button>
                    </div>
                </div>
            </a>
        @else
            <a href="{{ url('wechat/agent/create') }}">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-flat btn-primary" style="background-color: #ffa509; border: none; height: 50px;">我要代理</button>
                    </div>
                </div>
            </a>
        @endif
    </div>
</div>
@endsection