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
                var url = '/thuetainguyen?'+namhs;
                window.location.href = url;
            });
            $('#trangthai').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var trangthai = '&trangthai=' + $('#trangthai').val();
                var url = '/thuetainguyen?'+namhs + trangthai;
                window.location.href = url;
            });

            $('#district').change(function() {
                var nam = '&nam='+ $('#nam').val();
                var trangthai = '&trangthai=' + $('#trangthai').val();
                var district = '&district='+ $('#district').val();
                var url = '/thuetainguyen?' + nam +trangthai + district;

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
        Thông tin hồ sơ <small>&nbsp;giá hàng hóa tiêu dùng (CPI)</small>
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

                        <a href="{{url('/hsgiacpi/create?thang='.$inputs['thang'].'&nam='.$inputs['nam'])}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
                        <!--div class="btn-group">
                            <a class="btn btn-default btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="">File dữ liệu mẫu</a>
                                </li>
                                <li>
                                    <a href="">Nhận dữ liệu</a>
                                </li>
                            </ul>
                        </div-->

                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-offset-2 col-md-1" style="text-align: right">Tháng </label>
                            <div class="col-md-2">
                                {!! Form::select('thangct',getThang(),$inputs['thang'],array('id' => 'thangct', 'class' => 'form-control'))!!}
                            </div>
                            <label class="control-label col-md-1" style="text-align: right">Năm </label>
                            <div class="col-md-2">
                                {!! Form::select('namct',getNam(),$inputs['nam'], array('id' => 'namct', 'class' => 'form-control'))!!}
                            </div>
                        </div>
                    </div>


                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="5%" style="text-align: center">STT</th>
                            <th width="15%" style="text-align: center">Thời gian nhập</th>
                            <th style="text-align: center">Nội dung</th>
                            <th style="text-align: center" width="10%">Trạng thái</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: center">{{getDayVn($tt->tgnhap)}}</td>
                                <td>{{$tt->noidung}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai != 'TONGHOP')
                                        <span class="badge badge-warning">Chưa tổng hợp</span>
                                    @else
                                        <span class="badge badge-success">Đã tổng hợp</span>
                                    @endif
                                </td>

                                <td>
                                    @if($tt->trangthai != 'TONGHOP')
                                        <a href="{{url('/hsgiacpi/edit?mahs='.$tt->mahs.'')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>

                                    @else
                                        <a href="{{url('/hsgiacpi/edit?mahs='.$tt->mahs.'')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Xem chi tiết</a>
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
    <!--Modal Create-->

    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'/hsgiacpi/delete','id' => 'frm_delete'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                    <input type="hidden" name="iddelete" id="iddelete">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickdelete(){
            $('#frm_delete').submit();
        }
    </script>


@stop