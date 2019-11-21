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
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/giathitruongct/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_manhom').val(data.manhom);
                    $('#edit_tennhom').val(data.tennhom);
                    $('#edit_mahh').val(data.mahh);
                    $('#edit_tenhh').val(data.tenhh);
                    $('#edit_dacdiemkt').val(data.dacdiemkt);
                    $('#edit_dvt').val(data.dvt);
                    $('#edit_dongia').val(data.dongia);
                    $('#edit_loaigia').val(data.loaigia);
                    $('#edit_nguontt').val(data.nguontt);
                    $('#edit_ghichu').val(data.ghichu);
                    $('#edit_id').val(data.id);
                }
            })
        }

        function updatets(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giathitruongct/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#edit_id').val(),
//                    dacdiemkt: $('#edit_dacdiemkt').val(),
//                    dvt: $('#edit_dvt').val(),
                    dongia: $('#edit_dongia').val(),
                    nguontt: $('#edit_nguontt').val(),
                    loaigia: $('#edit_loaigia').val(),
                    ghichu: $('#edit_ghichu').val(),
                    dacdiemkt: $('#edit_dacdiemkt').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin hàng hóa dịch vụ thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-edit').modal("hide");


                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Báo cáo giá hàng hóa dịch vụ<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::model($model, ['method' => 'PATCH', 'url'=>'kekhaigiathitruong/'. $model->id, 'class'=>'horizontal-form','id'=>'update_giathitruong']) !!}
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <h4 style="color: blue">Thông tin hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Theo thông tư</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$modeltt->ttqd}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị báo cáo</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$modeldv->tendv}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tháng báo cáo: </label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$model->thang}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Năm báo cáo: </label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$model->nam}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tháng báo cáo liền kề: </label>
                                    {!! Form::select(
                                    'thanglk',
                                    getThang()
                                    ,$model->thanglk,
                                    array('id' => 'thanglk', 'class' => 'form-control'))
                                    !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Năm báo cáo liền kề: </label>
                                    <select name="namlk" id="namlk" class="form-control">
                                        @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                        @if ($nam_stop = intval(date('Y')) + 1) @endif
                                        @for($i = $nam_start; $i <= $nam_stop; $i++)
                                            <option value="{{$i}}" {{$i == $model->namlk ? 'selected' : ''}}>Năm {{$i}}</option>
                                        @endfor
                                    </select>
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
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày báo cáo<span class="require">*</span></label>
                                    {!!Form::text('ngaybc',($model->ngaybc != '' ? date('d/m/Y',  strtotime($model->ngaybc)) : null), array('id' => 'ngaybc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">
                        <input type="hidden" name="nam" id="nam" value="{{$model->nam}}">
                        <input type="hidden" name="thang" id="thang" value="{{$model->thang}}">
                        <input type="hidden" name="mahuyen" id="mahuyen" value="{{$model->mahuyen}}">
                        <h4 style="color: blue">Thông tin chi tiết</h4>

                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã<br> nhóm</th>
                                        <th style="text-align: center">Tên nhóm</th>
                                        <th style="text-align: center">Mã<br> hàng hóa</th>
                                        <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                        <th style="text-align: center">Đặc điểm kỹ thuật</th>
                                        <th style="text-align: center">Đơn <br>vị<br> tính</th>
                                        <th style="text-align: center">Loại giá</th>
                                        <th style="text-align: center">Giá</th>
                                        <th style="text-align: center">Nguồn thông tin</th>
                                        <th style="text-align: center">Ghi chú</th>
                                        <th style="text-align: center" width="15%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                    @foreach($modelct as $key=>$tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td style="text-align: center">{{$tt->manhom}}</td>
                                            <td style="text-align: center">{{$tt->tennhom}}</td>
                                            <td style="text-align: center">{{$tt->mahh}}</td>
                                            <td class="active" style="font-weight: bold">{{$tt->tenhh}}</td>
                                            <td style="text-align: center">{{$tt->dacdiemkt}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: center">{{$tt->loaigia}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongia)}}</td>
                                            <td>{{$tt->nguontt}}</td>
                                            <td>{{$tt->ghichu}}</td>
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
                    <a href="{{url('kekhaigiathitruong?&mahuyen='.$model->mahuyen.'&nam='.$model->nam)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->

            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script type="text/javascript">
        function validateForm(){
            var validator = $("#update_giathitruong").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

    <!--Modal Edit-->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa giá thị trường </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mã nhóm: </label>
                                <input type="text" id="edit_manhom" name="edit_manhom" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên nhóm: </label>
                                <input type="text" id="edit_tennhom" name="edit_tennhom" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mã hàng hóa </label>
                                <input type="text" id="edit_mahh" name="edit_mahh" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa </label>
                                <input type="text" id="edit_tenhh" name="edit_tenhh" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đặc điểm kỹ thuật</label>
                                <input type="text" id="edit_dacdiemkt" name="edit_dacdiemkt" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính</label>
                                <input type="text" id="edit_dvt" name="edit_dvt" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại giá</label>
                                <select class="form-control" id="edit_loaigia" name="edit_loaigia">
                                    <option value="Giá bán buôn">Giá bán buôn</option>
                                    <option value="Giá bán lẻ">Giá bán lẻ</option>
                                    <option value="Giá kê khai">Giá kê khai</option>
                                    <option value="Giá đăng ký">Giá đăng ký</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đơn giá</label>
                                <input type="text" name="edit_dongia" id="edit_dongia" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nguồn thông tin</label>
                                <select class="form-control" id="edit_nguontt" name="edit_nguontt">
                                    <option value="Do trục tiếp điều tra, thu thập">Do trục tiếp điều tra, thu thập</option>
                                    <option value="Hợp đồng mua tin">Hợp đồng mua tin</option>
                                    <option value="Do cơ quan/đơn vị quản lý nhà nước có liên quan cung cấp/báo cáo theo quy định">Do cơ quan/đơn vị quản lý nhà nước có liên quan cung cấp/báo cáo theo quy định</option>
                                    <option value="Từ thống kê đăng ký giá, kê khai giá, thông báo giá của doanh nghiệp">Từ thống kê đăng ký giá, kê khai giá, thông báo giá của doanh nghiệp</option>
                                    <option value="Các nguồn thông tin khác">Các nguồn thông tin khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ghi chú</label>
                                <input type="text" id="edit_ghichu" name="edit_ghichu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="edit_id" name="edit_id">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop