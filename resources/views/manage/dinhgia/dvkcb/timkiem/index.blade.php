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
                var url = 'timkiemdichvukcb?' + nam ;
                window.location.href = url;
            });
            $('#manhom').change(function() {
                var nam = '&nam=' + $('#nam').val();
                var manhom = '&manhom='+ $('#manhom').val();
                var url = 'timkiemdichvukcb?' + nam + manhom;
                window.location.href = url;
            });
            $('#tendichvu').change(function() {
                var nam = '&nam=' + $('#nam').val();
                var manhom = '&manhom='+ $('#manhom').val();
                var tendichvu = '&tendichvu=' + $('#tendichvu').val();
                var url = 'timkiemdichvukcb?' + nam  + manhom + tendichvu;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin <small>&nbsp;thuế tài nguyên</small>
    </h3>
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
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Nhóm dịch vụ</label>
                            <select name="manhom" id="manhom" class="form-control">
                                <option value="">--Chọn nhóm dịch vụ--</option>
                                @foreach($modelnhomtn as $nhomtn)
                                    <option value="{{$nhomtn->manhom}}" {{$nhomtn->manhom == $manhom ? 'selected' : ''}}>{{$nhomtn->tennhom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tên dịch vụ</label>
                            <div class="form-group">
                                {!! Form::text('tendichvu',$tendichvu, array('id'=>'tendichvu','class'=>'form-control'))!!}
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
                            <th style="text-align: center">Đơn vị</th>
                            <th style="text-align: center" >Số quyết định</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Cấp độ</th>
                            <th style="text-align: center">Mã dịch vụ</th>
                            <th style="text-align: center">Tên dịch vụ</th>
                            <th style="text-align: center">Đơn vị tính</th>
                            <th style="text-align: center" width="10%">Giá dịch vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{$tt->tendv}}</td>
                                <td class="success">{{$tt->soqd}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                <td style="text-align: center">{{$tt->capdo}}</td>
                                <td style="text-align: center">{{$tt->madv}}</td>
                                <td class="active" style="font-weight: bold">{{$tt->tendichvu}}</td>
                                <td style="text-align: center">{{$tt->dvt}}</td>
                                <td style="text-align: right;font-weight: bold">{{$tt->dvt!= '' ? number_format($tt->giadv) : ''}}</td>
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