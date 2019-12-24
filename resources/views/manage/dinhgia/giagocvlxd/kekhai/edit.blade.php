@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--Date-->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <!--End Date-->
@stop

@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <!--Date>
    <script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>
    <End Date-->
    <!--Date new-->
    <!--script src="{{url('minhtran/jquery.min.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    <!--End date new-->
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ giá gốc<small>&nbsp;vật liệu xây dựng chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtingiagocvlxd/'. $model->id, 'class'=>'horizontal-form','id'=>'update_giagocvlxd']) !!}
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Địa bàn: <span class="require">*</span></label>
                                <!--input type="date" name="ngaynhap" id="ngaynhap" class="form-control required" autofocus-->
                                <label class="form-control required" >{{$diaban->diaban}}</label>
                                {!!Form::hidden('district',null, array('id' => 'district','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời điểm báo cáo<span class="require">*</span></label>
                                <label class="form-control required" >Quý {{$model->quy}}/ Năm {{$model->nam}}</label>
                                {!!Form::hidden('quy',null, array('id' => 'quy','class' => 'form-control '))!!}
                                {!!Form::hidden('nam',null, array('id' => 'nam','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số quyết định</label>
                                {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required','autofocus'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ngày báo cáo<span class="require">*</span></label>
                                {!!Form::text('ngaybc',date('d/m/Y',  strtotime($model->ngaybc)), array('id' => 'ngaybc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Kê khai bổ sung vật liệu</button>
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="row" id="dsts">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                <tr>
                                    <th style="text-align: center" width="2%">STT</th>
                                    <th style="text-align: center">Tên vật liệu</th>
                                    <th style="text-align: center">Quy cách chất lượng</th>
                                    <th style="text-align: center">ĐVT</th>
                                    <th style="text-align: center">Giá vật liệu <br>gốc (đ)</th>
                                    <th style="text-align: center">Tiêu chuẩn, Quy<br> chuẩn áp dụng</th>
                                    <th style="text-align: center">Ghi chú</th>
                                    <th style="text-align: center" width="20%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelct as $key=>$tt)
                                    <tr>
                                        <td style="text-align: center">{{($key +1)}}</td>
                                        <td class="active">{{$tt->tenhhdv}}</td>
                                        <td style="text-align: left">{{$tt->qccl}}</td>
                                        <td style="text-align: center">{{$tt->dvt}}</td>
                                        <td style="text-align: right;font-weight: bold">{{number_format($tt->giagoc)}}</td>
                                        <td style="text-align: left">{{$tt->qcad}}</td>
                                        <td style="text-align: left">{{$tt->ghichu}}</td>
                                        <td>
                                            <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>
                                            <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$tt->id}});" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('thongtingiagocvlxd?&district='.$model->district.'&nam='.$model->nam)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>

    <!--Validate Form-->
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_giagocvlxd").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    @include('manage.dinhgia.giagocvlxd.kekhai.include.modal')
    @include('includes.script.create-header-scripts')
@stop