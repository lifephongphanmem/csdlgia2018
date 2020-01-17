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
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ thẩm định giá<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->
<hr>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thamdinhgia/'. $model->id, 'files'=>true,'class'=>'horizontal-form','id'=>'update_thamdinhgia']) !!}
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị thẩm định giá: <b style="color: blue">{{$modeldv->tendv}}</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                    {!!Form::text('dvyeucau',null, array('id' => 'dvyeucau','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thông tin tờ trình<span class="require">*</span></label>
                                    {!!Form::text('hosotdgia',null, array('id' => 'hosotdgia','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên hàng hóa yêu cầu thẩm định<span class="require">*</span></label>
                                    {!!Form::text('tttstd',null, array('id' => 'tttstd','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('thoidiem',date('d/m/Y',  strtotime($model->thoidiem)), array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <!--div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                    {!!Form::text('mucdich',null, array('id' => 'mucdich','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div-->
                        <div class="row">

                            <!--div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thuế VAT</label>
                                    {!! Form::select(
                                    'thuevat',
                                    array(
                                    'Giá bao gồm thuế VAT' => 'Giá bao gồm thuế VAT',
                                    'Giá chưa bao gồm thuế VAT' => 'Giá chưa bao gồm thuế VAT'
                                    ),null,
                                    array('id' => 'thuevat', 'class' => 'form-control'))
                                    !!}
                                </div>
                            </div-->

                        </div>
                        <!--div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phương pháp thẩm định</label>
                                    {!!Form::text('ppthamdinh',null, array('id' => 'ppthamdinh','class' => 'form-control required'))!!}
                                </div>
                            </div>
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
                                    array('id' => 'nguonvon', 'class' => 'form-control'))
                                    !!}
                                </div>
                            </div>

                        </div-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('diadiem',null, array('id' => 'diadiem','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                    {!!Form::text('sotbkl',null, array('id' => 'sotbkl','class' => 'form-control required'))!!}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                    {!!Form::text('songaykq',null, array('id' => 'songaykq','data-mask'=>'fdecimal','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                    {!!Form::text('thoihan',date('d/m/Y',  strtotime($model->thoihan)), array('id' => 'thoihan','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label for="selGender" class="control-label">Ghi chú</label>
                                    <div>
                                        <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="5">{{$model->ghichu}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 1</label>
                                    @if(isset($model->ipf1))
                                        <a href="{{url('/data/thamdinhgia/'.$model->ipf1)}}" target="_blank">{{$model->ipt1}}</a>
                                    @endif
                                    <input name="ipf1" id="ipf1" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 2</label>
                                    @if(isset($model->ipf2))
                                        <a href="{{url('/data/thamdinhgia/'.$model->ipf2)}}" target="_blank">{{$model->ipt2}}</a>
                                    @endif
                                    <input name="ipf2" id="ipf2" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 3</label>
                                    @if(isset($model->ipf3))
                                        <a href="{{url('/data/thamdinhgia/'.$model->ipf3)}}" target="_blank">{{$model->ipt3}}</a>
                                    @endif
                                    <input name="ipf3" id="ipf3" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 4</label>
                                    @if(isset($model->ipf4))
                                        <a href="{{url('/data/thamdinhgia/'.$model->ipf4)}}" target="_blank">{{$model->ipt4}}</a>
                                    @endif
                                    <input name="ipf4" id="ipf4" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 5</label>
                                    @if(isset($model->ipf5))
                                        <a href="{{url('/data/thamdinhgia/'.$model->ipf5)}}" target="_blank">{{$model->ipt5}}</a>
                                    @endif
                                    <input name="ipf5" id="ipf5" type="file">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">
                        <input type="hidden" name="maxa" id="maxa" value="{{$model->maxa}}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin hàng hóa</button>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        {{--<th style="text-align: center">Mã hàng hóa</th>--}}
                                        <th style="text-align: center">Tên hàng hóa-Quy cách</th>
                                        <th style="text-align: center">Thông số kỹ thuật</th>
                                        <th style="text-align: center">Xuất xứ</th>
                                        <th style="text-align: center">Đơn vị</br>tính</th>
                                        <th style="text-align: center">Số <br>lượng</th>
                                        <th style="text-align: center">Đơn giá</br>đề nghị</th>
                                        <th style="text-align: center">Giá trị</br>đề nghị</th>
                                        <th style="text-align: center">Đơn giá</br>thẩm định</th>
                                        <th style="text-align: center">Giá trị</br>thẩm định</th>
                                        <th style="text-align: center">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                    @foreach($modelct as $key=>$tt)
                                        <tr id={{$tt->id}}>
                                            <td style="text-align: center">{{($key +1)}}</td>
                                            {{--<td style="text-align: center">{{$tt->mats}}</td>--}}
                                            <td class="active">{{$tt->tents}}-{{$tt->dacdiempl}}</td>
                                            <td style="text-align: left">{{$tt->thongsokt}}</td>
                                            <td style="text-align: left">{{$tt->nguongoc}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiathamdinh)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giatritstd)}}</td>
                                            <td>
                                                <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$tt->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            </td>
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
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->

            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_thamdinhgia").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    @include('manage.thamdinhgia.modal');
@stop