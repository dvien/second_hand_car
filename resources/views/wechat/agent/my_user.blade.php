@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')



    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">头像</th>
                    <th class="text-center">昵称</th>
                    <th class="text-center">车库车辆</th>
                </tr>

                @foreach($my_users as $my_user)
                <tr>
                    <td><img src="{{ $my_user->wechat_headimgurl }}" style="width: 50px; height: 50px;" alt="微信头像"></td>
                    <td style="vertical-align: middle">{{ $my_user->wechat_nickname }}</td>
                    <td style="vertical-align: middle"><span class="badge bg-red">{{ $my_user->cars->count() }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            @if($my_users->previousPageUrl())
                <li><a href="{{ $my_users->previousPageUrl() }}">«</a></li>
            @endif

            @if($my_users->nextPageUrl())
                <li><a href="{{ $my_users->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection