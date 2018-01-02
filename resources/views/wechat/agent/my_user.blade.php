@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">头像</th>
                    <th class="text-center">昵称</th>
                    <th class="text-center">车库车辆</th>
                </tr>

                <tr>
                    <td><img src="https://adminlte.io/themes/AdminLTE/dist/img/default-50x50.gif" alt="Product Image"></td>
                    <td style="vertical-align: middle">菊花的笑容</td>
                    <td style="vertical-align: middle"><span class="badge bg-red">23</span></td>
                </tr>
                <tr>
                    <td><img src="https://adminlte.io/themes/AdminLTE/dist/img/default-50x50.gif" alt="Product Image"></td>
                    <td style="vertical-align: middle">菊花的笑容</td>
                    <td style="vertical-align: middle"><span class="badge bg-red">23</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
@endsection