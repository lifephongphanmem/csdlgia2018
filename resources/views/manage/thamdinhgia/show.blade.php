@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ thẩm định giá<small> chi tiết</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::model($model, ['class'=>'horizontal-form','id'=>'update_thamdinhgia']) !!}
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                    {!!Form::text('hosotdgia',null, array('id' => 'hosotdgia','class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('thoidiem',date('d/m/Y',  strtotime($model->thoidiem)), array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('diadiem',null, array('id' => 'diadiem','class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                    {!!Form::text('ppthamdinh',null, array('id' => 'ppthamdinh','class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                    {!!Form::text('mucdich',null, array('id' => 'mucdich','class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                    {!!Form::text('dvyeucau',null, array('id' => 'dvyeucau','class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                    {!! Form::select(
                                    'nguonvon',
                                    array(
                                    'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và Nguồn vốn đầu tư)',
                                    'Thường xuyên' => 'Nguồn vốn thường xuyên',
                                    'Đầu tư' => 'Nguồn vốn đầu tư'
                                    ),null,
                                    array('id' => 'nguonvon', 'class' => 'form-control','readonly'))
                                    !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thuế VAT</label>
                                    {!! Form::select(
                                    'thuevat',
                                    array(
                                    'Giá bao gồm thuế VAT' => 'Giá bao gồm thuế VAT',
                                    'Giá chưa bao gồm thuế VAT' => 'Giá chưa bao gồm thuế VAT'
                                    ),null,
                                    array('id' => 'thuevat', 'class' => 'form-control','readonly'))
                                    !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                    {!!Form::text('sotbkl',null, array('id' => 'sotbkl','class' => 'form-control required','readonly'))!!}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                    {!!Form::text('songaykq',null, array('id' => 'songaykq','data-mask'=>'fdecimal','class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                    {!!Form::text('thoihan',date('d/m/Y',  strtotime($model->thoihan)), array('id' => 'thoihan','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Tên tài sản-<br>Thông số kỹ thuật</th>
                                        <th style="text-align: center">Đơn vị</br>tính</th>
                                        <th style="text-align: center">Số <br>lượng</th>
                                        <th style="text-align: center">Đơn giá</br>đề nghị</th>
                                        <th style="text-align: center">Giá trị</br>đề nghị</th>
                                        <th style="text-align: center">Đơn giá</br>thẩm định</th>
                                        <th style="text-align: center">Giá trị</br>thẩm định</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                    @foreach($modelct as $key=>$tt)
                                        <tr>
                                            <td style="text-align: center">{{($key +1)}}</td>
                                            <td class="active">{{$tt->tents}}-{{$tt->thongsokt}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiathamdinh)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giatritstd)}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a href="{{url('thamdinhgia?&trangthai='.$model->trangthai.'&maxa='.$model->maxa)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->

            <!-- END VALIDATION STATES-->
        </div>
    </div>

@stop