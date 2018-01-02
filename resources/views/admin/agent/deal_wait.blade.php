@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>姓名:</td>
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
                    <td>从事行业:</td>
                    <td>销售</td>
                </tr>

                <tr>
                    <td>职务:</td>
                    <td>望海车行销售经理</td>
                </tr>
            </tbody>
        </table>

        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left;">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10">
                            <option>通过</option>
                            <option>不通过</option>
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