@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        @foreach($car_states AS $car_state)
        <div class="btn-group" role="group">
            <a href="{{ url('wechat/agent/my_car') }}?car_state={{ $car_state['code']}}">
                <button type="button" class="btn btn-flat @if (isset($current_car_state) && $car_state['code'] == $current_car_state) btn-primary @else btn-default @endif" >
                    {{  $car_state['name'] }}
                </button>
            </a>
        </div>
        @endforeach
    </div>

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">汽车品牌</th>
                </tr>

                @foreach($my_cars as $my_car)
                <tr>
                    <td style="vertical-align: middle">{{ $my_car->created_at_str }}</td>
                    <td style="vertical-align: middle">{{ $my_car->brand }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            @if($my_cars->previousPageUrl())
                <li><a href="{{ $my_cars->previousPageUrl() }}">«</a></li>
            @endif

            @if($my_cars->nextPageUrl())
                <li><a href="{{ $my_cars->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </div>
@endsection