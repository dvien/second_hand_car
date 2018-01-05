@extends('layouts.adminlte_app')

@component('layouts.adminlte_header')
<h1>我要代理</h1>
@endcomponent

@section('content')
<div class="row">
    <form class="form-horizontal" method="POST" action="{{ url('wechat/agent') }}">
        {{ csrf_field() }}

        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">姓名:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="name" name="name" placeholder="姓名" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="sex" class="col-sm-2 control-label">性别:</label>

                <div class="col-sm-10">
                    @foreach($sex as $value)
                        @if($value['code'] > 0)
                            <div class="radio col-xs-6 text-center">
                                <label>
                                    <input name="sex" value={{ $value['code'] }} checked="" type="radio">
                                    {{ $value['name'] }}
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
                <label for="hangye" class="col-sm-2 control-label">从事行业:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="hangye" name="hangye" placeholder="从事行业" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="job" class="col-sm-2 control-label">职务:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="job" name="job" placeholder="职务" type="text">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center" style="border: none;">
            <button type="submit" class="btn btn-info">&nbsp;&nbsp;申请&nbsp;&nbsp;</button>
        </div>
        <!-- /.box-footer -->
    </form>

    <div class="row" style="padding-top: 10px">
        <div class="col-xs-12">
            <div class="product-description">您需要做什么：</div>
            <div class="product-description">
                1.代理申请通过后，您只需分享推广“高价收车，上门评估”页面即可，0门槛；
                <br>
                2.您也可以发展更多的人成为您的代理，帮您推广
            </div>
        </div>
    </div>

    <div class="row" style="padding-top: 10px">
        <div class="col-xs-12">
            <div class="product-description">您将得到什么：</div>
            <div class="product-description">
                1.在您推广的页面里，只要有客户提交卖车信息，并且我们联系后成功收车，您将获得可观的提成；
                <br>
                2.您发展代理推广，收车成功后，您也将获得一笔提成
            </div>
        </div>
    </div>
</div>
@endsection