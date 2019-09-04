@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin cơ sở kinh doanh<small>&nbsp;chỉnh sửa</small>
        <p><h5 style="color: blue">{{$modeldn->tendn}}&nbsp;- Mã số thuế: {{$modeldn->maxa}}</h5></p>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtincskd/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttcskddvlt','files'=>true,'enctype'=>'multipart/form-data']) !!}
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên cơ sở kinh doanh<span class="require">*</span></label>
                                {!!Form::text('tencskd', null, array('id' => 'tencskd','class' => 'form-control required','autofocus'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại hạng<span class="require">*</span></label>
                                <select id="loaihang" name="loaihang" class="form-control">
                                    <option value="1" {{($model->loaihang == '1') ? 'selected' : ''}}>1 sao</option>
                                    <option value="2" {{($model->loaihang == '2') ? 'selected' : ''}}>2 sao</option>
                                    <option value="3" {{($model->loaihang == '3') ? 'selected' : ''}}>3 sao</option>
                                    <option value="4" {{($model->loaihang == '4') ? 'selected' : ''}}>4 sao</option>
                                    <option value="5" {{($model->loaihang == '5') ? 'selected' : ''}}>5 sao</option>
                                    <option value="K" {{($model->loaihang == 'K') ? 'selected' : ''}}>Khác (Nhà nghỉ)</option>
                                    <option value="CXD" {{($model->loaihang == 'CXD') ? 'selected' : ''}}>Chưa xác định (Khách sạn chưa xác định sao)</option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số điện thoai<span class="require">*</span></label>
                                {!!Form::text('telkd', null, array('id' => 'telkd','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Địa chỉ</label>
                                {!!Form::text('diachikd', null, array('id' => 'diachikd','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Trang chủ<span class="require">*</span></label>
                                {!!Form::text('link', null, array('id' => 'link','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ảnh đại diện<span class="require">*</span></label>
                                {!!Form::file('avatar',array('id'=>'avatar','class' => 'passvalid','accept'=>'image/*'))!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ảnh hiện tại<span class="require">*</span></label>
                                <img src="{{ url('images/avatar/'.$model->avatar)}}" width="20%">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị nhận hồ sơ</label>
                                <select name="mahuyen" id="mahuyen" class="form-control">
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->maxa}}" {{$dv->maxa == $model->mahuyen ? 'selected' : ''}}>{{$dv->tendv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!--/row-->
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('thongtincskddvlt')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <!--Validate Form-->
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_ttcskddvlt").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <script>
        jQuery(function($){
            $('select[name="district"]').change(function(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/ajax/getTown',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        district: $(this).val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success')
                            $('select[name="town"]').replaceWith(data.message);
                    }
                });
            });
        });
    </script>
    @include('includes.script.create-header-scripts')
@stop