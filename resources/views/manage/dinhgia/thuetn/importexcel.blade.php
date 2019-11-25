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

    <h3 class="page-title">Nhận dữ liệu giá thuế tài nguyên<small> từ file Excel</small> </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM -->
                    {!! Form::open(['url'=>'/thuetainguyen/import_excel', 'method'=>'post' , 'files'=>true, 'id' => 'create_hscb','enctype'=>'multipart/form-data']) !!}
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
                                                        <label>Năm</label>
                                                        <select class="form-control" name="nam" id="nam">
                                                            @if ($nam_start = 2015 ) @endif
                                                            @if ($nam_stop = intval(date('Y')) + 1) @endif
                                                            @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                                <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                                            @endfor
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <label>Nhóm tài nguyên</label>
                                                        <select class="form-control" name="manhom" id="manhom">
                                                            @foreach($nhoms as $nhom)
                                                                <option value="{{$nhom->manhom}}">{{$nhom->tennhom}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Level<span class="require">*</span></label>
                                                            {!!Form::text('level', 'A', array('id' => 'level','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã nhóm, loại tài nguyên cấp I <span class="require">*</span></label>
                                                            {!!Form::text('cap1', 'B', array('id' => 'cap1','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã nhóm, loại tài nguyên cấp II<span class="require">*</span></label>
                                                            {!!Form::text('cap2', 'C', array('id' => 'cap2','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã nhóm, loại tài nguyên cấp III<span class="require">*</span></label>
                                                            {!!Form::text('cap3', 'D', array('id' => 'cap3','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã nhóm, loại tài nguyên cấp IV<span class="require">*</span></label>
                                                            {!!Form::text('cap4', 'E', array('id' => 'cap4','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã nhóm, loại tài nguyên cấp V<span class="require">*</span></label>
                                                            {!!Form::text('cap5', 'F', array('id' => 'cap5','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Tên nhóm, loại tài nguyên <span class="require">*</span></label>
                                                            {!!Form::text('ten', 'G', array('id' => 'ten','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                                            {!!Form::text('dvt', 'H', array('id' => 'dvt','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Đơn giá<span class="require">*</span></label>
                                                            {!!Form::text('gia', 'I', array('id' => 'gia','class' => 'form-control required'))!!}
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
                                                            <label class="control-label">Nhận đến dòng</label>
                                                            {!!Form::text('dendong', '111', array('id' => 'dendong','class' => 'form-control','data-mask'=>'fdecimal'))!!}
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
                <a href="{{url('thuetainguyen')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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

            if (!$('#level').val()) {
                str += '  - Level tài nguyên \n';
                $('#level').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#cap1').val()) {
                str += '  - Mã nhóm, loại tài nguyên cấp I \n';
                $('#cap1').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#cap2').val()) {
                str += '  - Mã nhóm, loại tài nguyên cấp II \n';
                $('#cap2').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#cap3').val()) {
                str += '  - Mã nhóm, loại tài nguyên cấp III \n';
                $('#cap3').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#cap4').val()) {
                str += '  - Mã nhóm, loại tài nguyên  cấp IV\n';
                $('#cap4').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#cap5').val()) {
                str += '  - Mã nhóm, loại tài nguyên cấp V\n';
                $('#cap5').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#ten').val()) {
                str += '  - Tên nhóm, loại tài nguyên \n';
                $('#ten').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#dvt').val()) {
                str += '  - Đơn vị tính \n';
                $('#dvt').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#gia').val()) {
                str += '  - Đơn giá \n';
                $('#gia').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#tudong').val()) {
                str += '  - Dòng bắt đầu nhận dữ liệu \n';
                $('#tudong').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dendong').val()) {
                str += '  - Đến dòng dữ liệu \n';
                $('#dendong').parent().addClass('has-error');
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
@stop