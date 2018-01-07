@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>真名:</td>
                    <td>{{ $pay->real_name }}</td>
                </tr>

                <tr>
                    <td>提现类型:</td>
                    <td>{{ $pay->pay_type_str }}</td>
                </tr>

                <tr>
                    <td>提现账号:</td>
                    <td>{{ $pay->account }}</td>
                </tr>

                <tr>
                    <td>提现金额:</td>
                    <td>{{ $pay->price }}</td>
                </tr>

                <tr>
                    <td>提现状态:</td>
                    <td>{{ $pay->pay_state_str }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection