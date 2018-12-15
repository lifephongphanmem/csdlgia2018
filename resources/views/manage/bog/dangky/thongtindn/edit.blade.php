@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin đăng ký doanh nghiệp<small> thêm mới</small>
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
                    {!! Form::model($model, ['method' => 'POST', 'url'=>'updatednbog', 'class'=>'horizontal-form','id'=>'updatednbog']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Thông tin doanh nghiệp</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-font"></i>
                                            <input class="form-control required" type="text" placeholder="Tên doanh nghiệp" name="tendn" id="tendn"  required autofocus value="{{$modeldn->tendn}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-key"></i>
                                            <input class="form-control required" type="text" placeholder="Mã số thuế" name="maxa" id="maxa"  required value="{{$modeldn->maxa}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-check"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Địa chỉ doanh nghiệp" name="diachi" id="diachi" required value="{{$modeldn->diachi}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-phone"></i>
                                            <input class="form-control placeholder-no-fix" type="tel" placeholder="Số điện thoại trụ sở" name="tel" id="tel" value="{{$modeldn->tel}}" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-fax"></i>
                                            <input class="form-control placeholder-no-fix" type="tel" placeholder="Số fax trụ sở" name="fax" id="fax" value="{{$modeldn->fax}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control required" type="email" placeholder="Email" name="email" id="email" value="{{$modeldn->email}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-check"></i>
                                            <input class="form-control required" type="text" placeholder="Nơi đăng ký nộp thuế" name="noidknopthue" id="noidknopthue" value="{{$modeldn->noidknopthue}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="mahuyen" id="mahuyen" required>
                                            <option value="">--Chọn đơn vị quản lý--</option>
                                            @foreach($model as $tt)
                                                <option @if($modeldn->mahuyen == $tt->maxa) selected @endif value="{{$tt->maxa}}">{{$tt->tendv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-file-pdf-o"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Số giấy phép đăng ký kinh doanh" name="giayphepkd" id="giayphepkd" value="{{$modeldn->giayphepkd}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-file"></i>
                                            <input class="form-control required" type="text" placeholder="Sản xuất hay dịch vụ" name="phanloaidn" id="phanloaidn" value="{{$modeldn->phanloaidn}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-file"></i>
                                            <input class="form-control required" type="text" placeholder="Ghi chú" name="ghichu" id="ghichu" value="{{$modeldn->ghichu}}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input class="form-control required" style="display: none" type="text" name="phanloai" id="phanloai" value="{{$ma}}">
                            <input class="form-control required" style="display: none" type="text" name="id" id="id" value="{{$modeldn->id}}">
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('indexdn?ma='.$ma)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    @include('includes.script.create-header-scripts')
@stop