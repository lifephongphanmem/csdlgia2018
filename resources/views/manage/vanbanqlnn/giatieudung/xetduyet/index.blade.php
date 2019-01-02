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
                var nam = '&nam=' + $('#nam').val();
                var district = '&diaban='+ $('#district').val();
                var url = '/chisocpi/danhsach?' + nam + district;
                window.location.href = url;
            });

            $('#district').change(function() {
                var nam = '&nam='+ $('#nam').val();
                var district = '&diaban='+ $('#district').val();
                var url = '/chisocpi/danhsach?' + nam + district;
                window.location.href = url;
            });

        });
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
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
        Thông tin chỉ số giá hàng hóa tiêu dùng (CPI)
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Năm dữ liệu</label>
                                    {!! Form::select('nam',getNam(),$nam, array('id' => 'nam', 'class' => 'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Địa bàn </label>
                                    {!! Form::select('district',$a_diaban, $district, array('id' => 'district', 'class' => 'form-control'))!!}
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
                                        <a href="{{url('/chisocpi/chitiet?hoso='.$ct['mahs'])}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chi tiết</a>
                                        @if($ct['trangthai'] != 'DANHAN')
                                            <button type="button" onclick="ClickTraLai({{$ct['mahs']}})" class="btn btn-default btn-xs mbs" data-target="#tralai-modal" data-toggle="modal"><i class="fa fa-reply"></i>&nbsp;
                                                Trả lại</button>
                                            <button type="button" onclick="confirmNhanHs({{$ct['mahs']}})" class="btn btn-default btn-xs mbs" data-target="#nhanhs-modal" data-toggle="modal"><i class="fa fa-share"></i>&nbsp;
                                                Nhận hồ sơ</button>

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

    <!--Model trả lại-->
    <div class="modal fade" id="tralai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyetcpi/tralai','id' => 'frm_tralai'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý trả lại hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="ttdnkkdvlt">
                    </div>
                    <div class="form-group">
                        <label><b>Lý do trả lại</b></label>
                        <textarea id="lydo" class="form-control" name="lydo" cols="30" rows="8"></textarea>
                    </div>
                    <input type="hidden" id="mahs_tralai" name="mahs_tralai" >
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="confirmTraLai()">Đồng ý</button>

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
                {!! Form::open(['url'=>'xetduyetcpi/nhanhs','id' => 'frm_nhanhs'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý nhận hồ sơ?</h4>
                </div>
                <div class="modal-body" id="ttnhanhs">

                </div>
                <input type="hidden" id="mahs_nhan" name="mahs_nhan" >
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickNhanHs()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
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

        function ClickNhanHs(){
            $('#frm_nhanhs').submit();
        }

        function confirmNhanHs(mahs){
            $('#mahs_nhan').val(mahs);
        }

        function ClickTraLai(mahs){
            $('#mahs_tralai').val(mahs);
        }
    </script>


@stop