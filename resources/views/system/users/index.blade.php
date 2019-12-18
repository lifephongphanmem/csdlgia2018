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
            $('#level').change(function() {
                var current_path_url = '/users?';
                var level = '&level='+$('#level').val();
                var url = current_path_url + level;
                window.location.href = url;
            });
            $('#mahuyen').change(function() {
                var current_path_url = '/users?';
                var level = '&level='+$('#level').val();
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var url = current_path_url + level + mahuyen;
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
        Quản lý thông tin<small>&nbsp;tài khoản đơn vị truy cập</small>
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
                    <div class="portlet-title">
                        <div class="caption"></div>
                        <div class="actions">
                            @if($inputs['level'] == 'X')
                                <a href="{{url('users/print?&level='.$inputs['level'].'&mahuyen='.$inputs['mahuyen'])}}" class="btn btn-default btn-sm" target="_blank">
                                <i class="fa fa-print"></i> Print</a>
                            @else
                                @if($inputs['level'] != '')
                                <a href="{{url('users/print?&level='.$inputs['level'])}}" class="btn btn-default btn-sm" target="_blank">
                                    <i class="fa fa-print"></i> Print</a>
                                @endif
                            @endif
                        </div>
                    </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phân loại tài khoản</label>
                                <select class="form-control" name="level" id="level">
                                    <option value="">--Chọn phân loại tài khoản--</option>
                                    @if(session('admin')->level == 'T')
                                        <option value="T" {{($inputs['level'] == "T") ? 'selected' : ''}}>Tổng hợp</option>
                                        @if(can('districts','index'))
                                        <option value="H" {{($inputs['level'] == "H") ? 'selected' : ''}}>Đơn vị quản lý</option>
                                        @endif
                                    @endif
                                    @if(session('admin')->level == 'T' || session('admin')->level =='H' || session('admin')->level == 'X')
                                        @if(can('towns','index'))
                                        <option value="X" {{($inputs['level'] == "X") ? 'selected' : ''}}>Đơn vị</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        @if(session('admin')->level == 'T' && $inputs['level'] == 'X')
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Đơn vị quản lý</label>
                                <select class="form-control" name="mahuyen" id="mahuyen">
                                    @foreach($districts as $district)
                                        <option value="{{$district->mahuyen}}" {{$district->mahuyen == $inputs['mahuyen'] ? 'selected' : ''}}>{{$district->tendv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
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
                                @if(can('users','edit'))
                                <a href="{{url('users/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                @endif
                                @if(can('users','per') && session('admin')->level == 'T')
                                <a href="{{url('users/'.$tt->id.'/phan-quyen')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-cogs"></i>&nbsp;Phân quyền</a>
                                @endif
                                @if(can('users','create'))
                                    <a href="{{url('users/'.$tt->id.'/copy')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-copy"></i>&nbsp;Copy</a>
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
                {!! Form::open(['url'=>'users/delete','id' => 'frm_delete'])!!}
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