@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script>
        function confirmTraLai(id) {
            document.getElementById("idtralai").value = id;
        }
        function ClickTraLai(){
            if($('#lydo').val() == ''){
                toastr.error("Bạn cần nhập lý do trả lại hồ sơ", "Lỗi!!!");
                $('#frm_tralai').submit(function (e) {
                    e.preventDefault();
                });
            }else{
                toastr.success("Hồ sơ đã thay đổi thông tin doanh nghiệp được trả lại!", "Thành công!");
                $('#frm_tralai').unbind('submit').submit();
            }

        }
    </script>
@stop

@section('content')


    <h3 class="page-title">
        Thông tin doanh nghiệp <small>thay đổi thông tin</small>
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
                        @if(can('ttdn', 'approve'))
                            @if($modeltttd->trangthai == 'CD')
                            <a href="{{url('xetduyettdttdn/'.$modeltttd->id.'/duyet')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-check"></i> Đồng ý thay đổi thông tin </a>
                            <button type="button" class="btn btn-default btn-xs mbs" data-target="#tralai-modal" data-toggle="modal"><i class="fa fa-reply"></i>&nbsp;
                                Trả lại</button>
                            @endif
                        @endif
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    @if($modeltttd->trangthai == 'BTL')
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="font-weight: bold; color: #ff0000">Hồ sơ bị trả lại</h3>
                                <p>Lý do: {{$modeltttd->lydo}}</p>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <table id="user" class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td colspan="2" style="text-align: center;color: #5b9bd1"><b>Thông tin hiện tại</b></td>
                                </tr>
                                <tr>
                                    <td style="width:15%"> <b>Tên doanh nghiệp</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->tendn}}</span> </td>
                                </tr>
                                <tr>
                                    <td style="width:15%"><b>Mã số thuế</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->maxa}}</span></td>
                                </tr>
                                <tr>
                                    <td style="width:15%"><b>Địa chỉ trụ sở chính</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->diachi}}</span></td>
                                </tr>
                                <tr>
                                    <td style="width:15%"><b>Điện thoại trụ sở chính</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->tel}}</span></td>
                                </tr>
                                <tr>
                                    <td style="width:15%"><b>Số fax trụ sở chính</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->fax}}</span></td>
                                </tr>
                                <tr>
                                    <td style="width:15%"><b>Email quản lý</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->email}}</span></td>
                                </tr>
                                {{--<tr>--}}
                                    {{--<td style="width:15%"><b>Nơi đăng ký nộp thuế</b></td>--}}
                                    {{--<td style="width:35%"><span class="text-muted">{{$model->noidknopthue}}</span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td style="width:15%"><b>Giấy phép kinh doanh</b></td>--}}
                                    {{--<td style="width:35%"><span class="text-muted">{{$model->giayphepkd}}</span></td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td style="width:15%"><b>Giấy phép đăng ký kinh doanh</b></td>
                                    <td style="width:35%"><span class="text-muted"><a href="{{url('data/doanhnghiep/'.$model->tailieu)}}" target="_blank">Xem chi tiết</a></span></td>
                                </tr>
                                {{--<tr>--}}
                                    {{--<td style="width:15%"><b>Chức danh người ký</b></td>--}}
                                    {{--<td style="width:35%"><span class="text-muted">{{$model->chucdanh}}</span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td style="width:15%"><b>Họ và tên người ký</b></td>--}}
                                    {{--<td style="width:35%"><span class="text-muted">{{$model->nguoiky}}</span></td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td style="width:15%"><b>Địa danh</b></td>
                                    <td style="width:35%"><span class="text-muted">{{$model->diadanh}}</span></td>
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
                        @if(isset($modeltttd))
                            <div class="col-md-6">
                                <table id="user" class="table table-bordered table-striped">
                                    <tbody>
                                    <tr><td colspan="2" style="text-align: center;color: #5b9bd1"><b>Thông tin thay đổi</b></td></tr>
                                    <tr>
                                        <td style="width:15%"><b>Tên doanh nghiệp</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->tendn}}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:15%"><b>Mã số thuế</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->maxa}}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:15%"><b>Địa chỉ trụ sở chính</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->diachi}}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:15%"><b>Điện thoại trụ sở chính</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->tel}}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:15%"><b>Số fax trụ sở chính</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->fax}}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:15%"><b>Email quản lý</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->email}}</span></td>
                                    </tr>
                                    {{--<tr>--}}
                                        {{--<td style="width:15%"><b>Nơi đăng ký nộp thuế</b></td>--}}
                                        {{--<td style="width:35%"><span class="text-muted">{{$modeltttd->noidknopthue}}</span></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td style="width:15%"><b>Giấy phép kinh doanh</b></td>--}}
                                        {{--<td style="width:35%"><span class="text-muted">{{$modeltttd->giayphepkd}}</span></td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <td style="width:15%"><b>Giấy phép đăng ký kinh doanh</b></td>
                                        <td style="width:35%">
                                            @if($modeltttd->tailieu !='')
                                                <span class="text-muted"><a href="{{url('data/doanhnghiep/'.$modeltttd->tailieu)}}" target="_blank">Xem chi tiết</a></span>
                                            @endif
                                        </td>
                                    </tr>
                                    {{--<tr>--}}
                                        {{--<td style="width:15%"><b>Chức danh người ký</b></td>--}}
                                        {{--<td style="width:35%"><span class="text-muted">{{$modeltttd->chucdanh}}</span></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td style="width:15%"><b>Họ và tên người ký</b></td>--}}
                                        {{--<td style="width:35%"><span class="text-muted">{{$modeltttd->nguoiky}}</span></td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <td style="width:15%"><b>Địa danh</b></td>
                                        <td style="width:35%"><span class="text-muted">{{$modeltttd->diadanh}}</span></td>
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
                                    @foreach($modeltttdct as $key=> $ttdncttd)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$ttdncttd->tennganh}}</td>
                                            <td>{{$ttdncttd->tennghe}}</td>
                                            <td>{{$ttdncttd->tendv}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" style="text-align: center">
                <div class="col-md-12">
                    <a href="{{url('xetduyettdttdn?level='.$modeltttd->level.'&maxa='.$modeltttd->mahuyen.'&trangthai='.$modeltttd->trangthai)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
        </div>
    </div>

    <!--Model tralai-->
    <div class="modal fade" id="tralai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyettdttdn/tralai','id' => 'frm_tralai'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý trả lại hồ sơ thay đổi thông tin doanh nghiệp?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Lý do</b></label>
                        <textarea id="lydo" class="form-control" name="lydo" cols="30" rows="5"></textarea></div>
                </div>
                <input type="hidden" name="idtralai" id="idtralai" value="{{$modeltttd->id}}">
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickTraLai()">Đồng ý</button>

                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@stop