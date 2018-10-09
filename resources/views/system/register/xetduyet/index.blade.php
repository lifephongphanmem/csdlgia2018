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
        function getId(id){
            document.getElementById("iddelete").value=id;
        }

        function confirmTraLai(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/ajax/registerthongtin',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#tttralai').replaceWith(data.message);
                    }
                }
            })
        }
        function ClickTraLai(){
            if($('#lydo').val() != ''){
                toastr.success("Thông tin đăng ký đã được trả lại!", "Thành công!");
                $("#frm_tralai").unbind('submit').submit();
            }else{
                toastr.error("Bạn cần nhập lý do trả lại hồ sơ", "Lỗi!!!");
                $("#frm_tralai").submit(function (e) {
                    e.preventDefault();
                });
            }

        }
        
        $(function(){

            $('#level').change(function() {
                var pl = $('#level').val();
                var url = 'register?&level='+pl;
                window.location.href = url;
            });



        })
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý thông tin tài khoản<small>&nbsp; đăng ký</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" name="level" id="level">
                                        @if(canGeneral('dvlt','dvlt') )
                                            @if(can('ttdn','dvlt'))
                                                <option value="DVLT" {{($level == "DVLT") ? 'selected' : ''}}>Dịch vụ lưu trú</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('dvvt','vtxk') || canGeneral('dvvt','vtxb') || canGeneral('dvvt','vtxtx') || canGeneral('dvvt','vtch'))
                                            @if(can('ttdn','dvvt'))
                                                <option value="DVVT" {{($level == "DVVT") ? 'selected' : ''}}>Dịch vụ vận tải</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('dvgs','dvgs'))
                                            @if(can('ttdn','dvgs'))
                                                <option value="DVGS" {{($level == "DVGS") ? 'selected' : ''}}>Mặt hàng sữa</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('dvtacn','dvtacn'))
                                            @if(can('ttdn','dvtacn'))
                                                <option value="DVTACN" {{($level == "DVTACN") ? 'selected' : ''}}>Thức ăn chăn nuôi</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-toolbar">
                        </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center" width="30%">Tên doanh nghiệp</th>
                            <th style="text-align: center" width="10%">Mã số thuế</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr class="odd gradeX">
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active" ><b style="color: blue;">{{$tt->tendn}}</b><br>Ngày đăng ký:&nbsp;{{getDateTime($tt->created_at)}}<br>{{($tt->updated_at != $tt->created_at ? 'Ngày cập nhật: '.getDateTime($tt->updated_at) : '')}}</td>
                                <td>{{$tt->maxa}}</td>
                                <td align="center">
                                    <span class="badge badge-danger">{{$tt->trangthai}}</span>
                                    <br>
                                    @if($tt->trangthai == 'Bị trả lại')
                                        <u>Lý do:</u> {{$tt->lydo}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('register/'.$tt->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($tt->trangthai != 'Bị trả lại')
                                    <a href="{{url('register/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                    <button type="button" onclick="confirmTraLai({{$tt->id}})" class="btn btn-default btn-xs mbs" data-target="#tralai-modal" data-toggle="modal"><i class="fa fa-reply"></i>&nbsp;
                                        Trả lại</button>
                                    <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                        Xóa</button>
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

    <div class="clearfix"></div>
    <!--Model chuyển-->
    <div class="modal fade" id="tralai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'register/tralai','id' => 'frm_tralai'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý trả lại đăng ký tài khoản?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group" id="tttralai">
                        </div>
                        <label><b>Lý do</b></label>
                        <textarea id="lydo" class="form-control" name="lydo" cols="30" rows="5"></textarea></div>
                </div>
                <input type="hidden" name="pl" id="pl">
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickTraLai()">Đồng ý</button>

                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'register/delete','id' => 'frm_delete'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="hidden" name="iddelete" id="iddelete">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@stop