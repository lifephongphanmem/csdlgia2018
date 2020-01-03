@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--Date-->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <!--End Date-->
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>

    <!--Date>
    <script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>

    <End Date-->
    <!--Date new-->
    <!--script src="{{url('minhtran/jquery.min.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    <!--End date new-->

    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function clearForm(){
            $('#tenhh').val('');
            $('#quycach').val('');
            $('#gialk').val('');
            $('#giakk').val('');
            $('#dvt').val('');
            $('#ghichu').val('');
        }
        function createmhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/kkgiamhbogct/add',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tenhh:  $('#tenhh').val(),
                    quycach:  $('#quycach').val(),
                    gialk: $('#gialk').val(),
                    giakk: $('#giakk').val(),
                    dvt: $('#dvt').val(),
                    ghichu: $('#ghichu').val(),
                    maxa: $('#maxa').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin mặt hàng kê khai giá", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
        function editmhbog(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/kkgiamhbogct/show',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
//                    if (data.status == 'success') {
//                        $('#ttmhbogedit').replaceWith(data.message);
//                        alert(data);
//                        InputMask();
//
//                    }
//                    else
//                        toastr.error("Không thể chỉnh sửa thông tin mặt hàng!", "Lỗi!");
                    $('#tenhhedit').val(data.tenhh);
                    $('#quycachedit').val(data.quycach);
                    $('#dvtedit').val(data.dvt);
                    $('#gialkedit').val(data.gialk);
                    $('#giakkedit').val(data.giakk);
                    $('#ghichuedit').val(data.ghichu);
                    $('#idedit').val(data.id);
                }
            })
        }
        function updatemhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/kkgiamhbogct/update',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    tenhh:  $('#tenhhedit').val(),
                    quycach:  $('#quycachedit').val(),
                    gialk: $('#gialkedit').val(),
                    giakk: $('#giakkedit').val(),
                    dvt: $('#dvtedit').val(),
                    ghichu: $('#ghichuedit').val(),
                    id: $('#idedit').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin kê khai giá", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-edit').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })

        }
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function delmhbog() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/kkgiamhbogct/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('input[name="mahs"]').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin mặt hàng!", "Thành công!");
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
        {{$dmnghe->tennghe}} <small> thêm mới</small>
        <p><h5 style="color: blue">{{$modeldn->tendn}}&nbsp;- Mã số thuế: {{$modeldn->maxa}}</h5></p>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row" >
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'kkgiamhbog', 'files'=>true, 'id' => 'create_kkdkg', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />

                    <div class="form-body">
                        <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group"><label for="selGender" class="control-label">Thực hiện theo</label>--}}
                                    {{--<div>--}}
                                        {{--<textarea id="theoqd" class="form-control" name="theoqd" cols="30" rows="5">{{isset($modelcb) ? $modelcb->theoqd : '' }}</textarea>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày kê khai<span class="require">*</span></label>
                                    <!--input type="date" name="ngaynhap" id="ngaynhap" class="form-control required" autofocus-->
                                    {!!Form::text('ngaynhap',null, array('id' => 'ngaynhap','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày thực hiện mức giá kê khai<span class="require">*</span></label>
                                    {!!Form::text('ngayhieuluc',null, array('id' => 'ngayhieuluc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->

                        </div>

                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số công văn<span class="require">*</span></label>
                                    <input type="text" name="socv" id="socv" class="form-control required" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số công văn liền kề</label>
                                    {!!Form::text('socvlk',isset($inputs['socvlk']) ? $inputs['socvlk'] : '', array('id' => 'socvlk','class' => 'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày nhập số công văn liền kề<span class="require">*</span></label>
                                    {!!Form::text('ngaycvlk',isset($inputs['ngaycvlk']) ? date('d/m/Y',strtotime($inputs['ngaycvlk'])) : '', array('id' => 'ngaycvlk','data-inputmask'=>"'alias': 'date'",'class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label for="selGender" class="control-label">Phân tích nguyên nhân, nêu rõ biến động của các yếu tố hình thành giá tác động
                                        làm tăng hoặc giảm giá hàng hóa, dịch vụ thực hiện kê khai giá</label>
                                    <div>
                                        <textarea id="ptnguyennhan" class="form-control" name="ptnguyennhan" cols="30" rows="5"
                                                ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label for="selGender" class="control-label">Ghi rõ cách chính sách và mức khuyến mại, giảm giá hoặc chiết khấu đối với các đối
                                        tượng khách hàng, các Điều kiện vận chuyển, giao hàng, bán hàng kèm theo mức giá kê khai (nếu có)</label>
                                    <div>
                                        <textarea id="chinhsachkm" class="form-control" name="chinhsachkm" cols="30" rows="5"
                                                ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="maxa" id="maxa" value="{{$modeldn->maxa}}">
                        <input type="hidden" name="phanloai" id="phanloai" value="{{$inputs['manghe']}}">
                        <input type="hidden" name="mahs" id="mahs" value="{{$inputs['mahs']}}">
                        <input type="hidden" name="mahuyen" id="mahuyen" value="{{$modeldn->mahuyen}}">
                                <!--/row-->
                        <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Bổ sung mặt hàng</button>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">Tên hàng hoá<br>dịch vụ</th>
                                        <th style="text-align: center">Quy cách<br>Chất lượng</th>
                                        <th style="text-align: center">Đơn vị<br>tính</th>
                                        <th style="text-align: center">Mức giá <br>liền kề</th>
                                        <th style="text-align: center">Mức giá <br>kê khai</th>
                                        <th style="text-align: center">Ghi chú</th>
                                        <th style="text-align: center" width="20%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modelct as $key=>$tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td class="active">{{$tt->tenhh}}</td>
                                            <td style="text-align: left">{{$tt->quycach}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: right">{{dinhdangsothapphan($tt->gialk,2)}}</td>
                                            <td style="text-align: right">{{dinhdangsothapphan($tt->giakk,2)}}</td>
                                            <td>{{$tt->ghichu}}</td>
                                            <td>
                                                <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Mức giá mới</button>
                                                {{--<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>--}}
                                                {{--<button type="button" data-target="#modal-nhapkhau" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editnhapkhau({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Thuyết minh với MH nhập khẩu</button>--}}
                                                {{--<button type="button" data-target="#modal-sanxuat" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editsanxuat({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Thuyết minh với MH sản xuất</button>--}}
                                                <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$tt->id}});" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('kkgiamhbog?&manghe='.$inputs['manghe'].'&maxa='.$inputs['maxa'])}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_kkdkg").validate({
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
                    <h4 class="modal-title">Thêm mới thông tin mặt hàng</h4>
                </div>
                <div class="modal-body" id="ttmhbog">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Tên mặt hàng</b><span class="require">*</span></label>
                                <div><input type="text" name="tenhh" id="tenhh" class="form-control" ></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Quy cách, chất lượng</b><span class="require">*</span></label>
                                <div><input type="text" name="quycach" id="quycach" class="form-control" ></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>đơn vị tính</b><span class="require">*</span></label>
                                <div><input type="text" name="dvt" id="dvt" class="form-control" ></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Giá liền kề</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right" id="gialk" name="gialk" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Giá kê khai</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right" id="giakk" name="giakk" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Ghi chú</b><span class="require">*</span></label>
                                <div><input type="text" id="ghichu" name="ghichu" class="form-control"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="createmhbog()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Eđit-->
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin mặt hàng </h4>
                </div>
                <div class="modal-body" id="ttmhbogedit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Tên mặt hàng</b><span class="require">*</span></label>
                                <div><input type="text" name="tenhhedit" id="tenhhedit" class="form-control" ></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Quy cách, chất lượng</b><span class="require">*</span></label>
                                <div><input type="text" name="quycachedit" id="quycachedit" class="form-control" ></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>đơn vị tính</b><span class="require">*</span></label>
                                <div><input type="text" name="dvtedit" id="dvtedit" class="form-control" ></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Giá liền kề</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right" id="gialkedit" name="gialkedit" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Giá kê khai</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right" id="giakkedit" name="giakkedit" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Ghi chú</b><span class="require">*</span></label>
                                <div><input type="text" id="ghichuedit" name="ghichuedit" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="idedit" name="idedit">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatemhbog()">Cập nhật</button>
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
                    <button type="button" class="btn btn-primary" onclick="delmhbog()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop