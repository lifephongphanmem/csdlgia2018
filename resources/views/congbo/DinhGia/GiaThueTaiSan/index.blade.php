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
                var namhs = '&nam=' + $('#nam').val();
                var maxa = '&maxa=' + $('#maxa').val();
                var url = '/cbgiathuetaisan?'+namhs + maxa;
                window.location.href = url;
            });
            $('#maxa').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var maxa = '&maxa=' + $('#maxa').val();
                var url = '/cbgiathuetaisan?'+namhs + maxa;
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
                        <span class="caption-subject theme-font bold uppercase">Giá thuê tài sản công</span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Năm hồ sơ</label>
                                <select name="nam" id="nam" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Đơn vị</label>
                                    <select name="maxa" id="maxa" class="form-control">
                                        @foreach($modeldv as $dv)
                                            <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa'] ? 'selected' : ''}}>{{$dv->tendv}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>

                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="2%" style="text-align: center">STT</th>
                        <th style="text-align: center">Thông tin hồ sơ</th>
                        <th style="text-align: center">Tên tài sản</th>
                        <th style="text-align: center">Số lượng/Diện tích</th>
                        <th style="text-align: center">Đơn vị tính</th>
                        <th style="text-align: center">Đơn giá thuê</th>
                        <th style="text-align: center">Đơn vị thuê</th>
                        <th style="text-align: center">Hợp đồng số</th>
                        <th style="text-align: center">Thời hạn</th>
                        <th style="text-align: center">Thành tiền</th>
                        <th style="text-align: center">Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($model) != 0)
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: left">{{$tt->thongtinhs}}</td>
                                <td style="text-align: left">{{$tt->tents}}</td>
                                <td style="text-align: left">{{dinhdangso($tt->soluong)}}</td>
                                <td style="text-align: left">{{$tt->dvt}}</td>
                                <td style="text-align: left">{{dinhdangso($tt->dongiathue)}}</td>
                                <td style="text-align: left">{{$tt->dvthue}}</td>
                                <td style="text-align: left">{{$tt->hdthue}}</td>
                                <td style="text-align: left">{{$tt->ththue}}</td>
                                <td style="text-align: left">{{dinhdangso($tt->sotienthuenam)}}</td>
                                <td style="text-align: left">{{$tt->ghichu}}</td>
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
