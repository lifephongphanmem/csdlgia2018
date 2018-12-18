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
            var mahhdv = $('#mahhdv').val();
            var tenhhdv = $('#tendichvu').val();


            if(mahhdv == '' || tenhhdv == ''){
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
            var mahhdv = $('#edit_mahhdv').val();
            var tenhhdv = $('#edit_tendichvu').val();


            if(mahhdv == '' || tenhhdv == ''){
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
                url: 'dmhanghoadichvu/show',
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
        {{$modelnhom->tennhom}}<small>&nbsp;chi tiết</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('dmgiahhdvk','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        @endif
                        <a href="{{url('nhomhanghoadichvu')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Tên nhóm</th>
                            <th style="text-align: center">Mã hàng hóa<br>dịch vụ</th>
                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                            <th style="text-align: center">Đặc điểm kỹ thuật</th>
                            <th style="text-align: center">Đơn vị<br>tính</th>
                            <th style="text-align: center">Theo dõi</th>
                            <th style="text-align: center" width="15%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td class="active" >{{$tt->tennhom}}</td>
                            <td style="text-align: center">{{$tt->mahhdv}}</td>
                            <td class="success" style="font-weight: bold">{{$tt->tenhhdv}}</td>
                            <td>{{$tt->dacdiemkt}}</td>
                            <td style="text-align: center">{{$tt->dvt}}</td>
                            <td style="text-align: center">
                                @if($tt->theodoi == 'KTD')
                                    <span class="badge badge-active">Không theo dõi</span>
                                @else
                                    <span class="badge badge-success">Theo dõi</span>
                                @endif
                            </td>
                            <td>
                                @if(can('dmgiahhdvk','edit'))
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
                {!! Form::open(['url'=>'dmhanghoadichvu','id' => 'frm_create'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới hàng hóa dịch vụ ?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mã hàng hóa dịch vụ<span class="require">*</span></label>
                                <input type="text" name="mahhdv" id="mahhdv" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                <select name="dvt" id="dvt" class="form-control" style="text-align: center">
                                    <option value="">--Chọn đơn vị tính--</option>
                                    <option value="lần">Lần</option>
                                    <option value="ngày">Ngày</option>
                                    <option value="đ/kg">đ/kg</option>
                                    <option value="đ/lít">đ/lít</option>
                                    <option value="đ/két (24 chai)">đ/két (24 chai)</option>
                                    <option value="đ/thùng (24 lon)">đ/thùng (24 lon)</option>
                                    <option value="đ/chai 750ml">đ/chai 750ml</option>
                                    <option value="đ/lọ 100 viên">đ/lọ 100 viên</option>
                                    <option value="đ/chai">đ/chai</option>
                                    <option value="đ/chiếc">đ/chiếc</option>
                                    <option value="đ/kg-đ/bao">đ/kg-đ/bao</option>
                                    <option value="đ/mét">đ/mét</option>
                                    <option value="đ/b/13kg">đ/b/13kg</option>
                                    <option value="đ/vé">đ/vé</option>
                                    <option value="đ/km">đ/km</option>
                                    <option value="đ/lần/chiếc">đ/lần/chiếc</option>
                                    <option value="triệu đồng/chỉ">triệu đồng/chỉ</option>
                                    <option value="đ/USD">đ/USD</option>
                                    <option value="đ/Euro">đ/Euro</option>
                                    <option value="đ/NDT">đ/NDT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa dịch vụ<span class="require">*</span></label>
                                <input type="text" name="tenhhdv" id="tenhhdv" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đặc điểm kỹ thuật<span class="require">*</span></label>
                                <input type="text" name="dacdiemkt" id="dacdiemkt" class="form-control">
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
                    <h4 class="modal-title">Chỉnh sửa hàng hóa dịch vụ?</h4>
                </div>
                {!! Form::open(['url'=>'dmhanghoadichvu/update','id' => 'frm_update'])!!}
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