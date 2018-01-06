@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

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
            </tbody>
        </table>

        <div class="box-footer text-center" style="border: none;">
            <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
        </div>
    </div>

@endsection