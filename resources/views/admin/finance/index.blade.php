@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    {{--@include('admin.common.admin_finance_state')--}}

    <style>
        .table>tbody>tr>td {
            vertical-align: middle;
        }
    </style>

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">收入</th>
                    <th class="text-center">分佣</th>
                    <th class="text-center">利润</th>
                    <th class="text-center">操作</th>
                </tr>

                @foreach($finances as $finance)
                <tr>
                    <td> {{ $finance->start_date }}<br/>{{ $finance->end_date }} </td>
                    <td> {{ $finance->income }} </td>
                    <td> {{ $finance->commission }} </td>
                    <td> {{ $finance->profit }} </td>
                    <td>
                        <a href="{{ $finance->button['url'] }}">
                            <button type="button" class="btn btn-xs btn-block btn-default">{{ $finance->button['str'] }}</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            @if($finances->previousPageUrl())
                <li><a href="{{ $finances->previousPageUrl() }}">«</a></li>
            @endif

            @if($finances->nextPageUrl())
                <li><a href="{{ $finances->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection