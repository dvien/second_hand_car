@extends('layouts.adminlte_app')

@component('layouts.adminlte_header')
<h1>高价收车, 上门评估</h1>
<div>仅限闽D车</div>
@endcomponent

@section('content')
<div class="row">
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
                    <input class="form-control" id="price" name="price" placeholder="期望售价" type="text">
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

        <div class="box-footer text-center" style="border: none;">
            <button type="submit" class="btn btn-info">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
        </div>
    </form>

    <div class="row text-center" style="padding-top: 10px">
        <div class="col-xs-2"></div>
        <div class="col-xs-2">
            <img src="https://adminlte.io/themes/AdminLTE/dist/img/default-50x50.gif" alt="Product Image">
        </div>
        <div class="col-xs-6">
            <div class="product-description">我们有渠道优势</div>
            <div class="product-description">让您的车更值钱</div>
        </div>
        <div class="col-xs-2"></div>
    </div>

    <div class="row text-center" style="padding-top: 10px">
        <div class="col-xs-2"></div>
        <div class="col-xs-2">
            <img src="https://adminlte.io/themes/AdminLTE/dist/img/default-50x50.gif" alt="Product Image">
        </div>
        <div class="col-xs-6">
            <div class="product-description">价格满意，立即打款</div>
            <div class="product-description">让您迅速回笼资金</div>
        </div>
        <div class="col-xs-2"></div>
    </div>

    <div class="row text-center" style="padding-top: 10px">
        <div class="col-xs-2"></div>
        <div class="col-xs-2">
            <img src="https://adminlte.io/themes/AdminLTE/dist/img/default-50x50.gif" alt="Product Image">
        </div>
        <div class="col-xs-6">
            <div class="product-description">预约您方便的时间</div>
            <div class="product-description">我们亲自上门评估</div>
        </div>
        <div class="col-xs-2"></div>
    </div>

    <div class="row" style="position:fixed;  bottom:0;">
        @if($wechat_user_type == 1)
            <a href="{{ url('wechat/agent/center') }}">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button " class="btn btn-flat btn-primary">代理中心</button>
                    </div>
                </div>
            </a>
        @else
            <a href="{{ url('wechat/agent/create') }}">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-flat btn-primary">我要代理</button>
                    </div>
                </div>
            </a>
        @endif
    </div>

    <div style="padding-top: 20px;"></div>
</div>
@endsection