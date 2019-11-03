@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function InputMask(){
            //$(function(){
            // Input Mask
            if($.isFunction($.fn.inputmask))
            {
                $("[data-mask]").each(function(i, el)
                {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if(placeholder.length)
                    {
                        opts[placeholder] = placeholder;
                    }

                    switch(mask.toLowerCase())
                    {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');;

                            mask = "999,999,999.99";

                            if($this.data('mask').toLowerCase() == 'rcurrency')
                            {
                                mask += ' ' + sign;
                            }
                            else
                            {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup		: true,
                                groupSize		: 3,
                                radixPoint		: attrDefault($this, 'rad', '.'),
                                groupSeparator	: attrDefault($this, 'dec', ',')
                            });
                    }

                    if(is_regex)
                    {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
        $(function(){
            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var url = '/xetduyetkkgiavlxd?'+namhs;
                window.location.href = url;
            });
            $('#trangthai').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var trangthai = '&trangthai=' +  $('#trangthai').val();
                var url = '/xetduyetkkgiavlxd?'+namhs+trangthai;
                window.location.href = url;
            });
            $('#mahuyen').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var trangthai = '&trangthai=' +  $('#trangthai').val();
                var mahuyen = '&mahuyen=' + $('#mahuyen').val();
                var url = '/xetduyetkkgiavlxd?'+namhs+trangthai+mahuyen;
                window.location.href = url;
            });

        });
        function ClickTraLai(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ttdnkkvlxd',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#ttdnkkdvgs').replaceWith(data.message);
                        document.getElementById("idtralai").value=id;
                    }
                }
            })
        }
        function confirmTraLai(){
            if($('#lydo').val() != ''){
                var btn = document.getElementById('submitTraLai');
                btn.disabled = true;
                btn.innerText = 'Loading...';
                toastr.success("Hồ sơ đã được trả lại!", "Thành công!");
                $("#frm_tralai").unbind('submit').submit();
            }else{
                toastr.error("Bạn cần nhập lý do trả lại hồ sơ", "Lỗi!!!");
                $("#frm_tralai").submit(function (e) {
                    e.preventDefault();
                });
            }

        }
        function confirmNhanHs(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/xetduyetkkgiavlxd/ttnhanhs',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#ttnhanhs').replaceWith(data.message);
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin nhận hồ sơ giá !", "Lỗi!");
                }
            })
        }
        function ClickNhanHs(){
            $('#frm_nhanhs').submit();
            var btn = document.getElementById('submitNhanHs');
            btn.disabled = true;
            btn.innerText = 'Loading...';
        }

        function confirmCongBo(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ttdnkkvlxd',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#tthscongbo').replaceWith(data.message);
                        document.getElementById("idcongbo").value=id;
                    }
                }
            })
        }

        function ClickHuyCongBo(){
            $('#frm_huycongbo').submit();
        }


        function confirmHuyCongBo(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ttdnkkvlxd',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#tthshuycongbo').replaceWith(data.message);
                        document.getElementById("idhuycongbo").value=id;
                    }
                }
            })
        }

        function ClickCongBo(){
            $('#frm_congbo').submit();
        }

        function confirmNhanHsedit(mahs){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(mahs);

            $.ajax({
                url: '/xetduyetkkgiavlxd/nhanhsedit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mahs: mahs
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#ttnhanhsedit').replaceWith(data.message);
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin nhận hồ sơ giá phòng nghỉ!", "Lỗi!");
                }
            })
        }

        function ClickNhanHsedit(){
            $('#frm_nhanhsedit').submit();
        }
        //Chưa làm
        function confirmHuyduyet(mahs){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(mahs);

            $.ajax({
                url: '/xetduyetkekhaigiatacn/tthuyduyet',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mahs: mahs
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#tthuyduyet').replaceWith(data.message);
                    }
                }
            })
        }
        function ClickHuyDuyet(){
            $('#frm_huyduyet').submit();
        }

        function viewLyDo(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/kkvlxd/showlydo',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#showlydo').replaceWith(data.message);
                    }
                }
            })
        }

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin xét duyệt kê khai giá<small>&nbsp;vật liệu xây dựng </small>
    </h3>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Năm hồ sơ</label>
                <select name="nam" id="nam" class="form-control">
                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                    @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Trạng thái hồ sơ</label>
                <select name="trangthai" id="trangthai" class="form-control">
                    <option value="CD" {{$inputs['trangthai'] == 'CD' ? 'selected' : ''}}>Hồ sơ chờ duyệt</option>
                    <option value="BTL" {{$inputs['trangthai'] == 'BTL' ? 'selected' : ''}}>Hồ sơ bị trả lại</option>
                    <option value="DD" {{$inputs['trangthai'] == 'DD' ? 'selected' : ''}}>Hồ sơ đã duyệt</option>
                </select>
            </div>
        </div>
        @if(session('admin')->level == 'T' || session('admin')->level == 'H')
            <div class="col-md-5">
                <div class="form-group">
                    <label>Đơn vị quản lý</label>
                    <select name="mahuyen" id="mahuyen" class="form-control">
                        @foreach($modeldv as $dv)
                            <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['mahuyen'] ? 'selected' : ''}}>{{$dv->tendv}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif

    </div>


    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center ; margin: auto" width="2%">STT</th>
                            <th style="text-align: center" width="20%">Doanh nghiệp</th>
                            <th style="text-align: center" width="8%">Ngày<br> kê khai</th>
                            <th style="text-align: center" width="8%">Ngày thực hiện<br>mức giá</th>
                            <th style="text-align: center" width="8%">Số công văn</th>
                            <th style="text-align: center" width="15%">Người chuyển</th>
                            <th style="text-align: center" width="15%">Trạng thái</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td class="active">{{$tt->tendn}}
                                    <br><b>Mã số thuế:</b> {{$tt->maxa}}
                                    <br><b>Mã hồ sơ:</b> {{$tt->mahs}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaynhap)}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayhieuluc)}}</td>
                                <td style="text-align: center" class="danger">{{$tt->socv}}</td>
                                <td style="text-align: left">@if($tt->nguoinop != '')Họ và tên: {{$tt->nguoinop}}
                                    <br>Số điện thoại liên hệ: {{$tt->dtll}}<br>Số Fax: {{$tt->fax}}@endif</td>

                                @if($tt->trangthai == 'CD')
                                    <td align="center"><span class="badge badge-warning">Chờ duyệt</span>
                                        <br>Thời gian chuyển:<br><b>{{getDateTime($tt->ngaychuyen)}}</b>
                                    </td>
                                @elseif($tt->trangthai == 'BTL')
                                    <td align="center">
                                        <span class="badge badge-danger">Bị trả lại</span><br>&nbsp;
                                    </td>
                                @else
                                    <td align="center">
                                        <span class="badge badge-success">Đã duyệt</span>
                                        <br>Thời gian chuyển:<br><b>{{getDateTime($tt->ngaychuyen)}}</b><br>
                                        @if($tt->congbo == 'CB')<b style="color: #0000ff">Đang công bố</b>@endif
                                    </td>
                                @endif
                                <td>
                                    <a href="{{url('thongtinkekhaigiavatlieuxaydung/prints?&mahs='.$tt->mahs)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($tt->trangthai == 'DD' || $tt->trangthai == 'CD')
                                        <a onclick="window.open('{{url('data/kekhaigia/vlxd/'.$tt->ipt1)}}', 'newwindow', 'width=1000,height=700')" class="btn btn-default btn-xs mbs"><i class="fa fa-file"></i>&nbsp;File hồ sơ chữ ký số</a>
                                    @endif
                                    @if(canApprove($tt->trangthai))
                                        <button type="button" onclick="ClickTraLai({{$tt->id}})" class="btn btn-default btn-xs mbs" data-target="#tralai-modal" data-toggle="modal"><i class="fa fa-reply"></i>&nbsp;
                                            Trả lại</button>
                                        <button type="button" onclick="confirmNhanHs({{$tt->id}})" class="btn btn-default btn-xs mbs" data-target="#nhanhs-modal" data-toggle="modal"><i class="fa fa-share"></i>&nbsp;
                                            Nhận hồ sơ</button>
                                    @endif
                                    @if(canShowLyDo($tt->trangthai))
                                        <button type="button" data-target="#lydo-modal" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="viewLyDo({{$tt->id}})"><i class="fa fa-search"></i>&nbsp;Lý do trả lại</button>
                                    @endif
                                    @if($tt->trangthai == 'DD')
                                        @if($tt->congbo != 'CB')
                                        <button type="button" onclick="confirmCongBo({{$tt->id}})" class="btn btn-default btn-xs mbs" data-target="#congbo-modal" data-toggle="modal"><i class="fa fa-share"></i>&nbsp;
                                            Công bố</button>
                                        @else
                                            <button type="button" onclick="confirmHuyCongBo({{$tt->id}})" class="btn btn-default btn-xs mbs" data-target="#huycongbo-modal" data-toggle="modal"><i class="fa fa-reply"></i>&nbsp;
                                                Hủy công bố</button>
                                        @endif
                                    @endif
                                        <!--a href="{{url('ke_khai_dich_vu_luu_tru/'.$tt->mahs.'/history')}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Lịch sử</a-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <!--Model trả lại-->
        <div class="modal fade" id="tralai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'xetduyetkkgiavlxd/tralai','id' => 'frm_tralai'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý trả lại hồ sơ?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" id="ttdnkkdvgs">
                            </div>
                        <div class="form-group">
                            <label><b>Lý do trả lại</b></label>
                            <textarea id="lydo" class="form-control" name="lydo" cols="30" rows="8"></textarea>
                        </div>
                        <input type="hidden" name="idtralai" id="idtralai">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn blue" onclick="confirmTraLai()" id="submitTraLai">Đồng ý</button>

                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    <!--Model nhận hs-->
    <div class="modal fade" id="nhanhs-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyetkkgiavlxd/nhanhs','id' => 'frm_nhanhs'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý nhận hồ sơ?</h4>
                </div>
                <div class="modal-body" id="ttnhanhs">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickNhanHs()" id="submitNhanHs">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model nhận hs edit-->
    <div class="modal fade" id="nhanhsedit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyetkkgiavlxd/nhanhsedit','id' => 'frm_nhanhsedit'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin nhận hồ sơ?</h4>
                </div>
                <div class="modal-body" id="ttnhanhsedit">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickNhanHsedit()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model huỷ duyệt-->
    <div class="modal fade" id="huyduyet-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyetkkgiavlxd/huyduyet','id' => 'frm_huyduyet'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý huỷ duyệt hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label style="color: blue"><b>Hồ sơ sẽ chuyển về trạng thái chờ xét duyệt, hồ sơ lưu bên trang công bố sẽ bị xoá bỏ. Đồng thời trong lịch sử hồ sơ sẽ lưu lại vết hồ sơ bị huỷ duyệt</b></label>
                    </div>
                    <div class="form-group" id="tthuyduyet">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn blue" onclick="ClickHuyDuyet()">Đồng ý</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!--Model lý do-->
    <div class="modal fade" id="lydo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>Lý do trả lại hồ sơ?</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="showlydo">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model congbo-->
    <div class="modal fade" id="congbo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyetkkgiavlxd/congbo','id' => 'frm_congbo'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý công bố hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="tthscongbo">
                    </div>
                    <input type="hidden" name="idcongbo" id="idcongbo">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickCongBo()" id="submitCongBo">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!--Model congbo-->
    <div class="modal fade" id="huycongbo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyetkkgiavlxd/huycongbo','id' => 'frm_huycongbo'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý hủy công bố hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="tthshuycongbo">
                    </div>
                    <input type="hidden" name="idhuycongbo" id="idhuycongbo">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickHuyCongBo()" id="submitHuyCongBo">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @include('includes.script.create-header-scripts')
@stop