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
        function ClickUpdate(){
            $("#frm_update").unbind('submit').submit();
        }
        function ClickEdit(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'thongtinmathangbog/edit',
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
        Thông tin  mặt hàng<small>&nbsp;bình ổn giá</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="note note-success">
                <p>-Hàng hóa, dịch vụ thực hiện bình ổn giá: Quy định chi tiết tại Khoản 1 Điều 3- Nghị định số 177/2013/NĐ-CP ngày 14/11/2013</p>
                <p>Mặt hàng <b>{{$inputs['mh']}}</b> - Hình thức kê khai - đăng ký giá hiện tại: <b>@if($modeldmnghe->phanloai == 'DK') Đăng ký giá @else Kê khai giá @endif</b>
                </p>
            </div>
        </div>
        <div style="text-align: center">
            <button type="button" onclick="ClickEdit('{{$modeldmnghe->id}}')" class="btn green" data-target="#modal-edit" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>

    <!--Model-edit-->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa mặt hàng bình ổn giá?</h4>
                </div>
                {!! Form::open(['url'=>'thongtinmathangbog/update','id' => 'frm_update'])!!}
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