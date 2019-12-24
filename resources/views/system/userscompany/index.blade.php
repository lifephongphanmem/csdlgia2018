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
            $('#name').change(function() {
                var name = '&name='+ $('#name').val();
                var username = '&username='+$('#username').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/userscompany?'  + name + username + paginate;
                window.location.href = url;
            });
            $('#username').change(function() {
                var name = '&name='+ $('#name').val();
                var username = '&username='+$('#username').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/userscompany?'  + name + username + paginate;
                window.location.href = url;
            });
            $('#paginate').change(function() {
                var name = '&name='+ $('#name').val();
                var username = '&username='+$('#username').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/userscompany?'  + name + username + paginate;
                window.location.href = url;
            });
        });
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý thông tin<small>&nbsp;tài khoản truy cập </small>
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
                <hr>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Tên tài khoản<span class="require">*</span></label>
                                {!! Form::text('name', $inputs['name'], ['id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Username<span class="require">*</span></label>
                                {!! Form::text('username', $inputs['username'], ['id' => 'username', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    Hiển thị
                                    <div class="select2-container form-control input-xsmall input-inline" >
                                        <select class="form-control" name="paginate" id="paginate" >
                                            <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                            <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                            <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                            <option value="100" {{$inputs['paginate'] == 100? 'selected' : ''}}>100</option>
                                        </select>
                                    </div>
                                    thông tin
                                </label>
                            </div>
                        </div></br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center">Tên tài khoản</th>
                                <th style="text-align: center" width="10%">Username</th>
                                <th style="text-align: center" width="5%">Level</th>
                                <th style="text-align: center" width="20%">Trạng thái</th>
                                <th style="text-align: center" width="25%">Thao tác</th>
                                </thead>
                                <tbody>
                                @if($model->count() != 0)
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
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="6">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            @if(count($model) != 0)
                                <div class="col-md-5 col-sm-12">
                                    <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">
                                        Hiển thị 1 đến {{$model->count()}} trên {{$model->total()}} thông tin
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="sample_3_paginate">
                                        {{$model->appends(['name' => $inputs['name'],
                                                       'username'=>$inputs['username'],
                                                       'paginate'=>$inputs['paginate'],
                                    ])->links()}}
                                    </div>
                                </div>
                            @endif
                        </div>
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