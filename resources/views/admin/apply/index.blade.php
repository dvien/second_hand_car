@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    @include('admin.common.admin_apply_state')

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">处理</th>
                </tr>

                @foreach($pays as $pay)
                <tr>
                    <td>{{ $pay->created_at_str }}</td>
                    <td>{{ $pay->real_name }}</td>
                    <td>
                        <a href="/admin/apply/1">
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
            @if($pays->previousPageUrl())
                <li><a href="{{ $pays->previousPageUrl() }}">«</a></li>
            @endif

            @if($pays->nextPageUrl())
                <li><a href="{{ $pays->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection