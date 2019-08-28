@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin tài khoản<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'userscompany/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tttaikhoan']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài khoản<span class="require">*</span></label>
                                        {!!Form::text('name', null, array('id' => 'name','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Kích hoạt" {{($model->status == 'Kích hoat' ? 'selected' : '')}}>Kích hoạt</option>
                                            <option value="Vô hiệu hóa" {{($model->status == 'Vô hiệu hóa' ? 'selected' : '')}}>Vô hiệu hóa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tài khoản truy cập<span class="require">*</span></label>
                                        {!!Form::text('username', null, array('id' => 'username','class' => 'form-control required', 'disabled'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mật khẩu mới<span class="require">*</span></label>
                                        {!!Form::text('newpass', null, array('id' => 'newpass','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <table id="user" class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td style="width:15%">
                                        <b>Tên doanh nghiệp</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->tendn}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Mã số thuế</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->maxa}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Địa chỉ</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->diachi}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Số điện thoại</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->tel}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Số Fax</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->fax}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Email quản lý</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->email}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Nới đăng ký nộp thuế</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->noidknopthue}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Giấy đăng ký kinh doanh</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted"><a href="{{url('data/doanhnghiep/'.$modelcompany->tailieu)}}" target="_blank">{{$modelcompany->giayphepkd}}</a>
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Chức danh</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->chucdanh}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Người ký</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->nguoiky}}
                                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%">
                                        <b>Địa danh</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->diadanh}}
                                </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <tr>
                                    <th>STT</th>
                                    <th>Ngành</th>
                                    <th>Nghề</th>
                                    <th>Đơn vị nhận hồ sơ</th>
                                </tr>
                                @foreach($modellvcc as $key=> $lvcc)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$lvcc->tennganh}}</td>
                                        <td>{{$lvcc->tennghe}}</td>
                                        <td>{{$lvcc->tendv}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('userscompany?&level='.$model->level)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tttaikhoan").validate({
                rules: {
                    name :"required",
                },
                messages: {
                    name :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
@stop