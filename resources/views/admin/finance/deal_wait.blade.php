@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <style>
        .table>tbody>tr>td {
            vertical-align: middle;
        }
    </style>

    @foreach($finance->cars as $car)
        <div class="table-striped text-center" style="border-top: 1px solid; margin-top: 20px;">
            <table class="table" style="margin-bottom: 0px;">
                <tbody>
                <tr>
                    <td>车主姓名:</td>
                    <td>{{ $car->owner_name }}</td>
                </tr>

                {{--<tr>--}}
                {{--<td>手机号码:</td>--}}
                {{--<td>{{ $car->phone }}</td>--}}
                {{--</tr>--}}

                <tr>
                    <td>品牌车型:</td>
                    <td>{{ $car->brand }}</td>
                </tr>

                <tr>
                    <td>利润:</td>
                    <td>{{ $car->profit }}</td>
                </tr>

                <tr>
                    <td>一级提成:</td>
                    <td>{{ $car->first_price }}</td>
                </tr>

                <tr>
                    <td>二级提成:</td>
                    <td>{{ $car->second_price }}</td>
                </tr>

                <tr>
                    <td>成交日期:</td>
                    <td>{{ $car->deal_ok_date }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    @endforeach

    <div class="table-striped table-responsive text-center" style="border-top: 1px solid; margin-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
            <tr>
                <th class="text-center">日期</th>
                <th class="text-center">收入</th>
                <th class="text-center">分佣</th>
                <th class="text-center">利润</th>
                <th class="text-center">状态</th>
            </tr>

            <tr>
                <td> {{ $finance->start_date }}<br/>{{ $finance->end_date }} </td>
                <td> {{ $finance->income }} </td>
                <td> {{ $finance->commission }} </td>
                <td> {{ $finance->profit }} </td>
                <td> {{ $finance->clear_state_str }} </td>
            </tr>
            </tbody>
        </table>
    </div>

    <form class="form-horizontal" method="POST" action="{{ url("admin/finance/{$finance->id}/deal_wait") }}">
        {{ csrf_field() }}

        <div class="box-body">
            <div class="form-group">
                <label for="clear_state" class="col-sm-2 control-label" style="text-align: left;">处理:</label>

                <div class="col-sm-10">
                    <select class="form-control col-sm-10" name="clear_state" id="clear_state">
                        @foreach($clear_states AS $clear_state)
                        <option value={{ $clear_state['code'] }}>
                            {{ $clear_state['name'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="box-footer text-center" style="border: none;">
                <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>

@endsection