@extends('main')

@section('custom-style')
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--Date-->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <!--End Date-->
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/admin/pages/scripts/form-wizard.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            FormWizard.init();
            //TableManaged.init();
            $(":input").inputmask();
        });
    </script>
@stop

@section('content')

    <h3 class="page-title">Nhận dữ liệu giá bán - thuê mua nhà tái định cư<small> từ file Excel</small> </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM -->
                    {!! Form::open(['url'=>'/bannhataidinhcu/importexcel', 'method'=>'post' , 'files'=>true, 'id' => 'create_hscb','enctype'=>'multipart/form-data']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <!-- Thông tin chung-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet-body" style="display: block;">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Số quyết định<span class="require">*</span></label>
                                                    {!!Form::text('soqd', 'A', array('id' => 'soqd','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
                                                    {!!Form::text('ngayapdung', 'B', array('id' => 'ngayapdung','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Địa bàn<span class="require">*</span></label>
                                                    {!!Form::text('diaban', 'C', array('id' => 'diaban','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Mô tả<span class="require">*</span></label>
                                                    {!!Form::text('mota', 'D', array('id' => 'mota','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Giá chưa thuế<span class="require">*</span></label>
                                                    {!!Form::text('giachuathue', 'E', array('id' => 'giachuathue','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Thuế VAT<span class="require">*</span></label>
                                                    {!!Form::text('thuevat', 'F', array('id' => 'thuevat','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Giá có thuế<span class="require">*</span></label>
                                                    {!!Form::text('giacothue', 'G', array('id' => 'giacothue','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Đơn vị tính</label>
                                                    {!!Form::text('dvt', 'H', array('id' => 'dvt','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Phí bảo vệ môi trường tyle<span class="require">*</span></label>
                                                    {!!Form::text('phibvmttyle', '111', array('id' => 'ghichu','class' => 'form-control required'))!!}
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Phí bảo vệ môi trường<span class="require">*</span></label>
                                                    {!!Form::text('phibvmt', '111', array('id' => 'phibvmt','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Thành tiền</label>
                                                    {!!Form::text('thanhtien', '111', array('id' => 'thanhtien','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">File dữ liệu<span class="require">*</span></label>
                                                    <input id="fexcel" name="fexcel" type="file"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
                            </div>
                        </div>
                    </div>


                    <!-- END FORM-->
                </div>
            </div>
            <div class="col-md-12" style="text-align: center">
                <a href="{{url('gianuocsachsinhhoat')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn default"><i class="fa fa-refresh"></i> Tải lại</button>
                <button type="submit" class="btn green" onclick="ClickCreate()" id="submitform" name="submitform"><i class="fa fa-plus"></i> Nhận dữ liệu</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script>
        function ClickCreate(){
            var str = '';
            var ok = true;

            if (!$('#ngayapdung').val()) {
                str += '  - Ngày áp dụng \n';
                $('#ngayapdung').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#soqd').val()) {
                str += '  - Số quyết định \n';
                $('#soqd').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#mota').val()) {
                str += '  - Mô tả \n';
                $('#mota').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#ghichu').val()) {
                str += '  - Ghi chú \n';
                $('#ghichu').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giacothue').val()) {
                str += '  - Giá có thuế \n';
                $('#giacothue').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#fexcel').val()) {
                str += '  - File Excel \n';
                $('#fexcel').parent().addClass('has-error');
                ok = false;
            }

            if (ok == false) {
                //alert('Các trường: \n' + str + 'Không được để trống');
                toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else {
                $("form").unbind('submit').submit();
                var btn = document.getElementById('submitform');
                btn.disabled = true;
                btn.innerText = 'Loading...'
            }
        }

    </script>
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop