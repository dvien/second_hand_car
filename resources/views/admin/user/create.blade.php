@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="row">
        <form class="form-horizontal" method="POST" action="{{ url("admin/user") }}">
            {{ csrf_field() }}

            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="name" name="name" placeholder="姓名" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">账号:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="email" name="email" placeholder="邮箱账号" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密码:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="password" name="password" placeholder="密码" type="password">
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="inputPassword3" class="col-sm-2 control-label">处理:</label>--}}

                    {{--<div class="col-sm-10">--}}
                        {{--<select class="form-control col-sm-10">--}}
                            {{--<option>启用</option>--}}
                            {{--<option>禁用</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="" class="btn">&nbsp;&nbsp;返回&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>
@endsection