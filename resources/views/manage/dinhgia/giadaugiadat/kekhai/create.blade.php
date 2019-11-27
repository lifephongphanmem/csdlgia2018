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
        function clearForm(){
            $('#add_loaidat').val('');
            $('#mucgiasan').val('0');
            $('#mucgiadaugia').val('0');
            $('#donvidaugia').val('');
        }
        function capnhatts(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtindaugiadatct/store',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mahs: $('#mahs').val(),
                    loaidat: $('#add_loaidat').val(),
                    tenduong: $('#add_tenduong').val(),
                    loaiduong: $('#add_loaiduong').val(),
                    vitri: $('#add_vitri').val(),

                    qdgiadato: $('#add_qdgiadato').val(),
                    qdgiadattmdv: $('#add_qdgiadattmdv').val(),
                    qdgiadatsxkd: $('#add_qdgiadatsxkd').val(),
                    qdgiadatnn: $('#add_qdgiadatnn').val(),
                    qdgiadatnuoits: $('#add_qdgiadatnuoits').val(),
                    qdgiadatmuoi: $('#add_qdgiadatmuoi').val(),

                    qdpddato: $('#add_qdpddato').val(),
                    qdpddattmdv: $('#add_qdpddattmdv').val(),
                    qdpddatsxkd: $('#add_qdpddatsxkd').val(),
                    qdpddatnn: $('#add_qdpddatnn').val(),
                    qdpddatnuoits: $('#add_qdpddatnuoits').val(),
                    qdpddatmuoi: $('#add_qdpddatmuoi').val(),

                    giakhoidiem: $('#add_giakhoidiem').val(),
                    giadaugia: $('#add_giadaugia').val(),
                    trangthai: 'CXD'
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Cập nhật thông tin đấu giá đắt thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");
                    }
                    else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/thongtindaugiadatctdf/show',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#tttsedit').replaceWith(data.message);
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin đấu giá đắt!", "Lỗi!");
                }
            })
        }

        function updatets(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtindaugiadatctdf/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    vitridiadiem: $('input[name="vitridiadiemedit"]').val(),
                    mucgiasan: $('input[name="mucgiasanedit"]').val(),
                    mucgiadaugia: $('input[name="mucgiadaugiaedit"]').val(),
                    donvidaugia: $('input[name="donvidaugiaedit"]').val(),
                    district: $('#district').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin đấu giá đắt thành công", "Thành công!");
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
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function delrow(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtindaugiadatctdf/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    district: $('#district').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin đấu giá đắt thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-delete').modal("hide");

                    //}
                }
            })

        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Hồ sơ đấu giá đất<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'thongtindaugiadat', 'id' => 'create_thongtindaugiadat', 'class'=>'horizontal-form']) !!}
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
                                    <label class="control-label">Xã/phường</b></label>
                                    {!! Form::select('maxa',$xas,null,array('id' => 'maxa', 'class' => 'form-control required')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tên dự án<span class="require">*</span></label>
                                    {!!Form::text('tenduan',null, array('id' => 'tenduan','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm<span class="require">*</span></label>
                                    {!!Form::text('thoidiem',isset($model) ? date('d/m/Y',  strtotime($model->thoidiem)) : null , array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Diện tích<span class="require">*</span></label>--}}
                                    {{--{!!Form::text('dientich',null, array('id' => 'dientich','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định phương án đấu giá <span class="require">*</span></label>
                                    {!!Form::text('soqdpagia',null, array('id' => 'soqdpagia','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định đấu giá<span class="require">*</span></label>
                                    {!!Form::text('soqddaugia',null, array('id' => 'soqddaugia','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định phê duyệt giá khởi điểm<span class="require">*</span></label>
                                    {!!Form::text('soqdgiakhoidiem',null, array('id' => 'soqdgiakhoidiem','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định công nhận kết quả trúng đấu giá<span class="require">*</span></label>
                                    {!!Form::text('soqdkqdaugia',null, array('id' => 'soqdkqdaugia','class' => 'form-control required','autofocus'))!!}
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a href="{{url('thongtindaugiadat?&mahuyen='.$modeldb->district)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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