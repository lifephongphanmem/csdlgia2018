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
                                                    <label>Địa bàn</label>
                                                    <select class="form-control" name="district" id="district">
                                                        @foreach($districts as $district)
                                                            <option value="{{$district->district}}">{{$district->diaban}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Tên dự án<span class="require">*</span></label>
                                                    {!!Form::text('tenduan', 'A', array('id' => 'tenduan','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Thời điểm khởi công<span class="require">*</span></label>
                                                    {!!Form::text('thoidiemkc', 'B', array('id' => 'thoidiemkc','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Thời điểm hoàn thành<span class="require">*</span></label>
                                                    {!!Form::text('thoidiemht', 'C', array('id' => 'thoidiemht','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Đơn giá bán<span class="require">*</span></label>
                                                    {!!Form::text('dongiaban', 'D', array('id' => 'dongiaban','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Đơn giá thuê mua<span class="require">*</span></label>
                                                    {!!Form::text('dongiathuemua', 'E', array('id' => 'dongiathuemua','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Số QĐ phê duyệt giá<span class="require">*</span></label>
                                                    {!!Form::text('ttqd', 'F', array('id' => 'ttqd','class' => 'form-control required'))!!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Ghi chú<span class="require">*</span></label>
                                                    {!!Form::text('ghichu', 'G', array('id' => 'ghichu','class' => 'form-control required'))!!}
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
                <a href="{{url('bannhataidinhcu')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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

            if (!$('#thoidiem').val()) {
                str += '  - Thời điểm \n';
                $('#thoidiem').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#tenduan').val()) {
                str += '  - Tên dự án \n';
                $('#tenduan').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dongiaban').val()) {
                str += '  - Đơn giá bán \n';
                $('#dongiaban').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dongiathuemua').val()) {
                str += '  - Đơn giá thuê mua \n';
                $('#dongiathuemua').parent().addClass('has-error');
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
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop