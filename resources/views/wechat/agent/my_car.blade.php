@extends('layouts.adminlte_app')

@section('content')
    @include('wechat.common.wechat_header')

    <div style="padding-top: 30px;"></div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">新入库</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">成交</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">未成交</button>
        </div>
    </div>

    <div class="table-striped text-center">
        <table class="table" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <th class="text-center">日期</th>
                    <th class="text-center">汽车品牌</th>
                </tr>

                <tr>
                    <td style="vertical-align: middle">2017.12.21</td>
                    <td style="vertical-align: middle">路虎</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">2017.12.21</td>
                    <td style="vertical-align: middle">飞虎</td>
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