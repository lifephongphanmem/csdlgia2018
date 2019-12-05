@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/-->
    <!-- BEGIN THEME STYLES -->
    <!--link href="{{url('assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{url('assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/-->
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!--script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script-->
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        $(function(){
            $('#thang').change(function() {
                var thang = '&thang=' + $('#thang').val();
                var nam = '&nam=' + $('#nam').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = 'timkiemgiahhdvkhac?' +thang + nam  + paginate;

                window.location.href = url;
            });
            $('#nam').change(function() {
                var thang = '&thang=' + $('#thang').val();
                var nam = '&nam=' + $('#nam').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = 'timkiemgiahhdvkhac?'+ thang + nam  + paginate;

                window.location.href = url;
            });
            $('#district').change(function() {
                var district = '&district=' + $('#district').val();
                var thang = '&thang=' + $('#thang').val();
                var nam = '&nam=' + $('#nam').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = 'timkiemgiahhdvkhac?' +thang +  nam + district + paginate;
                window.location.href = url;
            });
            $('#matt').change(function() {
                var thang = '&thang=' + $('#thang').val();
                var district = '&district=' + $('#district').val();
                var nam = '&nam=' + $('#nam').val();
                var matt = '&matt='+ $('#matt').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = 'timkiemgiahhdvkhac?' +thang + nam + district + matt + paginate;
                window.location.href = url;
            });
            $('#tenhhdv').change(function() {
                var district = '&district=' + $('#district').val();
                var thang = '&thang=' + $('#thang').val();
                var nam = '&nam=' + $('#nam').val();
                var matt = '&matt='+ $('#matt').val();
                var tenhhdv = '&tenhhdv=' + $('#tenhhdv').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = 'timkiemgiahhdvkhac?' + thang + nam + district + matt + tenhhdv + paginate;
                window.location.href = url;
            });
            $('#paginate').change(function() {
                var district = '&district=' + $('#district').val();
                var nam = '&nam=' + $('#nam').val();
                var thang = '&thang=' + $('#thang').val();
                var matt = '&matt='+ $('#matt').val();
                var tenhhdv = '&tenhhdv=' + $('#tenhhdv').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = 'timkiemgiahhdvkhac?' + thang + nam + district + matt + tenhhdv + paginate;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin <small>&nbsp;giá hàng hóa dịch vụ khác</small>
    </h3>
    <!-- END PAGE HEADER-->
    <hr>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Tháng</label>
                            <select name="thang" id="thang" class="form-control">
                                <option value="all">--Tất cả các tháng--</option>
                                <option value="01" {{$inputs['thang'] == '01' ? 'selected' : ''}}>Tháng 01</option>
                                <option value="02" {{$inputs['thang'] == '02' ? 'selected' : ''}}>Tháng 02</option>
                                <option value="03" {{$inputs['thang'] == '03' ? 'selected' : ''}}>Tháng 03</option>
                                <option value="04" {{$inputs['thang'] == '04' ? 'selected' : ''}}>Tháng 04</option>
                                <option value="05" {{$inputs['thang'] == '05' ? 'selected' : ''}}>Tháng 05</option>
                                <option value="06" {{$inputs['thang'] == '06' ? 'selected' : ''}}>Tháng 06</option>
                                <option value="07" {{$inputs['thang'] == '07' ? 'selected' : ''}}>Tháng 07</option>
                                <option value="08" {{$inputs['thang'] == '08' ? 'selected' : ''}}>Tháng 08</option>
                                <option value="09" {{$inputs['thang'] == '09' ? 'selected' : ''}}>Tháng 09</option>
                                <option value="10" {{$inputs['thang'] == '10' ? 'selected' : ''}}>Tháng 10</option>
                                <option value="11" {{$inputs['thang'] == '11' ? 'selected' : ''}}>Tháng 11</option>
                                <option value="12" {{$inputs['thang'] == '12' ? 'selected' : ''}}>Tháng 12</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Năm</label>
                            <select name="nam" id="nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Địa bàn quản lý</label>
                            <select name="district" id="district" class="form-control">
                                <option value="">--Chọn địa bàn--</option>
                                @foreach($modeldb as $db)
                                    <option value="{{$db->district}}" {{$db->district == $inputs['district'] ? 'selected' : ''}}>{{$db->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Thông tư quyết định</label>
                            <select name="matt" id="matt" class="form-control">
                                <option value="">--Chọn thông tư quyết định--</option>
                                @foreach($modelnhomtn as $nhomtn)
                                    <option value="{{$nhomtn->matt}}" {{$nhomtn->matt == $inputs['matt'] ? 'selected' : ''}}>{{$nhomtn->tentt}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Tên hàng hóa dịch vụ</label>

                                {!! Form::text('tenhhdv',$inputs['tenhhdv'], array('id'=>'tenhhdv','class'=>'form-control'))!!}
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                Hiển thị
                                <div class="select2-container form-control input-xsmall input-inline" >
                                    <select class="form-control" name="paginate" id="paginate" >
                                        <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                        <option value="10" {{$inputs['paginate'] == 10 ? 'selected' : ''}}>10</option>
                                        <option value="15" {{$inputs['paginate'] == 15 ? 'selected' : ''}}>15</option>
                                        <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                        <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                    </select>
                                </div>
                                thông tin
                            </label>
                        </div>
                    </div></br>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <!--th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th-->
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Địa bàn</th>
                            <th style="text-align: center">Tháng/ Năm</th>
                            <th style="text-align: center" >Số báo cáo</th>
                            <th style="text-align: center">Ngày báo cáo</th>
                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                            <th style="text-align: center">Đặc điểm kỹ thuật</th>
                            <th style="text-align: center">Đơn vị tính</th>
                            <th style="text-align: center" width="10%">Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($model->count() != 0)
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td style="text-align: center">{{$key + 1}}</td>
                                    <td>{{$tt->diaban}}</td>
                                    <td style="text-align: center">{{$tt->thang}}/{{$tt->nam}}</td>
                                    <td class="success">{{$tt->soqd}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                    <td class="active" style="font-weight: bold">{{$tt->tenhhdv}}</td>
                                    <td style="text-align: left">{{$tt->dacdiemkt}}</td>
                                    <td style="text-align: center">{{$tt->dvt}}</td>
                                    <td style="text-align: right;font-weight: bold">{{number_format($tt->gia)}}</td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td style="text-align: center" colspan="9">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
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
                                                   'thang'=>$inputs['thang'],
                                                   'district'=>$inputs['district'],
                                                   'matt'=>$inputs['matt'],
                                                   'tenhhdv'=>$inputs['tenhhdv'],
                                                   'paginate'=>$inputs['paginate'],
                                ])->links()}}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END EXAMPLE TABLE PORTLET-->

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>

@stop