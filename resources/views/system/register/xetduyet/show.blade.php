@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->
    <script>
        function getId(id){
            document.getElementById("idregister").value=id;
        }
        function ClickCreate(){
            $('#frm_create').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin doanh nghiệp <small> đăng ký tài khoản</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                    <!-- BEGIN FORM-->
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="portlet-body">
                        <table id="user" class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td style="width:15%">
                                    <b>Tên doanh nghiệp</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->tendn}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Mã số thuế</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->maxa}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Địa chỉ</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->diachi}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Số điện thoại</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->tel}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Số Fax</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->fax}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Email quản lý</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->email}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Nới đăng ký nộp thuế</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->noidknopthue}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Giấy đăng ký kinh doanh</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted"><a href="{{$model->tailieu}}" target="_blank">{{$model->giayphepkd}}</a>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Chức danh</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->chucdanh}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Người ký</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->nguoiky}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Địa danh</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->diadanh}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Cơ quan chủ quản</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$dvcq}}
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%">
                                    <b>Username</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->username}}
                                </span>
                                </td>
                            </tr>
                            @if($model->level == 'DVVT')
                            <tr>
                                <td style="width:15%">
                                    <b>Dịch vụ cung cấp</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">
                                    <div class="icheck-inline">
                                        <label>
                                            <input type="checkbox" disabled value="1" {{ (isset($settingdvvt->dvvt->vtxk) && $settingdvvt->dvvt->vtxk == 1) ? 'checked' : '' }} name="roles[dvvt][vtxk]"> Vận tải xe khách </label>
                                        <label>
                                            <input type="checkbox" disabled value="1" {{(isset($settingdvvt->dvvt->vtxb) && $settingdvvt->dvvt->vtxb == 1) ? 'checked' : '' }} name="roles[dvvt][vtxb]"> Vận tải xe buýt </label>
                                        <label>
                                            <input type="checkbox" disabled value="1" {{(isset($settingdvvt->dvvt->vtxtx) && $settingdvvt->dvvt->vtxtx == 1) ? 'checked' : '' }} name="roles[dvvt][vtxtx]"> Vận tải xe taxi </label>
                                        <label>
                                            <input type="checkbox" disabled value="1" {{(isset($settingdvvt->dvvt->vtch) && $settingdvvt->dvvt->vtch == 1) ? 'checked' : '' }} name="roles[dvvt][vtch]"> Vận tải chở hàng</label>
                                    </div>
                                </span>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td style="width:15%">
                                    <b>Mã đăng ký</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$model->ma}}
                                </span>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
            <!-- END FORM-->
            </div>
        </div>
    </div>
    <div class="row" style="text-align: center">
        <div class="cod-md-12">
            <a href="{{url('register?&level='.$model->level)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            @if($model->trangthai != 'Bị trả lại')
            <button type="button" class="btn green" onclick="getId('{{$model->id}}')" data-target="#create-modal" data-toggle="modal"><i class="fa fa-plus"></i> Tạo tài khoản truy cập</button>
            @endif

        </div>
    </div>
    <!-- END VALIDATION STATES-->
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'register/createtk','id' => 'frm_create'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý tạo tài khoản?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Doanh nghiệp <b>{{$model->tendn}}</b> - tài khoản truy cập <b>{{$model->username}}</b></label>
                    </div>
                </div>
                <input type="hidden" name="idregister" id="idregister">
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

@stop