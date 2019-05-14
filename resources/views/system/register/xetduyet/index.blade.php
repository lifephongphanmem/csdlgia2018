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
                var current_path_url = '/register?';
                var level = '&level='+$('#level').val();
                var url = current_path_url + level;
                window.location.href = url;
            });

            $('#mahuyen').change(function() {
                var mahuyen = '&mahuyen='+ $('#mahuyen').val();
                var level = '&level='+$('#level').val();
                var url = '/register?'  + mahuyen + level;

                window.location.href = url;
            });
            $('#maxa').change(function() {
                var current_path_url = '/register?';
                var level = '&level='+$('#level').val();
                var maxa = '&maxa='+$('#maxa').val();
                var url = current_path_url + level + maxa;
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
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="font-weight: bold">Doanh nghiệp cung cấp</label>
                                    <select class="form-control" name="level" id="level">
                                        <option value="">--Chọn phân loại tài khoản--</option>
                                        @if(canGeneral('dvlt','index'))
                                            @if(can('dvlt','index') && can('thdvlt','xdttdn'))
                                                <option value="DVLT" {{($inputs['level'] == "DVLT") ? 'selected' : ''}}>Dịch vụ lưu trú</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('dvvt','index'))
                                            @if(can('dvvt','index') && can('dvvt','xdttdn'))
                                                <option value="DVVT" {{($inputs['level'] == "DVVT") ? 'selected' : ''}}>Dịch vụ vận tải</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('tpcnte6t','index'))
                                            @if( can('tpcnte6t','index') && can('thtpcnte6t','xdttdn'))
                                                <option value="TPCNTE6T" {{($inputs['level'] == "TPCNTE6T") ? 'selected' : ''}}>Thực phẩm chức năng cho trẻ em dưới 6 tuổi</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('tacn','index'))
                                            @if(can('tacn','index') && can('thtacn','xdttdn'))
                                                <option value="TACN" {{($inputs['level'] == "TACN") ? 'selected' : ''}}>Thức ăn chăn nuôi</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('dangkygia','index'))
                                            @if(can('dangkygia','index'))
                                                <option value="DKG" {{($inputs['level'] == 'DKG') ? 'selected' : ''}}>Mặt hàng BOG</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('vlxd','index'))
                                            @if(can('vlxd','index') && can('thvlxd','xdttdn'))
                                                <option value="VLXD" {{$inputs['level'] == 'VLXD' ? 'selected' :''}}>Vật liệu xây dựng</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('xmtxd','index'))
                                            @if(can('xmtxd','index') && can('thxmtxd','xdttdn'))
                                                <option value="XMTXD" {{$inputs['level'] == 'XMTXD' ? 'selected' :''}}>Xi măng, thép xây dựng</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('dvhdtm','index'))
                                            @if(can('dvhdtm','index') && can('thdvhdtm','xdttdn'))
                                                <option value="DVHDTM" {{$inputs['level'] == 'DVHDTM' ? 'selected' :''}}>Dịch vụ hỗ trợ hoạt động thương mại</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('than','index'))
                                            @if(can('than','index') && can('ththan','xdttdn'))
                                                <option value="THAN" {{$inputs['level'] == 'THAN' ? 'selected' :''}}>Than</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('giay','index'))
                                            @if(can('giay','index') && can('thgiay','xdttdn'))
                                                <option value="GIAY" {{$inputs['level'] == 'GIAY' ? 'selected' :''}}>Giấy in, viết(dạng cuộn), giấy in báo sản xuất trong nước</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('sach','index'))
                                            @if(can('sach','index') && can('thsach','xdttdn'))
                                                <option value="SACH" {{$inputs['level'] == 'SACH' ? 'selected' :''}}>Sách giáo khoa</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('etanol','index'))
                                            @if(can('etanol','index') && can('thetanol','xdttdn'))
                                                <option value="ETANOL" {{$inputs['level'] == 'ETANOL' ? 'selected' :''}}>Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</option>
                                            @endif
                                        @endif
                                        @if(canGeneral('kcbtn','index'))
                                            @if(can('kcbtn','index') && can('thkcbtn','xdttdn'))
                                                <option value="KCBTN" {{$inputs['level'] == 'KCBTN' ? 'selected' :''}}>Dịch vụ khám chữa bệnh cho người tại cơ sở khám chữa bệnh tư nhân; khám chữa bệnh theo yêu cầu tại cơ sở khám chữa bệnh của nhà nước</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                            </div>
                            @if(session('admin')->level == 'T')
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold">Đơn vị chủ quản</label>
                                        <select name="mahuyen" id="mahuyen" class="form-control">
                                            @foreach($modeldvql as $dvql)
                                                <option value="{{$dvql->mahuyen}}" {{$dvql->mahuyen == $inputs['mahuyen'] ? 'selected' : ''}}>{{$dvql->tendv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="mahuyen" id="mahuyen" value="{{$inputs['mahuyen']}}">
                            @endif
                            @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Đơn vị quản lý</label>
                                        <select class="form-control" name="maxa" id="maxa">
                                            @foreach($modeldv as $dv)
                                                <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa']? 'selected' : ''}}>{{$dv->tendv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
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