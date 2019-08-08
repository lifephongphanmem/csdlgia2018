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
        function ClickDelete(){
            $('#frm_delete').submit();
        }
        function ClickUpdate(){
            $("#frm_update").submit();
        }
        function ClickEdit(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'danhmucnganhkd/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_manganh').val(data.manganh);
                    $('#edit_tennganh').val(data.tennganh);
                    $('#edit_theodoi').val(data.theodoi);
                    $('#edit_id').val(data.id);
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Danh mục ngành<small>&nbsp;kinh doanh</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center">Mã nghành</th>
                                <th style="text-align: center">Tên nghành</th>
                                <th style="text-align: center">Theo dõi</th>
                                <th style="text-align: center" width="20%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr class="odd gradeX">
                                    <td style="text-align: center">{{$key + 1}}</td>
                                    <td>{{$tt->manganh}}</td>
                                    <td class="active" >{{$tt->tennganh}}</td>
                                    <td style="text-align: center">
                                        @if($tt->theodoi == 'KTD')
                                            <span class="badge badge-active">Không theo dõi</span>
                                        @else
                                            <span class="badge badge-success">Theo dõi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" onclick="ClickEdit('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                        @if($tt->theodoi == 'TD')
                                            <a href="{{url('danhmucnghekd?&manganh='.$tt->manganh)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i> Xem chi tiết</a>
                                        @endif
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

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa ngành kinh doanh?</h4>
                </div>
                {!! Form::open(['url'=>'danhmucnganhkd/update','id' => 'frm_update'])!!}
                <div class="modal-body" id="edit-tt">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mã ngành<span class="require">*</span></label>
                                <input type="text" name="edit_manganh" id="edit_manganh" class="form-control" data-mask="user" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên ngành<span class="require">*</span></label>
                                <input type="text" name="edit_tennganh" id="edit_tennganh" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Theo dõi<span class="require">*</span></label>
                                <select  name="edit_theodoi" id="edit_theodoi" class="form-control">
                                    <option value="KTD" >Dừng theo dõi</option>
                                    <option value="TD" >Theo dõi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" id="edit_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickUpdate()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
@stop