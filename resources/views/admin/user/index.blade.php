@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    @include('admin.common.admin_user_state')

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">姓名</th>
                    <th class="text-center">账号</th>
                    {{--<th class="text-center">设置</th>--}}
                </tr>

                @foreach($admin_users as $admin_user)
                <tr>
                    <td>{{ $admin_user->name }}</td>
                    <td>{{ $admin_user->email }}</td>
                    {{--<td>--}}
                        {{--<a href="/admin/user/{{ $admin_user->id }}">--}}
                            {{--<button type="button" class="btn btn-xs btn-block btn-default">详情</button>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            @if($admin_users->previousPageUrl())
                <li><a href="{{ $admin_users->previousPageUrl() }}">«</a></li>
            @endif

            @if($admin_users->nextPageUrl())
                <li><a href="{{ $admin_users->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection