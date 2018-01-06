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

                @foreach($wechat_users as $wechat_user)
                <tr>
                    <td>{{ $wechat_user->created_at_str }}</td>
                    <td>{{ $wechat_user->name }}</td>
                    <td>
                        <a href="{{ $wechat_user->url }}">
                            <button type="button" class="btn btn-xs btn-block btn-default">详情</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            @if($wechat_users->previousPageUrl())
                <li><a href="{{ $wechat_users->previousPageUrl() }}">«</a></li>
            @endif

            @if($wechat_users->nextPageUrl())
                <li><a href="{{ $wechat_users->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection