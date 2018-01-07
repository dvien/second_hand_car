@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">提现金额</th>
                    <th class="text-center">状态</th>
                </tr>

                @foreach($my_applies as $my_apply)
                <tr>
                    <td>{{ $my_apply->created_at_str }}</td>
                    <td>{{ $my_apply->price }}</td>
                    <td>{{ $my_apply->pay_state_str }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            @if($my_applies->previousPageUrl())
                <li><a href="{{ $my_applies->previousPageUrl() }}">«</a></li>
            @endif

            @if($my_applies->nextPageUrl())
                <li><a href="{{ $my_applies->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection
