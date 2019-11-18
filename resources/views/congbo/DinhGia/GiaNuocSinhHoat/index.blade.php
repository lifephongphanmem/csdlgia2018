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
            $('#paginate').change(function() {
                var current_path_url = '/cbgianuocsachsinhhoat?';
                var nam = '&nam='+$('#nam').val();
                var diaban = '&diaban='+$('#diaban').val();
                var doituong = '&doituong='+$('#doituong').val();
                var mota = '&mota='+$('#mota').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+diaban+doituong+mota+paginate;
                window.location.href = url;
            });
        });


        $(function(){
            $('#nam').change(function() {
                var nam = '&nam='+$('#nam').val();
                var url = '/cbgianuocsachsinhhoat?'+nam;
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
                        <span class="caption-subject theme-font bold uppercase">Giá nước sinh hoạt</span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select class="form-control" name="nam" id="nam">
                                                <option value="all">--Tất cả các năm--</option>
                                                @if ($nam_start = 2015 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
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
                        <th style="text-align: center" width="2%">STT</th>
                        <th style="text-align: center" width="10%">Số Quyết định</th>
                        <th style="text-align: center">Ngày áp dụng</th>
                        <th style="text-align: center">Mô tả</th>
                        <th style="text-align: center">Đối tượng áp dụng</th>
                        <th style="text-align: center">Đơn giá</th>
                        <th style="text-align: center" >Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($model) != 0)
                        @foreach($model as $key => $tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="text-align: center">{{$tt->soqd}}</td>
                                <td style="text-align: center;"><b>{{getDayVn($tt->ngayapdung)}}</b></td>
                                <td style="text-align: center">{{$tt->mota}}</td>
                                <td style="text-align: left">{{$tt->doituongsd}}</td>
                                <td style="text-align: right">{{dinhdangso($tt->giachuathue)}}</td>
                                <td style="text-align: center">{{$tt->ghichu}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align: center" colspan="8">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
