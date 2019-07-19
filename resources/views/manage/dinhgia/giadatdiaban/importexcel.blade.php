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

    <h3 class="page-title">Nhận dữ liệu giá đất trên địa bàn<small> từ file Excel</small> </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM -->
                    {!! Form::open(['url'=>'/giadatdiaban/import_excel', 'method'=>'post' , 'files'=>true, 'id' => 'create_hscb','enctype'=>'multipart/form-data']) !!}
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
                                                                <option value="{{$i}}" {{$i== date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                                            @endfor
                                                        </select>
                                                        </div>
                                                    </div>
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>Loại đất</label>
                                                        <select class="form-control" name="maloaidat" id="maloaidat">
                                                            @foreach($loaidats as $loaidat)
                                                                <option value="{{$loaidat->maloaidat}}">{{$loaidat->loaidat}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Số quyết định<span class="require">*</span></label>
                                                            {!!Form::text('soqd', null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Khu vực<span class="require">*</span></label>
                                                            {!!Form::text('khuvuc', 'B', array('id' => 'khuvuc','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Mô tả<span class="require">*</span></label>
                                                            {!!Form::text('mota', 'C', array('id' => 'mota','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">MĐSD<span class="require">*</span></label>
                                                            {!!Form::text('mdsd', 'D', array('id' => 'mdsd','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá đất VT1<span class="require">*</span></label>
                                                            {!!Form::text('giavt1', 'E', array('id' => 'giavt1','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá đất VT2<span class="require">*</span></label>
                                                            {!!Form::text('giavt2', 'F', array('id' => 'giavt2','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá đất VT3<span class="require">*</span></label>
                                                            {!!Form::text('giavt3', 'G', array('id' => 'giavt3','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá đất VT4<span class="require">*</span></label>
                                                            {!!Form::text('giavt4', 'H', array('id' => 'giavt4','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Giá đất VT5<span class="require">*</span></label>
                                                            {!!Form::text('giavt5', 'I', array('id' => 'giavt5','class' => 'form-control required'))!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Hệ số K<span class="require">*</span></label>
                                                            {!!Form::text('hesok', 'J', array('id' => 'hesok','class' => 'form-control required'))!!}
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
                <a href="{{url('giadatdiaban')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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

            if (!$('#khuvuc').val()) {
                str += '  - Khu vực \n';
                $('#khuvuc').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#mota').val()) {
                str += '  - Mô tả \n';
                $('#mota').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giavt1').val()) {
                str += '  - Giá đất VT1 \n';
                $('#giavt1').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giavt2').val()) {
                str += '  - Giá đất VT2\n';
                $('#giavt2').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giavt3').val()) {
                str += '  - Giá đất VT3 \n';
                $('#giavt3').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giavt4').val()) {
                str += '  - Giá đất VT4 \n';
                $('#giavt4').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giavt5').val()) {
                str += '  - Giá đất VT5 \n';
                $('#giavt5').parent().addClass('has-error');
                ok = false;
            }
            if (!$('#hesok').val()) {
                str += '  - Hệ số K \n';
                $('#hesok').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#soqd').val()) {
                str += '  - Số quyết định \n';
                $('#soqd').parent().addClass('has-error');
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