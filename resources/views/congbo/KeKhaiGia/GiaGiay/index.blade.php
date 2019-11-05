
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
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });

        $(function(){
            $('#nam').change(function() {
                var namhs = $('#nam').val();
                var url = '/cbgiagiay?'+namhs;
                window.location.href = url;
            });
            $('#tthhdv').change(function() {
                var namhs = '&nam='+ $('#nam').val();
                var tthhdv = '&tthhdv=' + $('#tthhdv').val();
                var url = '/cbgiagiay?'+namhs + tthhdv;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content-cb')
    <div class="container">
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <!--div class="portlet light"-->
                <div class="portlet-title">
                    <div class="row">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước</span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Năm hồ sơ</label>
                                <select name="nam" id="nam" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Tên hàng hóa dịch vụ</label>
                                <input type="text" class="form-control" id="tthhdv" name="tthhdv" value="{{$inputs['tthhdv']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                Hiển thị
                                <div class="select2-container form-control input-xsmall input-inline" >
                                    <select class="form-control" name="paginate" id="paginate" >
                                        <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                        <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                        <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                        <option value="100" {{$inputs['paginate'] == 100? 'selected' : ''}}>100</option>
                                    </select>
                                </div>
                                thông tin
                            </label>
                        </div>
                    </div></br>
                </div>

            <table class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th style="text-align: center ; margin: auto" width="2%">STT</th>
                    <th style="text-align: center" width="20%">Doanh nghiệp</th>
                    <th style="text-align: center" width="8%">Ngày thực hiện<br>mức giá</th>
                    <th style="text-align: center" >Tên hàng hóa, dịch vụ</th>
                    <th style="text-align: center" >Quy cách chất lượng</th>
                    <th style="text-align: center" >Đơn vị tính</th>
                    <th style="text-align: center" >Mức giá kê khai</th>
                </tr>
                </thead>
                <tbody>
                @if(count($model) != 0)
                    @foreach($model as $key=>$tt)
                        <tr>
                            <td style="text-align: center">{{$key+1}}</td>
                            <td class="active"><b>Tên DN: </b> {{$tt->tendn}}
                                <br><b>Mã số thuế:</b> {{$tt->maxa}}</td>
                            <td style="text-align: center">{{getDayVn($tt->ngayhieuluc)}}</td>
                            <td style="text-align: left">{{$tt->tthhdv}}</td>
                            <td style="text-align: left">{{$tt->qccl}}</td>
                            <td style="text-align: left">{{$tt->dvt}}</td>
                            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongia)}}</td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td style="text-align: center" colspan="10">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                    </tr>
                @endif
                </tbody>
            </table>
                <div class="row">
                    @if(count($model) != 0)
                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">
                                Hiển thị 1 đến {{$model->count()}} trên {{count($model)}} thông tin
                            </div>
                        </div>
                    @endif
                </div>
            <!--/div-->
            <!-- END PORTLET-->
        </div>
    </div>
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop
