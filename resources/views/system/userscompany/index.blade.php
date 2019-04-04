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
        function getSelectedCheckboxes(){

            var ids = '';
            $.each($("input[name='ck_value']:checked"), function(){
                ids += ($(this).attr('value')) + '-';
            });
            return ids = ids.substring(0, ids.length - 1);

        }
        function multiLock() {

            var ids = getSelectedCheckboxes();
            var pl = $('#phanloai').val();
            if(ids == '') {
                $('#btnMultiLockUser').attr('data-target', '#notid-modal-confirm');
            }else {

                $('#btnMultiLockUser').attr('data-target', '#lockuser-modal-confirm');
                $('#frmLockUser').attr('action', "{{ url('users/lock')}}/" + ids + '/' + pl);
            }

        }
        function multiUnLock() {

            var ids = getSelectedCheckboxes();
            var pl = $('#phanloai').val();
            if(ids == '') {
                $('#btnMultiUnLockUser').attr('data-target', '#notid-modal-confirm');
            }else {
                $('#btnMultiUnLockUser').attr('data-target', '#unlockuser-modal-confirm');
                $('#frmUnLockUser').attr('action', "{{ url('users/unlock')}}/" + ids + '/' + pl);
            }

        }
        function confirmDelete(id) {
            $('#frmDelete').attr('action', "/delete/" + id);
        }
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        $(function(){
            $('#mahuyen').change(function() {
                var mahuyen = '&mahuyen='+ $('#mahuyen').val();
                var level = '&level='+$('#level').val();
                var url = '/userscompany?'  + mahuyen + level;
                window.location.href = url;
            });
            $('#maxa').change(function() {
                var current_path_url = '/userscompany?';
                var mahuyen = '&mahuyen='+ $('#mahuyen').val();
                var maxa = '&maxa='+$('#maxa').val();
                var url = current_path_url + mahuyen + maxa;
                window.location.href = url;
            });
            $('#level').change(function() {
                var current_path_url = '/userscompany?';
                var level = '&level='+$('#level').val();
                var mahuyen = '&mahuyen='+ $('#mahuyen').val();
                var maxa = '&maxa='+$('#maxa').val();
                var url = current_path_url + level + mahuyen + maxa;
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
        Quản lý thông tin<small>&nbsp;tài khoản truy cập thuộc quản lý của <b style="color: blue">{{$ttdv->tendv}}</b></small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                @if(session('admin')->sadmin == 'ssa')
                    <!--div class="portlet-title">
                        <div class="caption"></div>
                        <div class="actions">
                            <a href="{{url('users/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Tạo tài khoản</a>
                        </div>
                    </div-->
                @endif
                <div class="portlet-body">
                    <div class="row">

                        @if(session('admin')->level == 'T')
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Đơn vị quản lý</label>
                                    <select class="form-control" name="maxa" id="maxa">
                                        @foreach($modeldv as $dv)
                                            <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa']? 'selected' : ''}}>{{$dv->tendv}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="mahuyen" id="maxa" value="{{$inputs['maxa']}}">
                        @endif
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phân loại tài khoản</label>
                                <select class="form-control" name="level" id="level">
                                    <option value="">--Chọn phân loại tài khoản--</option>
                                    @if(can('dvlt','index') && can('thdvlt','xdttdn'))
                                        <option value="DVLT" {{($inputs['level'] == "DVLT") ? 'selected' : ''}}>Dịch vụ lưu trú</option>
                                    @endif
                                    @if(can('dvvt','index') && can('dvvt','xdttdn'))
                                        <option value="DVVT" {{($inputs['level'] == "DVVT") ? 'selected' : ''}}>Dịch vụ vận tải</option>
                                    @endif
                                    @if( can('tpcnte6t','index') && can('thtpcnte6t','xdttdn'))
                                        <option value="TPCNTE6T" {{($inputs['level'] == "TPCNTE6T") ? 'selected' : ''}}>Thực phẩm chức năng cho trẻ em dưới 6 tuổi</option>
                                    @endif
                                    @if(can('tacn','index') && can('thtacn','xdttdn'))
                                        <option value="TACN" {{($inputs['level'] == "TACN") ? 'selected' : ''}}>Thức ăn chăn nuôi</option>
                                    @endif
                                    @if(can('dangkygia','index'))
                                        <option value="DKG" {{($inputs['level'] == 'DKG') ? 'selected' : ''}}>Mặt hàng BOG</option>
                                    @endif
                                    @if(can('vlxd','index') && can('thvlxd','xdttdn'))
                                        <option value="VLXD" {{$inputs['level'] == 'VLXD' ? 'selected' :''}}>Vật liệu xây dựng</option>
                                    @endif
                                    @if(can('xmtxd','index') && can('thxmtxd','xdttdn'))
                                        <option value="XMTXD" {{$inputs['level'] == 'XMTXD' ? 'selected' :''}}>Xi măng, thép xây dựng</option>
                                    @endif
                                    @if(can('dvhdtm','index') && can('thdvhdtm','xdttdn'))
                                        <option value="DVHDTM" {{$inputs['level'] == 'DVHDTM' ? 'selected' :''}}>Dịch vụ hỗ trợ hoạt động thương mại</option>
                                    @endif
                                    @if(can('than','index') && can('ththan','xdttdn'))
                                        <option value="THAN" {{$inputs['level'] == 'THAN' ? 'selected' :''}}>Than</option>
                                    @endif
                                    @if(can('giay','index') && can('thgiay','xdttdn'))
                                        <option value="GIAY" {{$inputs['level'] == 'GIAY' ? 'selected' :''}}>Giấy in, viết(dạng cuộn), giấy in báo sản xuất trong nước</option>
                                    @endif
                                    @if(can('sach','index') && can('thsach','xdttdn'))
                                        <option value="SACH" {{$inputs['level'] == 'SACH' ? 'selected' :''}}>Sách giáo khoa</option>
                                    @endif
                                    @if(can('etanol','index') && can('thetanol','xdttdn'))
                                        <option value="ETANOL" {{$inputs['level'] == 'ETANOL' ? 'selected' :''}}>Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</option>
                                    @endif
                                    @if(can('kcbtn','index') && can('thkcbtn','xdttdn'))
                                        <option value="KCBTN" {{$inputs['level'] == 'KCBTN' ? 'selected' :''}}>Dịch vụ khám chữa bệnh cho người tại cơ sở khám chữa bệnh tư nhân; khám chữa bệnh theo yêu cầu tại cơ sở khám chữa bệnh của nhà nước</option>
                                    @endif

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Tên tài khoản</th>
                            <th style="text-align: center" width="10%">Username</th>
                            <th style="text-align: center" width="5%">Level</th>
                            <th style="text-align: center" width="20%">Trạng thái</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td>{{$tt->name}}</td>
                            <td class="active">{{$tt->username}}</td>
                            <td style="text-align: center">{{$tt->level}}</td>
                            <td style="text-align: center">
                                @if($tt->status == 'Kích hoạt')
                                    <span class="label label-sm label-success">{{$tt->status}}</span><br>
                                    {{$tt->ttnguoitao}}
                                @else
                                    <span class="label label-sm label-danger">{{$tt->status}}</span>
                                @endif
                            </td>
                            <td>
                                @if(can('users','create'))
                                <a href="{{url('userscompany/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                @endif
                                @if(can('users','per'))
                                <a href="{{url('userscompany/'.$tt->id.'/permission')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-cogs"></i>&nbsp;Phân quyền</a>
                                @endif
                                @if($tt->level == 'T' || $tt->level == 'X' || $tt->level == 'H')
                                    @if(session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa')
                                    <a href="{{url('userscompany/'.$tt->id.'/copy')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-copy"></i>&nbsp;Copy</a>
                                    @endif
                                @endif
                                @if(session('admin')->sadmin == 'ssa')
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
    </div>
    <!-- BEGIN DASHBOARD STATS -->
    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'userscompany/delete','id' => 'frm_delete'])!!}
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
    @include('includes.e.modal-confirm')
@stop