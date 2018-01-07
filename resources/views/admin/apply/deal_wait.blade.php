@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>真名:</td>
                    <td>{{ $pay->real_name }}</td>
                </tr>

                <tr>
                    <td>提现类型:</td>
                    <td>{{ $pay->pay_type_str }}</td>
                </tr>

                <tr>
                    <td>提现账号:</td>
                    <td>{{ $pay->account }}</td>
                </tr>

                <tr>
                    <td>提现金额:</td>
                    <td>{{ $pay->price }}</td>
                </tr>

                <tr>
                    <td>提现状态:</td>
                    <td>{{ $pay->pay_state_str }}</td>
                </tr>
            </tbody>
        </table>

        <form class="form-horizontal" method="POST" action="{{ url("admin/apply/{$pay->id}/deal_wait") }}">
            {{ csrf_field() }}

            <div class="box-body">
                <div class="form-group">
                    <label for="pay_state" class="col-sm-2 control-label" style="text-align: left;">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10" id="pay_state" name="pay_state">
                            @foreach($pay_states as $pay_state)
                                <option value="{{ $pay_state['code'] }}">{{ $pay_state['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer text-center" style="border: none;">
                    <button type="submit" class="btn btn-info">&nbsp;&nbsp;确定&nbsp;&nbsp;</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{--<button type="" class="btn">&nbsp;&nbsp;返回&nbsp;&nbsp;</button>--}}
                </div>
            </div>
        </form>


    </div>

@endsection