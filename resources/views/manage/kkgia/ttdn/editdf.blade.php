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
        Thông tin doanh nghiệp<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtindoanhnghiep/df/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tttaikhoan']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã số thuế</label>
                                        <p style="color: #000088"><b>{{$model->maxa}}</b></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên doanh nghiệp<span class="require">*</span></label>
                                        {!!Form::text('tendn', null, array('id' => 'tendn','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại trụ sở chính</label>
                                        {!!Form::text('tel', null, array('id' => 'tel','class' => 'form-control','autofocus'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số fax trụ sở chính</label>
                                        {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ trụ sở<span class="require">*</span></label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi đăng ký nộp thuế<span class="require">*</span></label>
                                        {!!Form::text('noidknopthue', null, array('id' => 'noidknopthue','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giấy phép đăng ký kinh doanh<span class="require">*</span></label>
                                        {!!Form::text('giayphepkd', null, array('id' => 'giayphepkd','class' => 'form-control required'))!!}
                                    </div>
                                    <p class="help-block">
                                        <span class="label label-success label-sm">
                                        Help: &nbsp;</span>
                                        <a target="_blank" href="http://help.csdlgia.vn/data/help/tienich/upfile/upfile.pdf">
                                            Hướng dẫn cách chia sẻ giấy phép đăng ký kinh doanh </a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Link chia sẻ giấy phép đăng ký kinh doanh<span class="require">*</span></label>
                                        {!!Form::text('tailieu', null, array('id' => 'tailieu','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Chức danh người ký<span class="require">*</span></label>
                                        {!!Form::text('chucdanh', null, array('id' => 'chucdanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Họ và tên người ký<span class="require">*</span></label>
                                        {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh<span class="require">*</span></label>
                                        {!!Form::text('diadanh', null, array('id' => 'diadanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email quản lý<span class="require">*</span></label>
                                        {!!Form::email('email', null, array('id' => 'email','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="mahuyen" id="mahuyen" value="{{$model->mahuyen}}">
                                <input type="hidden" name="maxa" id="maxa" value="{{$model->maxa}}">
                                <input type="hidden" name="level" id="level" value="{{$model->level}}">
                            </div>
                            @if($model->level == 'DVVT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Cung cấp dịch vụ</label>
                                            <div class="input-group">
                                                <div class="icheck-inline">
                                                    <label>
                                                        <input type="checkbox" value="1" {{ (isset($settingdvvt->dvvt->vtxk) && $settingdvvt->dvvt->vtxk == 1) ? 'checked' : '' }} name="roles[dvvt][vtxk]"> Vận tải xe khách </label>
                                                    <label>
                                                        <input type="checkbox" value="1" {{(isset($settingdvvt->dvvt->vtxb) && $settingdvvt->dvvt->vtxb == 1) ? 'checked' : '' }} name="roles[dvvt][vtxb]"> Vận tải xe buýt </label>
                                                    <label>
                                                        <input type="checkbox" value="1" {{(isset($settingdvvt->dvvt->vtxtx) && $settingdvvt->dvvt->vtxtx == 1) ? 'checked' : '' }} name="roles[dvvt][vtxtx]"> Vận tải xe taxi </label>
                                                    <label>
                                                        <input type="checkbox" value="1" {{(isset($settingdvvt->dvvt->vtch) && $settingdvvt->dvvt->vtch == 1) ? 'checked' : '' }} name="roles[dvvt][vtch]"> Vận tải chở hàng</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($model->level == 'DKG')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][xangdau]" {{ (isset($loaihinhhd->dkg->xangdau) && $loaihinhhd->dkg->xangdau == 1) ? 'checked' : '' }} class="form-control"> Xăng dầu
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][dien]" {{ (isset($loaihinhhd->dkg->dien) && $loaihinhhd->dkg->dien == 1) ? 'checked' : '' }} class="form-control"> Điện bán lẻ
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][khidau]" {{ (isset($loaihinhhd->dkg->khidau) && $loaihinhhd->dkg->khidau == 1) ? 'checked' : '' }} class="form-control"> Khí dầu mỏ hóa lỏng
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][phan]" {{ (isset($loaihinhhd->dkg->phan) && $loaihinhhd->dkg->phan == 1) ? 'checked' : '' }} class="form-control"> Phân đạm urê; phân NPK
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][thuocbvtv]" {{ (isset($loaihinhhd->dkg->thuocbvtv) && $loaihinhhd->dkg->thuocbvtv == 1) ? 'checked' : '' }}> Thuốc bảo vệ thực vật
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][vacxingsgc]" {{ (isset($loaihinhhd->dkg->vacxingsgc) && $loaihinhhd->dkg->vacxingsgc == 1) ? 'checked' : '' }}> Vắc-xin phòng bệnh gia súc gia cầm
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][muoi]" {{ (isset($loaihinhhd->dkg->muoi) && $loaihinhhd->dkg->muoi == 1) ? 'checked' : '' }}> Muối ăn
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][suate6t]" {{ (isset($loaihinhhd->dkg->suate6t) && $loaihinhhd->dkg->suate6t == 1) ? 'checked' : '' }}> Sữa trẻ em dưới 6 tuổi
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][duong]" {{ (isset($loaihinhhd->dkg->duong) && $loaihinhhd->dkg->duong == 1) ? 'checked' : '' }}> Đường ăn
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][thocgao]" {{ (isset($loaihinhhd->dkg->thocgao) && $loaihinhhd->dkg->thocgao == 1) ? 'checked' : '' }}> Thóc, gạo tẻ thường
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="roles[dkg][thuocpcb]" {{ (isset($loaihinhhd->dkg->thuocpcb) && $loaihinhhd->dkg->thuocpcb == 1) ? 'checked' : '' }}> Thuốc phòng, chữa bệnh cho người
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <div class="row" style="text-align: center">
                <div class="col-md-12">
                    <a href="{{url('ttdn_dich_vu_luu_tru')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i>&nbsp;Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tttaikhoan").validate({
                rules: {
                    name :"required"
                },
                messages: {
                    name :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

@stop