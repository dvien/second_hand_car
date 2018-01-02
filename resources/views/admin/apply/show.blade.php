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

                <tr>
                    <td>处理状态:</td>
                    <td>已转</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection