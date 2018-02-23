@extends('layouts.adminlte_app')

@section('content')

<style>
body {
    background-color: #0d0d0d;
    color: white;
}

.main-footer{
    background-color: #3d3d3d;
    color: white;
}
</style>

<div class="row">
    <div class="row text-center">
        <div class="col-xs-12">
            <img class="img-responsive" src="{{ asset('images/wechat_agent_create_header.jpg') }}">
        </div>
    </div>

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
        <div class="box-footer text-center" style="background-color: #0d0d0d; border: none;">
            <button type="submit" class="btn btn-info" style="background-color: #505265; border: none;">&nbsp;&nbsp;申请&nbsp;&nbsp;</button>
        </div>
        <!-- /.box-footer -->
    </form>

    <div class="row text-center">
        <div class="col-xs-12">
            <img class="img-responsive" src="{{ asset('images/wechat_agent_create_footer.jpg') }}">
        </div>
    </div>
</div>
@endsection