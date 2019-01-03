@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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
        $(function(){

            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var url = '/hstonghopcpi?'+namhs;
                window.location.href = url;
            });

            $('#district').change(function() {
                var nam = '&nam='+ $('#nam').val();
                var district = '&district='+ $('#district').val();
                var url = '/hstonghopcpi?' + nam + district;

                window.location.href = url;
            });

        });
        function confirmDelete(mahs) {
            document.getElementById("mahs_delete").value=mahs;
        }
        function confirmHoanthanh(id) {
            document.getElementById("idhoanthanh").value=id;
        }
        function confirmHHT(id){
            document.getElementById("idhuyhoanthanh").value=id;
        }
        function confirmCB(id){
            document.getElementById("idcongbo").value=id;
        }
        function clickcreate(){
            $('#frm_create').submit();
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ tổng hợp chỉ số <small>&nbsp;giá hàng hóa tiêu dùng (CPI)</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">

                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-2">
                            <div class="form-group">
                                <label class="control-label">Năm dữ liệu </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="nambc" id="nambc" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 2 ) @endif
                                    @if ($nam_stop = intval(date('Y'))) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="5%" style="text-align: center">STT</th>
                            <th width="15%" style="text-align: center">Tháng / Năm</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center">Đơn vị nhận dữ liệu</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $ct)
                            <tr>
                                <td style="text-align: center">{{$ct['thang']}}</td>
                                <td style="text-align: center">{{$ct['thang'].'/'.$nam}}</td>
                                <td style="text-align: center">{{$ct['tentrangthai']}}</td>
                                <td style="text-align: center">{{$ct['tenhuyen']}}</td>

                                <td>
                                    @if($ct['trangthai'] != 'CHUAHS')
                                        @if($ct['trangthai'] != 'CHUATH')
                                            <a href="{{url('/hstonghopcpi/show?hoso='.$ct['mahs'])}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chi tiết</a>
                                            @if($ct['trangthai'] == 'CHOCHUYEN')
                                                <button type="button" onclick="confirmChuyen('{{$ct['mahs']}}')" class="btn btn-default btn-xs mbs" data-target="#chuyen-modal" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;
                                                    Chuyển</button>
                                            @endif

                                            @if($ct['trangthai'] == 'TRALAI')
                                                <button type="button" class="btn btn-default btn-sm" onclick="viewLyDo('{{$ct['mahs']}}')" data-target="#lydo-modal" data-toggle="modal"><i class="fa fa-share-square-o"></i>&nbsp;
                                                    Lý do trả lại</button>
                                            @endif
                                            @if($ct['trangthai'] != 'DACHUYEN')
                                                <button type="button" onclick="confirmDelete('{{$ct['mahs']}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            @endif
                                        @else
                                            <a href="{{url('/hstonghopcpi/tonghop?thang='.$ct['thang'].'&nam='.$nam)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Tổng hợp</a>
                                        @endif

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    @include('includes.e.modal-attackfile')

    <!--Modal node thêm-->
    <div class="modal fade" id="chuyen-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'/hstonghopcpi/chuyen','id' => 'frm_chuyen'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý chuyển hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Thông tin người nộp</b></label>
                        <textarea id="ttnguoinop_chuyen" class="form-control required" name="ttnguoinop_chuyen" cols="30" rows="5" placeholder="Họ và tên người chuyển- Số ĐT liên lạc- Email lien lạc"></textarea>
                    </div>
                </div>
                <input type="hidden" name="mahs_chuyen" id="mahs_chuyen">
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue">Đồng ý</button>

                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'/hstonghopcpi/delete','id' => 'frm_delete'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                    <input type="hidden" name="mahs_delete" id="mahs_delete">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <!--Modal lydo-->
    <div class="modal fade" id="lydo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>Lý do trả lại hồ sơ?</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea id="lydo" class="form-control" name="lydo" cols="30" rows="3"></textarea>
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

    <script>
        function clickdelete(){
            $('#frm_delete').submit();
        }

        function confirmChuyen(mahs){
            $('#mahs_chuyen').val(mahs);
        }

        function viewLyDo(mahs) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/hstonghopcpi/lydo',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mahs: mahs
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#lydo').val(data.lydo);
                }
            })
        }
    </script>


@stop