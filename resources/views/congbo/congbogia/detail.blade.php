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

                            <div class="portlet-body">
                                <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Số hồ sơ thẩm định</label>
                                            <input type="text" class="form-control" value="{{$model->hosotdgia}}" readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-error">
                                            <label class="control-label">Thời điểm thẩm định</label>
                                            <input type="date" class="form-control" value="{{$model->thoidiem}}" readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Địa điểm thẩm định</label>
                                            <input type="text" id="diadiem" name="diadiem" class="form-control" readonly value="{{$model->diadiem}}">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-error">
                                            <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                            <input type="text" id="ppthamdinh" name="ppthamdinh" class="form-control" value="{{$model->ppthamdinh}}" readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mục đích thẩm định</label>
                                            <input type="text" id="mucdich" name="mucdich" class="form-control" value="{{$model->mucdich}}" readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-error">
                                            <label class="control-label">Đơn vị yêu cầu thẩm định</label>
                                            <input type="text" id="dvyeucau" name="dvyeucau" class="form-control" value="Nội dung thông tin bị ẩn" readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                            <select class="form-control" name="nguonvon" id="nguonvon">
                                                <option value="Cả hai" {{$model->nguonvon=='Cả hai'?'selected':''}}>Cả hai (Nguồn vốn thường xuyên và Nguồn vốn đầu tư)</option>
                                                <option value="Thường xuyên" {{$model->nguonvon=='Thường xuyên'?'selected':''}}>Nguồn vốn thường xuyên</option>
                                                <option value="Đầu tư" {{$model->nguonvon=='Cả hai'?'selected':''}}>Nguồn vốn đầu tư</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Thuế VAT</label>
                                            <select class="form-control" name="thuevat" id="thuevat">
                                                <option value="Giá bao gồm thuế VAT" {{$model->thuevat=='Giá bao gồm thuế VAT'?'selected':''}}>Giá bao gồm thuế VAT</option>
                                                <option value="Giá chưa bao gồm thuế VAT" {{$model->thuevat=='Giá chưa bao gồm thuế VAT'?'selected':''}}>Giá chưa bao gồm thuế VAT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-error">
                                            <label class="control-label">Số thông báo kết luận</label>
                                            <input type="text" id="sotbkl" name="sotbkl" class="form-control" value="{{$model->sotbkl}}" readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                            <input type="date" id="thoihan" name="thoihan" class="form-control" value="{{$model->thoihan}}" readonly>
                                        </div>
                                    </div>

                                </div>

                                <!--/row-->
                                <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                                @if($model->phanloai == 'CHITIET')
                                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>
                                        <tr>
                                            <th width="2%" style="text-align: center">STT</th>
                                            <th style="text-align: center">Tên tài sản</th>
                                            <th style="text-align: center">Đơn vị tính</th>
                                            <th style="text-align: center">Số lượng</th>
                                            <th style="text-align: center">Đơn giá đề nghị</th>
                                            <th style="text-align: center">Giá trị đề nghị</th>
                                            <th style="text-align: center">Đơn giá thẩm định</th>
                                            <th style="text-align: center">Giá trị thẩm định</th>
                                            <th style="text-align: center">Ghi chú</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($modelcbct as $key=>$tt)
                                            <tr>
                                                <td style="text-align: center">{{$key +1}}</td>
                                                <td class="active">{{$tt->tents}}</td>
                                                <td style="text-align: center">{{$tt->dvt}}</td>
                                                <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                                <td style="text-align: right">{{number_format($tt->nguyengiadenghi)}}</td>
                                                <td style="text-align: right">{{number_format($tt->giadenghi)}}</td>
                                                <td style="text-align: right">{{number_format($tt->nguyengiathamdinh)}}</td>
                                                <td style="text-align: right">{{number_format($tt->giatritstd)}}</td>
                                                <td>{{$tt->ghichu}}</td>
                                            </tr>
                                        @endforeach
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
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <a href="{{url('/congbg?nam='.date('Y').'&pb=all')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
    </div>
@stop 