@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="row">
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">姓名:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputEmail3" placeholder="Email" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">账号:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputEmail3" placeholder="Email" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">密码:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputEmail3" placeholder="Email" type="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10">
                            <option>启用</option>
                            <option>禁用</option>
                        </select>
                    </div>
                </div>

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="" class="btn">&nbsp;&nbsp;返回&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>
@endsection