@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    @include('admin.common.admin_car_state')

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">处理</th>
                </tr>

                @foreach($cars AS $car)
                <tr>
                    <td>{{ $car->date }}</td>
                    <td>{{ $car->owner_name }}</td>
                    <td>
                        <a href="/admin/car/{{ $car->id }}">
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
            @if($cars->previousPageUrl())
                <li><a href="{{ $cars->previousPageUrl() }}">«</a></li>
            @endif

            @if($cars->nextPageUrl())
            <li><a href="{{ $cars->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection