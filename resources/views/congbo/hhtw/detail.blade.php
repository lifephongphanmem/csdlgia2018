@extends('maincongbo')

@section('custom-style-cb')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script-cb')
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

@section('content-cb')
    <div class="container">
        <div class="row margin-top-10">
            <div class=" col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font hide"></i>
                            <span class="caption-subject theme-font bold uppercase">Thông tin kê khai giá dịch vụ - {{$model->tendv}}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        @if($model->hoso == 'CHITIET')
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr role="row" class="text-center">
                                <th width="2%" rowspan="2">STT</th>
                                <th rowspan="2">Mã số</th>
                                <th rowspan="2">Tên hàng hóa, dịch vụ</th>
                                <th rowspan="2">Đơn vị</br>tính</th>
                                <th colspan="2" class="text-center">Giá liền kề</th>
                                <th colspan="2" class="text-center">Giá kê khai</th>
                                <th rowspan="2">Nguồn tin</th>
                                <th rowspan="2">Ghi chú</th>
                            </tr>
                            <tr role="row" class="text-center">
                                <th>Giá từ</th>
                                <th>Giá đến</th>

                                <th>Giá từ</th>
                                <th>Giá đến</th>
                            </tr>
                            </thead>
                            <tbody id="ttts">
                            @if(isset($modelcbct))
                                @foreach($modelcbct as $key=>$tt)
                                    <tr>
                                        <td style="text-align: center">{{$key +1}}</td>
                                        <td>{{$tt->mahh}}</td>
                                        <td class="active">{{$tt->tenhh}}</td>
                                        <td style="text-align: center">{{$tt->dvt}}</td>
                                        <td style="text-align: right">{{number_format($tt->giatulk)}}</td>
                                        <td style="text-align: right">{{number_format($tt->giadenlk)}}</td>
                                        <td style="text-align: right">{{number_format($tt->giatu)}}</td>
                                        <td style="text-align: right">{{number_format($tt->giaden)}}</td>
                                        <td>{{$tt->nguontin}}</td>
                                        <td>{{$tt->gc}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                            @endif
                            </tbody>
                        </table>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 1</label>
                                        @if(isset($model->filedk))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk)}}" target="_blank">{{$model->filedk}}</a></p>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 2</label>
                                        @if(isset($model->filedk1))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk1)}}" target="_blank">{{$model->filedk1}}</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 3</label>
                                        @if(isset($model->filedk2))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk2)}}" target="_blank">{{$model->filedk2}}</a></p>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 4</label>
                                        @if(isset($model->filedk3))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk3)}}" target="_blank">{{$model->filedk3}}</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 5</label>
                                        @if(isset($model->filedk4))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk4)}}" target="_blank">{{$model->filedk4}}</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <a href="{{url('/hanghoatw/index?thoidiem='.$model->mathoidiem.'&nam='.date('Y').'&pb=all')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
    </div>
@stop 