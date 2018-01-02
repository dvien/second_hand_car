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

                <tr>
                    <td>处理状态:</td>
                    <td>通过</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection