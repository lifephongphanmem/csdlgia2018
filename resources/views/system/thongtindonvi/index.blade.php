@extends('main')

@section('custom-style')

@stop


@section('custom-script')
<script>
    function edittt(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/thongtindonvi/edit',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_emailql').val(data.emailql);
                $('#edit_emailqt').val(data.emailqt);
                $('#edit_tendvhienthi').val(data.tendvhienthi);
                $('#edit_tendvcqhienthi').val(data.tendvcqhienthi);
                $('#edit_songaylv').val(data.songaylv);
                $('#edit_id').val(data.id);
            },
            error: function (message) {
                toastr.error(message, 'Lỗi!');
            }
        });
    }
    function ClickUpdate(){
        $('#update_thongtindonvi').submit();
    }
</script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin <small>đơn vị</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user" class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td style="width:15%">
                                <b>Tên đơn vị</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted"><b style="color: blue">{{$model->tendv}}</b>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Email quản lý</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{$model->emailql}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Email quản trị</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{$model->emailqt}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Địa chỉ</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{$model->diachi}}
                                </span>
                            </td>
                        </tr
                        <tr>
                            <td style="width:15%">
                                <b>Tên đơn vị hiển thị báo cáo</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{$model->tendvhienthi}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Tên đơn vị chủ quản hiển thị báo cáo</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{$model->tendvcqhienthi}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Số ngày làm việc</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted" style="color: #0000ff">{{$model->songaylv}} ngày
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="text-align: center">
        <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-success" onclick="edittt('{{$model->id}}')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
        &nbsp;
    </div>

    <div id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thongtindonvi', 'id' => 'update_thongtindonvi', 'class'=>'horizontal-form']) !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email quản lý</label>
                                <input type="text" name="edit_emailql" id="edit_emailql" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email quản trị</label>
                                <input type="text" name="edit_emailqt" id="edit_emailqt" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên đơn vị hiển thị báo cáo</label>
                                <input name="edit_tendvhienthi" id="edit_tendvhienthi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên đơn vị cấp trên hiển thị báo cáo</label>
                                <input name="edit_tendvcqhienthi" id="edit_tendvcqhienthi" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số ngày làm việc</label>
                                {!! Form::select('edit_songaylv', array(
                                '1'=>'1',
                                '2'=>'2',
                                '3'=>'3',
                                '4'=>'4',
                                '5'=>'5',
                                '6'=>'6',
                                '7'=>'7',
                                ),null, array('id'=>'edit_songaylv','class'=>'form-control'))!!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" id="edit_id">
                </div>
                {!! Form::close() !!}
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="ClickUpdate()">Cập nhật</button>
                </div>

            </div>
        </div>
    </div>
@stop