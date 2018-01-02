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

                <tr>
                    <td>利润:</td>
                    <td>995</td>
                </tr>

                <tr>
                    <td>一级提成:</td>
                    <td>995</td>
                </tr>

                <tr>
                    <td>二级提成:</td>
                    <td>995</td>
                </tr>
            </tbody>
        </table>

        <div class="box-footer text-center" style="border: none;">
            <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
        </div>
    </div>

@endsection