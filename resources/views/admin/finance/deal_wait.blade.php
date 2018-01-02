@extends('layouts.adminlte_app')

@section('content')
    @include('admin.common.admin_header')

    <div class="table-striped" style="padding-top: 20px;">
        <table class="table" style="margin-bottom: 0px;">
            <h1>这里详情比较复杂, 涉及数据比较多</h1>
        </table>

        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" style="text-align: left;">处理:</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10">
                            <option>已结算</option>
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