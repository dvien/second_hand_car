@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>姓名:</td>
                    <td>{{ $wechat_user->name }}</td>
                </tr>

                <tr>
                    <td>性别:</td>
                    <td>{{ $wechat_user->sex_str }}</td>
                </tr>

                <tr>
                    <td>手机号码:</td>
                    <td>{{ $wechat_user->phone }}</td>
                </tr>

                <tr>
                    <td>从事行业:</td>
                    <td>{{ $wechat_user->hangye }}</td>
                </tr>

                <tr>
                    <td>职务:</td>
                    <td>{{ $wechat_user->job }}</td>
                </tr>

                <tr>
                    <td>处理状态:</td>
                    <td>{{ $wechat_user->wechat_user_type_str }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection