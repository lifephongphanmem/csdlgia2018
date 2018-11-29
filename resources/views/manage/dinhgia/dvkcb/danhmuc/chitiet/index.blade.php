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
        function ClickCreate(){
            var valid=true;
            var message='';
            var magoc = $('#magoc').val();
            var tendichvu = $('#tendichvu').val();


            if(magoc == '' || tendichvu == ''){
                valid=false;
                message +='Các thông tin nhập không được bỏ trống \n';
            }
            if(valid){
                $("#frm_create").unbind('submit').submit();
            }else{
                $("#frm_create").submit(function (e) {
                    e.preventDefault();
                });
                toastr.error(message,'Lỗi!.');
            }
        }
        function ClickUpdate(){
            var valid=true;
            var message='';
            var magoc = $('#edit_magoc').val();
            var tendichvu = $('#edit_tendichvu').val();


            if(magoc == '' || tendichvu == ''){
                valid=false;
                message +='Các thông tin nhập không được bỏ trống \n';
            }
            if(valid){
                $("#frm_update").unbind('submit').submit();
            }else{
                $("#frm_update").submit(function (e) {
                    e.preventDefault();
                });
                toastr.error(message,'Lỗi!.');
            }
        }
        function ClickEdit(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'dmdichvukcb/show',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#edit-tt').replaceWith(data.message);
                    }
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
        Danh mục dịch vụ khám chữa bệnh<small>&nbsp;chi tiết</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('dmgiadvkcb','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        @endif
                        <a href="{{url('nhomdichvukcb')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-reply"></i> Quay lại </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Tên nhóm</th>
                            <th style="text-align: center">Mã <br>dịch vụ</th>
                            <th style="text-align: center">Mã gốc</th>
                            <th style="text-align: center">Cấp độ</th>
                            <th style="text-align: center">Tên dịch vụ</th>
                            <th style="text-align: center">Đơn vi<br>tính</th>
                            <th style="text-align: center">Theo dõi</th>
                            <th style="text-align: center" width="15%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td class="active" >{{$tt->tennhom}}</td>
                            <td style="text-align: center">{{$tt->madv}}</td>
                            <td style="text-align: center">{{$tt->magoc}}</td>
                            <td style="text-align: center">{{$tt->capdo}}</td>
                            <td class="success" style="font-weight: bold">{{$tt->tendichvu}}</td>
                            <td style="text-align: center">{{$tt->dvt}}</td>
                            <td style="text-align: center">
                                @if($tt->theodoi == 'KTD')
                                    <span class="badge badge-active">Không theo dõi</span>
                                @else
                                    <span class="badge badge-success">Theo dõi</span>
                                @endif
                            </td>
                            <td>
                                @if(can('dmgiadvkcb','edit'))
                                <button type="button" onclick="ClickEdit('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
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

    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmdichvukcb','id' => 'frm_create'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới dịch vụ khám chữa bệnh?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mã gốc<span class="require">*</span></label>
                                <input type="text" name="magoc" id="magoc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Cấp độ<span class="require">*</span></label>
                                <select name="capdo" id="capdo" class="form-control" style="text-align: center">
                                    @for($i=1;$i<=4;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mã dịch vụ<span class="require">*</span></label>
                                <input type="text" name="madv" id="madv" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                <select name="dvt" id="dvt" class="form-control" style="text-align: center">
                                    <option value="">--Chọn đơn vị tính--</option>
                                    <option value="lần">Lần</option>
                                    <option value="ngày">Ngày</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên dịch vụ<span class="require">*</span></label>
                                <input type="text" name="tendichvu" id="tendichvu" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="manhom" id="manhom" value="{{$manhom}}">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickCreate()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model-edit-->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa dịch vụ khám chữa bệnh?</h4>
                </div>
                {!! Form::open(['url'=>'dmdichvukcb/update','id' => 'frm_update'])!!}
                <div class="modal-body" id="edit-tt">
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



@stop