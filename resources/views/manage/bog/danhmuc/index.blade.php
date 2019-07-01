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
            var mamh = $('#mamh').val();
            var tenmh = $('#tenmh').val();


            if(mamh == '' || tenmh == ''){
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
            var mamh = $('#edit_mamh').val();
            var tenmh = $('#edit_tenmh').val();

            if(mamh == '' || tenmh == ''){
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
                url: 'dmmhbinhongia/edittt',
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
        Danh mục mặt hàng<small>&nbsp;bình ổn giá</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="note note-success">
                <p>-Hàng hóa, dịch vụ thực hiện bình ổn giá: Quy định chi tiết tại Khoản 1 Điều 3- Nghị định số 177/2013/NĐ-CP ngày 14/11/2013</p>
                <p>-Bao gồm 11 loại mặt hàng Xăng, dầu thành phẩm tiêu thụ nội địa ở nhiệt độ thực tế bao gồm: xăng động cơ (không bao gồm xăng máy bay), dầu hỏa, dầu điêzen, dầu mazut;
                    Điện bán lẻ;Khí dầu mỏ hóa lỏng (LPG);Phân đạm urê; phân NPK;Thuốc bảo vệ thực vật, bao gồm: thuốc trừ sâu, thuốc trừ bệnh, thuốc trừ cỏ;
                    Vac-xin phòng bệnh cho gia súc, gia cầm;Muối ăn;Sữa dành cho trẻ em dưới 06 tuổi;Đường ăn, bao gồm đường trắng và đường tinh luyện;
                    Thóc, gạo tẻ thường;Thuốc phòng bệnh, chữa bệnh cho người thuộc danh mục thuốc chữa bệnh thiết yếu sử dụng tại cơ sở khám bệnh, chữa bệnh.
                </p>
            </div>
        </div>
    </div>
    <div class="row"  >
        <div class="col-md-12" >
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('dmbog','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        @endif
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center" width="10%">Mã<br> mặt hàng</th>
                            <th style="text-align: center">Tên mặt hàng</th>
                            <th style="text-align: center">Hiển thị</th>
                            <th style="text-align: center">Đăng ký/ Kê khai</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td>{{$tt->mamh}}</td>
                            <td class="active">{{$tt->tenmh}}</td>
                            <td class="success">{{$tt->hienthi}}</td>
                            @if($tt->dangkykekhai == 'dangky')
                                <td style="text-align: center">
									<span class="label label-sm label-success">
									Đăng ký</span>
                                </td>
                            @else
                                <td style="text-align: center">
									<span class="label label-sm label-warning">
									Kê khai</span>
                                </td>
                            @endif
                            <td>
                                @if(can('dmbog','edit'))
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
                {!! Form::open(['url'=>'dmmhbinhongia','id' => 'frm_create'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới mặt hàng bình ổn giá?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mã mặt hàng<span class="require">*</span></label>
                                <input type="text" name="mamh" id="mamh" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên mặt hàng<span class="require">*</span></label>
                                <input type="text" name="tenmh" id="tenmh" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Hiển thị<span class="require">*</span></label>
                                <input type="text" name="hienthi" id="hienthi" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đăng ký/ Kê khai<span class="require">*</span></label>
                                <select class="form-control" id="dangkykekhai" name="dangkykekhai">
                                    <option value="dangky">Đăng ký</option>
                                    <option value="kekhai">Kê khai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <h4 class="modal-title">Chỉnh sửa mặt hàng bình ổn giá?</h4>
                </div>
                {!! Form::open(['url'=>'dmmhbinhongia/update','id' => 'frm_update'])!!}
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
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmmhbinhongia/delete','id' => 'frm_delete'])!!}
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