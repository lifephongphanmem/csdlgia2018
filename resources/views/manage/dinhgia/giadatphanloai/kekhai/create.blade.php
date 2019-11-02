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
        Hồ sơ giá đất<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'giadatphanloai', 'id' => 'create_thongtindaugiadat', 'class'=>'horizontal-form']) !!}
            <input type="hidden" name="mahuyen" id="mahuyen" value="{{$modeldb->district}}">
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <h4 style="color: #0000ff">Thông tin hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Quận/ huyện</label>
                                    {!!Form::text('diaban',$modeldb->diaban, array('id' => 'diaban','class' => 'form-control required','disabled'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Xã/phường</label>
                                    {!! Form::select('maxa',$xas,null,array('id' => 'maxa', 'class' => 'form-control required')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tên phân loại<span class="require">*</span></label>
                                    {!!Form::text('tenphanloai',null, array('id' => 'tenphanloai','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định phê duyệt<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm<span class="require">*</span></label>
                                    {!!Form::text('thoidiem',isset($model) ? date('d/m/Y',  strtotime($model->thoidiem)) : null , array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Vị trí đất<span class="require">*</span></label>
                                    {!!Form::select('mavitri', $a_dm, null, array('id' => 'mavitri','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a href="{{url('giadatphanloai?&mahuyen='.$modeldb->district)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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

            var validator = $("#create_thongtindaugiadat").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>




    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin vị trí, địa bàn đấu giá đất</h4>
                </div>
                <div class="modal-body" id="ttmhbog">
                    <h4 style="color: blue">Thông tin địa chính</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại đất<span class="require">*</span></label>
                                {!!Form::text('add_loaidat',null, array('id' => 'add_loaidat','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên đường<span class="require">*</span></label>
                                {!!Form::text('add_tenduong',null, array('id' => 'add_tenduong','class' => 'form-control required'))!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại đường, khu vực<span class="require">*</span></label>
                                {!!Form::text('add_loaiduong',null, array('id' => 'add_loaiduong','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Vị trí<span class="require">*</span></label>
                                {!!Form::text('add_vitri',null, array('id' => 'add_vitri','class' => 'form-control required'))!!}
                            </div>
                        </div>
                    </div>

                    <h4 style="color: blue">Quyết định bảng giá đất của tỉnh</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất ở<span class="require">*</span></label>
                                {!!Form::text('add_qdgiadato',0, array('id' => 'add_qdgiadato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                {!!Form::text('add_qdgiadattmdv', 0, array('id' => 'add_qdgiadattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                {!!Form::text('add_qdgiadatsxkd',0, array('id' => 'add_qdgiadatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                {!!Form::text('add_qdgiadatnn',isset($model) ? null : 0, array('id' => 'add_qdgiadatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                {!!Form::text('add_qdgiadatnuoits',isset($model) ? null : 0, array('id' => 'add_qdgiadatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                {!!Form::text('add_qdgiadatmuoi', 0, array('id' => 'add_qdgiadatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>

                    <h4 style="color: blue">Quyết định phê duyệt giá khởi điểm của tỉnh</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất ở<span class="require">*</span></label>
                                {!!Form::text('add_qdpddato', 0, array('id' => 'add_qdpddato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                {!!Form::text('add_qdpddattmdv',0, array('id' => 'add_qdpddattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                {!!Form::text('add_qdpddatsxkd', 0, array('id' => 'add_qdpddatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                {!!Form::text('add_qdpddatnn',0, array('id' => 'add_qdpddatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                {!!Form::text('add_qdpddatnuoits', 0, array('id' => 'add_qdpddatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                {!!Form::text('add_qdpddatmuoi',0, array('id' => 'add_qdpddatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá khởi điểm<span class="require">*</span></label>
                                {!!Form::text('add_giakhoidiem',0, array('id' => 'add_giakhoidiem','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá trúng đấu giá<span class="require">*</span></label>
                                {!!Form::text('add_giatrungdaugia',0, array('id' => 'add_giatrungdaugia','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="capnhatts()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa thông tin?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="delrow()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop