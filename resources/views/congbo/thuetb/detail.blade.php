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
                        <div class="portlet-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin bảng giá</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số quyết định</label>
                                        <input type="text" class="form-control" value="{{$model->soqd}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Ngày nhập</label>
                                        <input type="date" class="form-control" value="{{$model->ngaynhap}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại xe</label>
                                        <select class="form-control" id="maloai" name="maloai" readonly>
                                            @foreach($loais as $loai)
                                                <option value="{{$loai->maloai}}" {{$loai->maloai == $model->maloai ? 'selected': ''}}>{{$loai->tenloai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết</h4>
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                <tr>
                                    <th width="2%" style="text-align: center">STT</th>
                                    <th style="text-align: center">Tên hiệu</th>
                                    <th style="text-align: center">Thông số kỹ thuật</th>
                                    <th style="text-align: center">Dung tích</th>
                                    <th style="text-align: center">Nước sản xuất</th>
                                    <th style="text-align: center">Giá tối thiểu <br>tính lệ phí trước bạ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelcbct as $key=>$tt)
                                    <tr>
                                        <td style="text-align: center">{{$key +1}}</td>
                                        <td class="active">{{$tt->tenhieu}}</td>
                                        <td style="text-align: center">{{$tt->thongsokt}}</td>
                                        <td style="text-align: center">{{$tt->dungtich}}</td>
                                        <td style="text-align: center">{{$tt->nuocsx}}</td>
                                        <td style="text-align: right">{{number_format($tt->giamoi != '' ? $tt->giamoi : 0)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <a href="{{url('/thuetb?nam='.date('Y').'&pb=all')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
    </div>
@stop 