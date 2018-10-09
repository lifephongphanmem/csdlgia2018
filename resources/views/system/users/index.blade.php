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
            $('#phanloai').change(function() {
                var current_path_url = '/users?';
                var pl = '&phanloai='+$('#phanloai').val();
                var url = current_path_url+pl;
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
        Quản lý <small>&nbsp;tài khoản</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                @if(session('admin')->sadmin == 'ssa' ||
                    (session('admin')->sadmin == 'sa' && $pl == "T" ))
                    <div class="portlet-title">
                        <div class="caption"></div>
                        <div class="actions">
                            <a href="{{url('users/create')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Tạo tài khoản</a>
                        </div>
                    </div>
                @endif
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="phanloai" id="phanloai">
                                    <option value="HT" {{($pl == "HT") ? 'selected' : ''}}>Quản trị hệ thống</option>
                                    <option value="T" {{($pl == "T") ? 'selected' : ''}}>Tổng hợp</option>
                                    <option value="H" {{($pl == "H") ? 'selected' : ''}}>Đơn vị quản lý</option>
                                    <option value="X" {{($pl == "X") ? 'selected' : ''}}>Đơn vị</option>
                                    <option value="DN" {{($pl == "DN") ? 'selected' : ''}}>Doanh nghiệp</option>
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
                                <a href="{{url('users/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                @if($tt->level != 'sa' || $tt->level != 'satc' || $tt->level != 'sact' || $tt->level != 'sagt')
                                <a href="{{url('users/'.$tt->id.'/phan-quyen')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-cogs"></i>&nbsp;Phân quyền</a>
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