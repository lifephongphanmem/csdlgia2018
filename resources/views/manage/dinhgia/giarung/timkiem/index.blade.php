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
            $('#district').change(function() {
                var district = '&district=' + $('#district').val();
                var url = 'timkiemgiarung?' + district ;
                window.location.href = url;
            });
            $('#nam').change(function() {
                var nam = '&nam=' + $('#nam').val();
                var district = '&district=' + $('#district').val();
                var url = 'timkiemgiarung?' + district + nam ;
                window.location.href = url;
            });
            $('#loairung').change(function() {
                var district = '&district=' + $('#district').val();
                var loairung = '&loairung=' + $('#loairung').val();
                var nam = '&nam=' + $('#nam').val();
                var url = 'timkiemgiarung?' + district + nam + loairung;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin <small>&nbsp;lệ phí trước bạ</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Năm</label>
                            <select name="district" id="district" class="form-control">
                                <option value="">--Chọn địa bàn--</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->district}}" {{$district->district == $inputs['district'] ? 'selected' : ''}}>{{$district->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Năm</label>
                            <select name="nam" id="nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Loại rừng</label>
                            <div class="form-group">
                                {!! Form::text('loairung',$inputs['loairung'], array('id'=>'loairung','class'=>'form-control'))!!}
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
                            <th>Địa bàn</th>
                            <th style="text-align: center" >Số QĐ</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Nhóm rừng</th>
                            <th style="text-align: center">Loại rừng</th>
                            <th style="text-align: center" width="10%">Mức độ</th>
                            <th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>
                            <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>
                            <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>
                            <th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{$tt->diaban}}</td>
                                <td>{{$tt->soqd}}</td>
                                <td>{{getDayVn($tt->ngayapdung)}}</td>
                                <td>{{$tt->tennhom}}</td>
                                <td class="active">{{$tt->loairung}}</td>
                                <td>{{$tt->mucdo}}</td>
                                <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiasd)}}</td>
                                <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiat50)}}</td>
                                <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiat1)}}</td>
                                <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiaxp)}}</td>
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