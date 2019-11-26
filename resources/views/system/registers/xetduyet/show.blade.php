@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->
    <script>
        function getId(id){
            document.getElementById("kichhoat_id").value=id;
        }
        function ClickKichHoat(){
            $('#frm_create').submit();
        }
        function getIdTraLai(id){
            document.getElementById("tralai_id").value=id;
        }
        function ClickTraLai(){
            if($('#lydo').val() != ''){
                toastr.success("Thông tin đăng ký đã được trả lại!", "Thành công!");
                $("#frm_tralai").unbind('submit').submit();
            }else{
                toastr.error("Bạn cần nhập lý do trả lại hồ sơ", "Lỗi!!!");
                $("#frm_tralai").submit(function (e) {
                    e.preventDefault();
                });
            }
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
                            {{--<tr>--}}
                                {{--<td style="width:15%">--}}
                                    {{--<b>Nới đăng ký nộp thuế</b>--}}
                                {{--</td>--}}
                                {{--<td style="width:35%">--}}
                                {{--<span class="text-muted">{{$modelcompany->noidknopthue}}--}}
                                {{--</span>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td style="width:15%">--}}
                                    {{--<b>Giấy đăng ký kinh doanh</b>--}}
                                {{--</td>--}}
                                {{--<td style="width:35%">--}}
                                {{--<span class="text-muted"><a href="{{url('data/doanhnghiep/'.$modelcompany->tailieu)}}" target="_blank">{{$modelcompany->giayphepkd}}</a>--}}
                                {{--</span>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td style="width:15%">--}}
                                    {{--<b>Chức danh</b>--}}
                                {{--</td>--}}
                                {{--<td style="width:35%">--}}
                                {{--<span class="text-muted">{{$modelcompany->chucdanh}}--}}
                                {{--</span>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td style="width:15%">--}}
                                    {{--<b>Người ký</b>--}}
                                {{--</td>--}}
                                {{--<td style="width:35%">--}}
                                {{--<span class="text-muted">{{$modelcompany->nguoiky}}--}}
                                {{--</span>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <td style="width:15%">
                                    <b>Địa danh</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->diadanh}}
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
                            <tr>
                                <td style="width:15%">
                                    <b>Mã đăng ký</b>
                                </td>
                                <td style="width:35%">
                                <span class="text-muted">{{$modelcompany->mahs}}
                                </span>
                                </td>
                            </tr>
                            @if($model->status == 'Bị trả lại')
                                <tr>
                                    <td style="width:15%">
                                        <b>Lý do trả lại</b>
                                    </td>
                                    <td style="width:35%">
                                <span class="text-muted">{{$model->lydo}}
                                </span>
                                    </td>
                                </tr>
                            @endif
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
            <!-- END FORM-->
            </div>
        </div>
    </div>
    <div class="row" style="text-align: center">
        <div class="cod-md-12">
            <a href="{{url('register')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            @if($model->status != 'Bị trả lại')
            <button type="button" class="btn green" onclick="getId('{{$model->id}}')" data-target="#create-modal" data-toggle="modal"><i class="fa fa-check"></i> Kích hoạt tài khoản truy cập</button>
            <button type="button" class="btn red" onclick="getIdTraLai('{{$model->id}}')" data-target="#tralai-modal" data-toggle="modal"><i class="fa fa-mail-forward"></i> Trả lại hồ sơ đăng ký tài khoản truy cập</button>
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
                {!! Form::open(['url'=>'register/kichhoat','id' => 'frm_kichhoat'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý kích hoạt tài khoản?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Doanh nghiệp <b>{{$modelcompany->tendn}}</b> - tài khoản truy cập <b>{{$model->username}}</b></label>
                    </div>
                </div>
                <input type="hidden" name="kichhoat_id" id="kichhoat_id">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickKichHoat()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="tralai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'register/tralai','id' => 'frm_tralai'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý trả lại hồ sơ tài khoản?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Doanh nghiệp <b>{{$modelcompany->tendn}}</b> - tài khoản truy cập <b>{{$model->username}}</b></label>
                    </div>
                    <div class="form-group">
                        <label>Lý do trả lại</label>
                        <textarea class="form-control" id="lydo" name="lydo"></textarea>
                    </div>
                </div>
                <input type="hidden" name="tralai_id" id="tralai_id">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickTraLai()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@stop