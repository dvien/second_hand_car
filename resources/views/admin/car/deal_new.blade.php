@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="text-center">
        <a href="tel:13459999999">
            <button type="button" class="btn btn-default">立即联系</button>
        </a>
    </div>

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
                    <td>品牌车型:</td>
                    <td>路虎</td>
                </tr>

                <tr>
                    <td>期望售价:</td>
                    <td>998</td>
                </tr>

                <tr>
                    <td>预约时间:</td>
                    <td>2018-02-22</td>
                </tr>

                <tr>
                    <td>预约地点:</td>
                    <td>软件园二期我日路</td>
                </tr>
            </tbody>
        </table>

        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10">
                            <option>洽谈中</option>
                            <option>未成交</option>
                        </select>
                    </div>
                </div>

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>


    </div>

@endsection