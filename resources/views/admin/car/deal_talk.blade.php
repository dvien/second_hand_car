@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="text-center">
        <a href="tel:13459999999">
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

        <form class="form-horizontal" method="POST" action="{{ url("admin/car/{$car->id}/deal_talk") }}">
            {{ csrf_field() }}

            <div class="box-body">
                <div class="form-group">
                    <label for="car_state" class="col-sm-2 control-label">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10" name="car_state" id="car_state">
                            @foreach($car_states AS $car_state)
                                <option value={{ $car_state['code'] }} @if (old('car_state') == $car_state['code']) selected @endif>
                                    {{ $car_state['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group" id="profit_div">
                    <label for="profit" class="col-sm-2 control-label">利润:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="profit" name="profit" placeholder="利润" type="text">
                    </div>
                </div>

                @if($car->first_wechat_user_id)
                <div class="form-group" id="first_price_div">
                    <label for="first_price" class="col-sm-2 control-label">一级提成:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="first_price" name="first_price" placeholder="一级提成" type="text">
                    </div>
                </div>
                @endif

                @if($car->second_wechat_user_id)
                <div class="form-group" id="second_price_div">
                    <label for="second_price" class="col-sm-2 control-label">二级提成:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="second_price" name="second_price" placeholder="二级提成" type="text">
                    </div>
                </div>
                @endif

                <div class="form-group" id="description_div">
                    <label for="description" class="col-sm-2 control-label">情况:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="description" name="description" placeholder="情况" type="text">
                    </div>
                </div>

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('content_js')
<script language="javascript" type="text/javascript">
$(document).ready(function() {
    // 初始化时
    changeByCarState($('#car_state').val());

    // 状态变更时
    $('#car_state').change(function() {
        changeByCarState($('#car_state').val());
    });

    // 处理选项变化, 填写字段也跟着变
    function changeByCarState(carState) {
        var profitDiv = $('#profit_div');
        var firstPriceDiv = $('#first_price_div');
        var secondPriceDiv = $('#second_price_div');
        var description = $('#description_div');

        switch (parseInt(carState)) {
            case {{\App\Models\Car::TALK_CAR_CODE}}:
                profitDiv.hide();
                firstPriceDiv.hide();
                secondPriceDiv.hide();
                description.show();
                break;
            case {{\App\Models\Car::DONE_CAR_CODE}}:
                profitDiv.show();
                firstPriceDiv.show();
                secondPriceDiv.show();
                description.hide();
                break;
            case {{\App\Models\Car::UNDONE_CAR_CODE}}:
                profitDiv.hide();
                firstPriceDiv.hide();
                secondPriceDiv.hide();
                description.hide();
                break;
        }
    }
});
</script>
@endsection
