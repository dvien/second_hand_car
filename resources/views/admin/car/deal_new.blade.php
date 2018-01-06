@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="text-center">
        <a href="tel:{{ $car->phone }}">
            <button type="button" class="btn btn-default">立即联系</button>
        </a>
    </div>

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>车主姓名:</td>
                    <td>{{ $car->owner_name }}</td>
                </tr>

                <tr>
                    <td>性别:</td>
                    <td>{{ $car->owner_sex_str }}</td>
                </tr>

                <tr>
                    <td>手机号码:</td>
                    <td>{{ $car->phone }}</td>
                </tr>

                <tr>
                    <td>品牌车型:</td>
                    <td>{{ $car->brand }}</td>
                </tr>

                <tr>
                    <td>期望售价:</td>
                    <td>{{ $car->price }}</td>
                </tr>

                <tr>
                    <td>预约时间:</td>
                    <td>{{ $car->date }}</td>
                </tr>

                <tr>
                    <td>预约地点:</td>
                    <td>{{ $car->address }}</td>
                </tr>
            </tbody>
        </table>

        <form class="form-horizontal" method="POST" action="{{ url("admin/car/{$car->id}/deal_new") }}">
            {{ csrf_field() }}

            <div class="box-body">
                <div class="form-group">
                    <label for="car_state" class="col-sm-2 control-label">处理:</label>

                    <div class="col-sm-10" id="car_state">
                        <select class="form-control col-sm-10" name="car_state">
                            @foreach($car_states AS $car_state)
                            <option value={{ $car_state['code'] }}>{{ $car_state['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>


    </div>

@endsection