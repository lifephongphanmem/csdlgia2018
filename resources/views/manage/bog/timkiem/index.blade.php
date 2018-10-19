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
                var url = 'timkiemthongtinbog?' + nam ;
                window.location.href = url;
            });
            $('#mamh').change(function() {
                var tenhh = '&tenhh=' + $('#tenhh').val();
                var nam = '&nam=' + $('#nam').val();
                var mamh = '&mamh=' + $('#mamh').val();
                var url = 'timkiemthongtinbog?' + nam + tenhh + mamh;
                window.location.href = url;
            });
            $('#tenhh').change(function() {
                var tenhh = '&tenhh=' + $('#tenhh').val();
                var nam = '&nam=' + $('#nam').val();
                var mamh = '&mamh=' + $('#mamh').val();
                var url = 'timkiemthongtinbog?' + nam + tenhh + mamh;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin <small>&nbsp;mặt hàng BOG</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row" >
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-body">
                    <div class="row">
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
                        <div class="col-md-5">
                            <label>Mặt hàng</label>
                            <select name="mamh" id="mamh" class="form-control">
                                <option value="">--Chọn mặt hàng BOG--</option>
                                @foreach($m_mhbog as $binhongia)
                                    <option value="{{$binhongia->mamh}}" {{$binhongia->mamh == $inputs['mamh'] ? 'selected' : ''}}>{{$binhongia->hienthi != '' ? $binhongia->hienthi : $binhongia->tenmh}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tên mặt hàng BOG</label>
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
                            <th style="text-align: center">Nhóm mặt hàng BOG</th>
                            <th style="text-align: center">Tên mặt hàng BOG</th>
                            <th style="text-align: center" >Giá tối thiểu</th>
                            <th style="text-align: center">Giá tối đa</th>
                            <th style="text-align: center">Thời hạn áp dụng</th>
                            <th style="text-align: center">Giờ áp dụng</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Số quyết định</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->tenmh}}</td>
                                <td class="success">{{$tt->tenhh}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{number_format($tt->giatoithieu)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{number_format($tt->giatoida)}}</td>
                                <td style="text-align: center; font-weight: bold;">{{$tt->thapdung}} tháng</td>
                                <td style="text-align: center; font-weight: bold;">{{$tt->gioapdung}}</td>
                                <td style="text-align: center; font-weight: bold;">{{getDayVn($tt->ngayapdung)}}</td>
                                <td style="text-align: center; font-weight: bold;">{{$tt->soqd}}</td>
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