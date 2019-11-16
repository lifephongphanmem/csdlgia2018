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
            $('#nam').change(function() {
                var nam = '&nam=' + $('#nam').val();
                var url = 'tkgiatrhitruong?' + nam ;
                window.location.href = url;
            });
            $('#matt').change(function() {
                var nam = '&nam=' + $('#nam').val();
                var matt = '&matt='+ $('#matt').val();
                var url = 'tkgiatrhitruong?' + nam + matt;
                window.location.href = url;
            });
            $('#tenhhdv').change(function() {
                var nam = '&nam=' + $('#nam').val();
                var matt = '&matt='+ $('#matt').val();
                var tenhhdv = '&tenhhdv=' + $('#tenhhdv').val();
                var url = 'tkgiatrhitruong?' + nam + matt + tenhhdv;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin <small>&nbsp;giá hàng hóa dịch vụ thị trường</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Năm</label>
                            <select name="nam" id="nam" class="form-control">
                                <option value="all">--Tất cả các năm--</option>
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Thông tư</label>
                            <select name="matt" id="matt" class="form-control">
                                <option value="all">--Chọn thông tư--</option>
                                @foreach($modeltt as $tt)
                                    <option value="{{$tt->matt}}" {{$tt->matt == $inputs['matt'] ? 'selected' : ''}}>{{$tt->ttqd}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tên hàng hóa dịch vụ</label>
                            <div class="form-group">
                                {!! Form::text('tenhh',$inputs['tenhh'], array('id'=>'tenhh','class'=>'form-control'))!!}
                            </div>
                        </div>

                    </div>
                    <div class="table-toolbar">
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <!--th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th-->
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Đơn vị báo cáo</th>
                            <th style="text-align: center" >Số báo cáo</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Tên nhóm</th>
                            <th style="text-align: center">Mã<br> hàng hóa</th>
                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                            <th style="text-align: center">Đặc điểm kỹ thuật</th>
                            <th style="text-align: center">Đơn <br>vị<br> tính</th>
                            <th style="text-align: center">Loại giá</th>
                            <th style="text-align: center">Giá</th>
                            <th style="text-align: center">Nguồn thông tin</th>
                            <th style="text-align: center">Ghi chú</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{$tt->tendv}}</td>
                                <td class="success">{{$tt->sobc}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaybc)}}</td>
                                <td style="text-align: left">{{$tt->tennhom}}</td>
                                <td style="text-align: center">{{$tt->mahh}}</td>
                                <td class="active" style="font-weight: bold">{{$tt->tenhh}}</td>
                                <td style="text-align: left">{{$tt->dacdiemkt}}</td>
                                <td style="text-align: center">{{$tt->dvt}}</td>
                                <td style="text-align: center">{{$tt->loaigia}}</td>
                                <td style="text-align: right;font-weight: bold">{{number_format($tt->dongia)}}</td>
                                <td>{{$tt->nguontt}}</td>
                                <td>{{$tt->ghichu}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
@stop