@extends('main')

@section('custom-style')
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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
        });
    </script>
@stop

@section('content')

    <h3 class="page-title"> </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        Thông tin nhận danh sách hàng hóa<small> từ file Excel</small>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM -->
                    {!! Form::open(['url'=>'/giahhdvkhac/import_excel', 'method'=>'post' , 'files'=>true, 'id' => 'create_hscb','enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <!-- Thông tin chung-->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                Thông tin chung
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body" style="display: block;">

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phân loại nhóm hàng hóa dịch vụ</label>
                                                        {!!Form::select('manhom', $a_nhom, null, array('id' => 'manhom','class' => 'form-control select2me'))!!}
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã hàng hóa<span class="require">*</span></label>
                                                            {!!Form::text('mahhdv', 'B', array('id' => 'mahhdv','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Tên hàng hóa<span class="require">*</span></label>
                                                            {!!Form::text('tenhhdv', 'C', array('id' => 'tenhhdv','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                                            {!!Form::text('dvt', 'D', array('id' => 'dvt','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Đặc điểm kỹ thuật<span class="require">*</span></label>
                                                            {!!Form::text('dacdiemkt', 'E', array('id' => 'dacdiemkt','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Nguồn gốc / Xuất xứ<span class="require">*</span></label>
                                                            {!!Form::text('xuatxu', 'F', array('id' => 'xuatxu','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá liền kề<span class="require">*</span></label>
                                                            {!!Form::text('gialk', 'G', array('id' => 'gialk','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá hàng hóa<span class="require">*</span></label>
                                                            {!!Form::text('gia', 'H', array('id' => 'gia','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Nhận từ dòng<span class="require">*</span></label>
                                                            {!!Form::text('tudong', '4', array('id' => 'tudong','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Số lượng cán bộ</label>
                                                            {!!Form::text('sodong', '100', array('id' => 'sodong','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <!--/span-->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">File thông tin<span class="require">*</span></label>
                                                            <input id="fexcel" name="fexcel" type="file" class="form-control required" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PORTLET-->
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Nhận dữ liệu</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Tải lại</button>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script>
    $(function() {
        $('#create_hscb :submit').click(function () {
            var str = '';
            var ok = true;

            if (!$('#mahhdv').val()) {
                str += '  - Mã hàng hóa \n';
                $('#mahhdv').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#tenhhdv').val()) {
                str += '  - Tên hàng hóa \n';
                $('#tenhhdv').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dvt').val()) {
                str += '  - Đơn vị tính \n';
                $('#dvt').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dacdiemkt').val()) {
                str += '  - Đặc điểm kỹ thuật \n';
                $('#dacdiemkt').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#xuatxu').val()) {
                str += '  - Nguồn gốc / Xuất xứ \n';
                $('#xuatxu').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#gialk').val()) {
                str += '  - Giá liền kề \n';
                $('#gialk').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#gialk').val()) {
                str += '  - Giá hàng hóa \n';
                $('#gialk').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#tudong').val()) {
                str += '  - Dòng bắt đầu nhận dữ liệu \n';
                $('#tudong').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#sodong').val()) {
                str += '  - Số dòng dữ liệu \n';
                $('#sodong').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#fexcel').val()) {
                str += '  - File Excel \n';
                $('#fexcel').parent().addClass('has-error');
                ok = false;
            }

            if (ok == false) {
                alert('Các trường: \n' + str + 'Không được để trống');
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else {
                $("form").unbind('submit').submit();
            }
        });
    });
    </script>
@stop