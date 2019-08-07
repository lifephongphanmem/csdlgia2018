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
            var manhom = $('#manhom').val();
            var tennhom = $('#tennhom').val();
            var mahh = $('#mahh').val();
            var tenhh = $('#tenhh').val();


            if(manhom == '' || tennhom == '' || mahh == '' || tenhh == ''){
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
            var manhom = $('#edit_manhom').val();
            var tennhom = $('#edit_tennhom').val();
            var mahh = $('#edit_mahh').val();
            var tenhh = $('#edit_tenhh').val();


            if(manhom == '' || tennhom == '' || mahh == '' || tenhh == ''){
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
                url: 'danhmucgiathitruong/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_manhom').val(data.manhom);
                    $('#edit_tennhom').val(data.tennhom);
                    $('#edit_mahh').val(data.mahh);
                    $('#edit_tenhh').val(data.tenhh);
                    $('#edit_dacdiemkt').val(data.dacdiemkt);
                    $('#edit_dvt').val(data.dvt);
                    $('#edit_mahuyen').val(data.mahuyen);
                    $('#edit_theodoi').val(data.theodoi);
                    $('#edit_id').val(data.id);
                    $('#edit_matt').val(data.matt);
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
        Danh mục giá thị trường chi tiết<small>&nbsp;{{$thongtu->ttqd}}</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('dmgiathitruong','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        @endif
                        <a href="{{url('thongtugiathitruong')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Mã nhóm</th>
                            <th style="text-align: center">Tên nhóm</th>
                            <th style="text-align: center">Mã hàng hóa</th>
                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                            <th style="text-align: center">Đặc điểm kinh tế, kỹ thuật, quy cách</th>
                            <th style="text-align: center">Đơn vị<br>tính</th>
                            <th style="text-align: center">Đơn vị báo cáo</th>
                            <th style="text-align: center">Theo dõi</th>
                            <th style="text-align: center" width="15%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td class="active" >{{$tt->manhom}}</td>
                            <td class="active" >{{$tt->tennhom}}</td>
                            <td style="text-align: center">{{$tt->mahh}}</td>
                            <td class="success" style="font-weight: bold">{{$tt->tenhh}}</td>
                            <td>{{$tt->dacdiemkt}}</td>
                            <td style="text-align: center">{{$tt->dvt}}</td>
                            <td>{{$tt->tendv}}</td>
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
                {!! Form::open(['url'=>'danhmucgiathitruong','id' => 'frm_create'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới hàng hóa dịch vụ ?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mã nhóm<span class="require">*</span></label>
                                <input type="text" name="manhom" id="manhom" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên nhóm<span class="require">*</span></label>
                                <input type="text" name="tennhom" id="tennhom" class="form-control require">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mã hàng hóa dịch vụ<span class="require">*</span></label>
                                <input type="text" name="mahh" id="mahh" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa dịch vụ<span class="require">*</span></label>
                                <input type="text" name="tenhh" id="tenhh" class="form-control require">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đặc điểm kỹ thuật</label>
                                <input type="text" name="dacdiemkt" id="dacdiemkt" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính</label>
                                <input type="text" name="dvt" id="dvt" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị báo cáo</label>
                                <select  name="mahuyen" id="mahuyen" class="form-control">
                                    @foreach($districts as $district)
                                        <option value="{{$district->mahuyen}}">{{$district->tendv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="matt" id="matt" value="{{$inputs['matt']}}">
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
                {!! Form::open(['url'=>'danhmucgiathitruong/update','id' => 'frm_update'])!!}
                <div class="modal-body" id="edit-tt">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mã nhóm<span class="require">*</span></label>
                                <input type="text" name="edit_manhom" id="edit_manhom" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên nhóm<span class="require">*</span></label>
                                <input type="text" name="edit_tennhom" id="edit_tennhom" class="form-control require">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mã hàng hóa dịch vụ<span class="require">*</span></label>
                                <input type="text" name="edit_mahh" id="edit_mahh" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa dịch vụ<span class="require">*</span></label>
                                <input type="text" name="edit_tenhh" id="edit_tenhh" class="form-control require">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đặc điểm kỹ thuật</label>
                                <input type="text" name="edit_dacdiemkt" id="edit_dacdiemkt" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính</label>
                                <input type="text" name="edit_dvt" id="edit_dvt" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị báo cáo</label>
                                <select  name="edit_mahuyen" id="edit_mahuyen" class="form-control">
                                    @foreach($districts as $district)
                                        <option value="{{$district->mahuyen}}">{{$district->tendv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Theo dõi</label>
                                <select  name="edit_theodoi" id="edit_theodoi" class="form-control">
                                    <option value="KTD" >Dừng theo dõi</option>
                                    <option value="TD" >Theo dõi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" id="edit_id">
                    <input type="hidden" name="edit_matt" id="edit_matt">
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