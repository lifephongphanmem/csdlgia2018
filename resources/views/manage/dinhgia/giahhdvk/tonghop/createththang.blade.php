@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Tổng hợp hồ sơ giá hàng hóa dịch vụ<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'tonghopgiahhdvk', 'id' => 'create_tonghopgiahhdvk', 'class'=>'horizontal-form']) !!}
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Theo thông tư quyết định:</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$modelnhom->tentt}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Phân loại báo cáo:</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">
                                         Tháng
                                        </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tháng báo cáo:</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$inputs['thangbct']}}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Năm báo cáo:</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$inputs['nambct']}}</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số báo cáo<span class="require">*</span></label>
                                    {!!Form::text('sobc',null, array('id' => 'sobc','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày báo cáo<span class="require">*</span></label>
                                    {!!Form::text('ngaybc',null, array('id' => 'ngaybc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <input type="hidden" name="matt" id="matt" value="{{$inputs['mattbct']}}">
                        <input type="hidden" name="phanloai" id="phanloai" value="{{$inputs['phanloaibct']}}">
                        <input type="hidden" name="thang" id="thang" value="{{$inputs['thangbct']}}">
                        <input type="hidden" name="nam" id="nam" value="{{$inputs['nambct']}}">
                        <input type="hidden" name="mahs" id="mahs" value="{{$inputs['mahs']}}">


                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã nhóm<br>hàng hóa<br>dịch vụ</th>
                                        <th style="text-align: center">Tên nhóm<br>hàng hóa<br>dịch vụ</th>
                                        <th style="text-align: center">Mã<br>hàng hóa<br>dịch vụ</th>
                                        <th style="text-align: center" width="25%">Tên hàng hóa dịch vụ</th>
                                        <th style="text-align: center">Đặc điểm kinh tế,<br>kỹ thuật, quy cách</th>
                                        <th style="text-align: center" width="10%">Đơn vị tính</th>
                                        <th style="text-align: center" width="10%">Đơn giá liền kề</th>
                                        <th style="text-align: center" width="10%">Đơn giá</th>
                                        <th style="text-align: center" width="15%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                        @foreach($modelct as $key=>$tt)
                                            <tr>
                                                <td style="text-align: center">{{$key+1}}</td>
                                                <td style="text-align: center">{{$tt->manhom}}</td>
                                                <td>{{$tt->nhom}}</td>
                                                <td style="text-align: center">{{$tt->mahhdv}}</td>
                                                <td class="active" style="font-weight: bold">{{$tt->tenhhdv}}</td>
                                                <td>{{$tt->dacdiemkt}}</td>
                                                <td style="text-align: center">{{$tt->dvt}}</td>
                                                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gialk,5)}}</td>
                                                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gia,5)}}</td>
                                                <td>
                                                    <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Kê khai</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a href="{{url('tonghopgiahhdvk?&matt='.$inputs['mattbct'].'&phanloai='.$inputs['phanloaibct'])}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->

            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_tonghopgiahhdvk").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

    @include('manage.dinhgia.giahhdvk.tonghop.modalct')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')

@stop