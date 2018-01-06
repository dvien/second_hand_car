@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td>姓名:</td>
                    <td>{{ $wechat_user->name }}</td>
                </tr>

                <tr>
                    <td>性别:</td>
                    <td>{{ $wechat_user->sex_str }}</td>
                </tr>

                <tr>
                    <td>手机号码:</td>
                    <td>{{ $wechat_user->phone }}</td>
                </tr>

                <tr>
                    <td>从事行业:</td>
                    <td>{{ $wechat_user->hangye }}</td>
                </tr>

                <tr>
                    <td>职务:</td>
                    <td>{{ $wechat_user->job }}</td>
                </tr>
            </tbody>
        </table>

        <form class="form-horizontal" method="POST" action="{{ url("admin/agent/{$wechat_user->id}/deal_wait") }}">
            {{ csrf_field() }}

            <div class="box-body">
                <div class="form-group">
                    <label for="wechat_user_type" class="col-sm-2 control-label" style="text-align: left;">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10" name="wechat_user_type" id="wechat_user_type">
                            @foreach($wechat_user_types AS $wechat_user_type)
                                <option value={{ $wechat_user_type['code'] }} @if (old('wechat_user_type') == $wechat_user_type['code']) selected @endif>
                                    {{ $wechat_user_type['name'] }}
                                </option>
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