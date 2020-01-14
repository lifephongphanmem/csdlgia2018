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
            $('#nam,#phanloai,#tendn,#tenhh,#paginate').change(function() {
                var current_path_url = '/cbgiakkmhbog?';
                var nam = '&nam='+$('#nam').val();
                var phanloai = '&phanloai='+$('#phanloai').val();
                var tenhh = '&tenhh=' + $('#tenhh').val();
                var tendn = '&tendn=' + $('#tendn').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+phanloai+tendn+tenhh+paginate;
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
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet light" style="min-height: 587px">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs font-green-sharp"></i>
                                        <span class="caption-subject theme-font bold uppercase">Mức giá kê khai Mặt hàng trong danh mục bình ổn giá</span>
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select name="nam" id="nam" class="form-control">
                                                <option value="all">--Tất cả các năm--</option>
                                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Mặt hàng</label>
                                            <select name="phanloai" id="phanloai" class="form-control">
                                                <option value="all">--Tất cả mặt hàng--</option>
                                                @foreach($dmnghe as $nghe)
                                                    <option value="{{$nghe->manghe}}" {{$nghe->manghe == $inputs['phanloai'] ? 'selected' : ''}}>{{$nghe->tennghe}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Tên doanh nghiệp</label>
                                            <input type="text" class="form-control" id="tendn" name="tendn" value="{{$inputs['tendn']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Tên hàng hóa, dịch vụ</label>
                                            <input type="text" class="form-control" id="tenhh" name="tenhh" value="{{$inputs['tenhh']}}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            Hiển thị&nbsp;
                                            <div class="select2-container form-control input-xsmall input-inline" >
                                                <select class="form-control" name="paginate" id="paginate" >
                                                    <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                                    <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                                    <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                                    <option value="100" {{$inputs['paginate'] == 100? 'selected' : ''}}>100</option>
                                                </select>
                                            </div>
                                            &nbsp;thông tin
                                        </label>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center" width="20%">Doanh nghiệp</th>
                                                <th style="text-align: center" width="8%">Ngày thực hiện<br>mức giá</th>
                                                <th style="text-align: center" >Tên hàng hóa, dịch vụ</th>
                                                <th style="text-align: center" >Quy cách chất lượng</th>
                                                <th style="text-align: center" >Đơn vị <br>tính</th>
                                                <th style="text-align: center" >Mức giá<br> kê khai</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @if(count($model) != 0)
                                                @foreach($model as $key=>$tt)
                                                    <tr>
                                                        <td class="active"><b>Tên DN: </b> {{$tt->tendn}}
                                                            <br><b>Mã số thuế:</b> {{$tt->maxa}}</td>
                                                        <td style="text-align: center">{{getDayVn($tt->ngayhieuluc)}}</td>
                                                        <td style="text-align: left">{{$tt->tenhh}}</td>
                                                        <td style="text-align: left">{{$tt->quycach}}</td>
                                                        <td style="text-align: center">{{$tt->dvt}}</td>
                                                        <td style="text-align: right;font-weight: bold">{{number_format($tt->giakk)}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td style="text-align: center" colspan="6">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        @if(count($model) != 0)
                                            <div class="col-md-5 col-sm-12">
                                                <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">
                                                    Hiển thị 1 đến {{$model->count()}} trên {{$model->total()}} thông tin
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="dataTables_paginate paging_simple_numbers" id="sample_3_paginate">
                                                    {{$model->appends(['nam' => $inputs['nam'],
                                                                   'tenhh'=>$inputs['tenhh'],
                                                                   'tendn'=>$inputs['tendn'],
                                                                   'paginate'=>$inputs['paginate'],
                                                ])->links()}}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                    <!--/div-->
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop


