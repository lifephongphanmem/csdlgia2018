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
                var url = '/giathuematdatmatnuoc?'+namhs;
                window.location.href = url;
            });
            $('#trangthai').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var trangthai = '&trangthai=' + $('#trangthai').val();
                var url = '/giathuematdatmatnuoc?'+namhs + trangthai;
                window.location.href = url;
            });

            $('#diaban').change(function() {
                var nam = '&nam='+ $('#nam').val();
                var trangthai = '&trangthai=' + $('#trangthai').val();
                var diaban = '&diaban='+ $('#diaban').val();
                var url = '/giathuematdatmatnuoc?' + nam +trangthai + diaban;

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
                        <span class="caption-subject theme-font bold uppercase">Giá thuê đất, nước</span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select name="nam" id="nam" class="form-control">
                                                <option value="all">--Tất cả các năm--</option>
                                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Địa bàn quản lý</label>
                                            <select name="diaban" id="diaban" class="form-control">
                                                @foreach($modeldb as $db)
                                                    <option value="{{$db->district}}" {{$db->district == $inputs['diaban'] ? 'selected' : ''}}>{{$db->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button type="reset" class="btn btn-circle" onclick="resettt()"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                            <button type="submit" class="btn btn-circle green" onclick="searchtt()"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </div>
                    </div>

                </div>

                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th width="2%" style="text-align: center">STT</th>
                        <th style="text-align: center">Số quyết định</th>
                        <th style="text-align: center">Vị trí</th>
                        <th style="text-align: center">Ngày áp dụng</th>
                        <th style="text-align: center">Diện tích</th>
                        <th style="text-align: center">Đơn giá</th>
                        <th style="text-align: center">Ghi chú</th>
                    </tr>
                    </thead>
                    @if(count($model) != 0)
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: center">{{$tt->soqd}}</td>
                                <td style="text-align: left">{{$tt->vitri}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                <td style="text-align: right">{{dinhdangso($tt->dientich)}}</td>
                                <td style="text-align: right">{{dinhdangso($tt->dongia)}}</td>
                                <td>{{$tt->ghichu}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align: center" colspan="10">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                        </tr>
                    @endif
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
