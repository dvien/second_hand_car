@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    @include('admin.common.admin_agent_state')

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">处理</th>
                </tr>

                <tr>
                    <td>2017.12.21</td>
                    <td>菊花</td>
                    <td>
                        <a href="/admin/agent/1">
                            <button type="button" class="btn btn-xs btn-block btn-default">详情</button>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>2017.12.21</td>
                    <td>菊花</td>
                    <td>
                        <a href="/admin/agent/1/deal_wait">
                            <button type="button" class="btn btn-xs btn-block btn-default">详情</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
@endsection