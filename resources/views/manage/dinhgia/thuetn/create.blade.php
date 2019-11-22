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
        Bảng giá tính thuế tài nguyên trên địa bàn<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->
    <hr>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'thuetainguyen', 'id' => 'create_giathitruong', 'class'=>'horizontal-form']) !!}
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <h4 style="color: blue">Thông tin hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Năm báo cáo</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$inputs['add_nam']}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nhóm tài nguyên</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$modelnhom->tennhom}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày quyết định<span class="require">*</span></label>
                                    {!!Form::text('ngayqd',null, array('id' => 'ngayqd','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Cơ quan ban hành</label>
                                    {!!Form::text('cqbh',null, array('id' => 'cqbh','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mahs" id="mahs" value="{{$inputs['mahs']}}">
                        <input type="hidden" name="nam" id="nam" value="{{$inputs['add_nam']}}">
                        <input type="hidden" name="manhom" id="manhom" value="{{$inputs['add_manhom']}}">

                        <h4 style="color: blue">Thông tin chi tiết</h4>

                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 1</th>
                                        <th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 2</th>
                                        <th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 3</th>
                                        <th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br>cấp 4</th>
                                        <th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 5</th>
                                        <th style="text-align: center">Tên nhóm, loại<br> tài nguyên</th>
                                        <th style="text-align: center" width="5%">Đơn <br>vị<br> tính</th>
                                        <th style="text-align: center" width="10%" >Giá tính <br>thuế tài nguyên<br> (đồng)</th>
                                        <th style="text-align: center" width="10%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                        @foreach($modelct as $key=>$tt)
                                            <tr>
                                                <td style="text-align: center">{{$key+1}}</td>
                                                <td style="text-align: center">{{$tt->cap1}}</td>
                                                <td style="text-align: center">{{$tt->cap2}}</td>
                                                <td style="text-align: center">{{$tt->cap3}}</td>
                                                <td style="text-align: center">{{$tt->cap4}}</td>
                                                <td style="text-align: center">{{$tt->cap5}}</td>
                                                <td class="active" style="font-weight: bold">{{$tt->ten}}</td>
                                                <td style="text-align: center">{{$tt->dvt}}</td>
                                                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gia,5)}}</td>
                                                <td>
                                                    <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Nhập giá</button>
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
                    <a href="{{url('thuetainguyen?&manhom='.$inputs['add_manhom'])}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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
            var validator = $("#create_giathitruong").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

    @include('manage.dinhgia.thuetn.modal')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop