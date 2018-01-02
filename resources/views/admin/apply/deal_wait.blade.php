@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>车主姓名:</td>
                    <td>王某某</td>
                </tr>

                <tr>
                    <td>性别:</td>
                    <td>男</td>
                </tr>

                <tr>
                    <td>手机号码:</td>
                    <td>13459999999</td>
                </tr>

                <tr>
                    <td>提现类型:</td>
                    <td>支付宝</td>
                </tr>

                <tr>
                    <td>账号:</td>
                    <td>100000@qq.com</td>
                </tr>

                <tr>
                    <td>提现金额:</td>
                    <td>999</td>
                </tr>
            </tbody>
        </table>

        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10">
                            <option>已转</option>
                        </select>
                    </div>
                </div>

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="" class="btn">&nbsp;&nbsp;返回&nbsp;&nbsp;</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>


    </div>

@endsection