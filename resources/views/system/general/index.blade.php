@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
        Thông tin <small>cấu hình hệ thống</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        @if(session('admin')->sadmin=='ssa')
                            @if(count($model) >0)
                                <a href="{{url('general/'.$model->id.'/edit')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-edit"></i> Chỉnh sửa </a>
                            @else
                                <a href="{{url('general/create')}}" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus"></i> Thêm mới</a>
                            @endif
                            <a href="{{url('setting')}}" class="btn btn-default btn-sm">
                                <i class="icon-settings"></i> Setting</a>
                        @endif
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user" class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td style="width:15%">
                                <b>Bản quyền thuộc về</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted"><b style="color: blue">CÔNG TY TRÁCH NHIỆM HỮU HẠN PHÁT TRIỂN PHẦN MỀM CUỘC SỐNG</b>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Số đăng ký kinh doanh</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">Số: 0106070279 - Cấp ngày 27/12/2012
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Số đăng ký bản quyền</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">Số: 164/2016/QTG - Cấp ngày 22/04/2016
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Cấp cho đơn vị</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{isset($model) ? $model->tendonvi : ''}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Địa chỉ</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{isset($model) ? $model->diachi : ''}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Thông tin liên hệ</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{isset($model) ? $model->tel : ''}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Thông tin hợp đồng</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted"><p style="color: #0000ff">{{isset($model) ? $model->thongtinhd : ''}}</p>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop