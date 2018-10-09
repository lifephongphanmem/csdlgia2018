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
@stop

@section('content-cb')
    <div class="container">
        <div class="row margin-top-10">
            <div class=" col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font hide"></i>
                            <span class="caption-subject theme-font bold uppercase">báo cáo giá hàng hóa do tw quy định</span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="nambc" id="nambc" class="form-control">
                                        @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                        @if ($nam_stop = intval(date('Y'))) @endif
                                        @for($i = $nam_start; $i <= $nam_stop; $i++)
                                            <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2me" id="ttpb" name="ttpb">
                                        <option value="all">--Tất cả phòng ban--</option>
                                        @foreach($modelpb as $ttpb)
                                            <option value="{{$ttpb->mahuyen}}" {{($inputs['pb'] == $ttpb->mahuyen) ? 'selected' : ''}}>{{$ttpb->tendv}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="30%">Tên đơn vị</th>
                                <th style="text-align: center" >Ngày nhập</th>
                                <th style="text-align: center">Thị trường</th>
                                <th style="text-align: center" width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td align="center">{{$key+1}}</td>
                                    <td class="active">{{$tt->tenpb}}</td>
                                    <td>{{getDayVn($tt->tgnhap)}}</td>
                                    <td>{{$tt->thitruong}}</td>
                                    <td>
                                        <a href="{{url('hanghoatw/detail?mahs='.$tt->mahs)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem thông tin </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
@stop 