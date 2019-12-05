@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>

    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        $(function(){
            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var manhom = '&manhom=' + $('#manhom').val();
                var phanloai = '&phanloai=' + $('#phanloai').val();
                var url = '/tonghopgiahhdvk?'+namhs + manhom + phanloai;
                window.location.href = url;
            });
            $('#manhom').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var manhom = '&manhom=' + $('#manhom').val();
                var phanloai = '&phanloai=' + $('#phanloai').val();
                var url = '/tonghopgiahhdvk?'+namhs + manhom + phanloai;
                window.location.href = url;
            });
            $('#phanloai').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var manhom = '&manhom=' + $('#manhom').val();
                var phanloai = '&phanloai=' + $('#phanloai').val();
                var url = '/tonghopgiahhdvk?'+namhs + manhom + phanloai;
                window.location.href = url;
            });


        });
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
        function confirmHoanthanh(id) {
            document.getElementById("idhoanthanh").value=id;
        }
        function confirmHHT(id){
            document.getElementById("idhuyhoanthanh").value=id;
        }
        function confirmCB(id){
            document.getElementById("idcongbo").value=id;
        }
        function clickcreate(){
            $('#frm_create').submit();
        }
        function clickcreatethang(){
            $('#frm_createthang').submit();
        }
    </script>
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tổng hợp <small>&nbsp;giá hàng hóa dịch vụ khác</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        @if($inputs['phanloai'] == 'thang')
                            <button type="button" class="btn btn-default btn-sm" data-target="#createthang-modal-confirm" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Tổng hợp tháng</button>
                        @else
                            <button type="button" class="btn btn-default btn-sm" data-target="#create-modal-confirm" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Tổng hợp</button>
                        @endif
                            <!--div class="btn-group">
                                <a class="btn btn-default btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="">File dữ liệu mẫu</a>
                                    </li>
                                    <li>
                                        <a href="">Nhận dữ liệu</a>
                                    </li>
                                </ul>
                            </div-->
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
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
                        <!--div class="col-md-3">
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select name="phanloai" id="phanloai" class="form-control">
                                    <option value="15ngaydau" {{$inputs['phanloai'] == '15ngaydau' ? 'selected' : ''}}>15 ngày đầu tháng</option>
                                    <option value="15ngaycuoi" {{$inputs['phanloai'] == '15ngaycuoi' ? 'selected' : ''}}>15 ngày cuối tháng</option>
                                    <option value="thang" {{$inputs['phanloai'] == 'thang' ? 'selected' : ''}}>Tháng</option>
                                </select>
                            </div>
                        </div-->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nhóm hàng hóa</label>
                                <select name="manhom" id="manhom" class="form-control">
                                    @foreach($m_nhom as $nhom)
                                    <option value="{{$nhom->matt}}" {{$inputs['matt'] == $nhom->matt ? 'selected' : ''}}>{{$nhom->tentt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center" width="20%">Theo thông tư quyết định</th>
                            <th style="text-align: center" width="10%">Thời điểm báo cáo</th>
                            {{--<th style="text-align: center">Thông tin báo cáo</th>--}}
                            <th style="text-align: center" width="10%">Ngày báo cáo</th>
                            <th style="text-align: center" width="10%">Số báo cáo</th>
                            <th style="text-align: center" width="10%">Trạng thái</th>
                            <th style="text-align: center" >Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$ct)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="font-weight: bold">{{$ct->tentt}}</td>
                                <td style="font-weight: bold">Tháng {{$ct->thang}} /Năm {{$ct->nam}}</td>
                                {{--<td>{{$ct->ttbc}}</td>--}}
                                <td style="text-align: center">{{getDayVn($ct->ngaybc)}}</td>
                                <td style="text-align: center">{{$ct->sobc}}</td>
                                <td style="text-align: center">
                                    @if($ct->trangthai == 'HT')
                                        <span class="badge badge-warning">Hoàn thành</span>
                                    @elseif($ct->trangthai == 'CHT')
                                        <span class="badge badge-danger">Chưa hoàn thành</span>
                                    @elseif($ct->trangthai == 'HHT')
                                        <span class="badge badge-danger">Hủy hoàn thành</span>
                                    @else
                                        <span class="badge badge-success">Công bố</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('tonghopgiahhdvk/'.$ct->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($ct->trangthai == 'CHT' || $ct->trangthai == 'HHT')
                                        <a href="{{url('tonghopgiahhdvk/'.$ct->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        <button type="button" onclick="confirmHoanthanh('{{$ct->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                        @if($ct->trangthai == 'CHT')
                                            <button type="button" onclick="confirmDelete('{{$ct->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                        @endif
                                    @endif
                                    @if($ct->trangthai == 'HT' || $ct->trangthai == 'CB')
                                        @if(session('admin')->level == 'H' || session('admin')->level == 'T')
                                            @if($ct->trangthai == 'HT')
                                                <button type="button" onclick="confirmCB('{{$ct->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal-confirm" data-toggle="modal"><i class="fa fa-send"></i>&nbsp;
                                                    Công bố</button>
                                            @endif
                                            <button type="button" onclick="confirmHHT('{{$ct->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-times"></i>&nbsp;
                                                Hủy hoàn thành</button>
                                            <a href="{{url('thgiahhdvk/'.$ct->id.'/exportXML')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-file-code-o"></i>&nbsp;Xuất file XML</a>
                                                <a href="{{url('thgiahhdvk/'.$ct->id.'/exportEx')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-file-code-o"></i>&nbsp;Xuất file Excel</a>
                                        @endif
                                    @endif
                                </td>
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
    @include('includes.e.modal-attackfile')
    <!--Modal Create-->
    <div id="create-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
        {!! Form::open(['url'=>'/tonghopgiahhdvk/create','id' => 'frm_create','method'=>'post'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Tổng hợp giá hàng hóa dịch vụ
                        @if($inputs['phanloai'] == '15ngaydau') <b>15 ngày đầu tháng</b>
                        @else <b>15 ngày cuối tháng</b>
                        @endif
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Phân loại thông tư quyết định</label>
                                <select name="mattbc" id="mattbc" class="form-control">
                                    @foreach($m_nhom as $ct)
                                        <option value="{{$ct->matt}}">{{$ct->tentt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Tháng</label>
                                {!! Form::select(
                                'thangbc',
                                getThang()
                                ,date('m'),
                                array('id' => 'thangbc', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Năm</label>
                                <select name="nambc" id="nambc" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Ngày chốt báo cáo</label>
                                {!!Form::text('ngaychotbc','31/12/'.date('Y'), array('id' => 'ngaychotbc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control'))!!}
                            </div>
                        </div>
                        <input type="hidden" id="phanloaibc" name="phanloaibc" value="{{$inputs['phanloai']}}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcreate()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'tonghopgiahhdvk/delete','id' => 'frm_delete'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                    <input type="hidden" name="iddelete" id="iddelete">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickdelete(){
            $('#frm_delete').submit();
        }
    </script>
    <!--Modal Hoàn thành-->
    <div id="hoanthanh-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'tonghopgiahhdvk/hoanthanh','id' => 'frm_hoanthanh'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn thành hồ sơ?</h4>

                    <input type="hidden" name="idhoanthanh" id="idhoanthanh">

                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Hồ sơ đã hoàn thành sẽ không được phép chỉnh sửa và xóa hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhoanthanh()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Hủy Hoàn thành-->
    <div id="huyhoanthanh-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'tonghopgiahhdvk/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành hồ sơ?</h4>

                    <input type="hidden" name="idhuyhoanthanh" id="idhuyhoanthanh">

                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Hồ sơ Bị hủy sẽ chuyển lại cho cơ quan nhập chủ quản có thể chỉnh sửa hồ sơ!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhuyhoanthanh()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Công bố-->
    <div id="congbo-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'tonghopgiahhdvk/congbo','id' => 'frm_congbo'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý công bố hồ sơ?</h4>

                    <input type="hidden" name="idcongbo" id="idcongbo">

                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Hồ sơ sẽ được công bố lên trang công bố của tỉnh!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcongbo()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div id="createthang-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
        {!! Form::open(['url'=>'/tonghopgiahhdvkthang/create','id' => 'frm_createthang','method'=>'post'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Tổng hợp giá hàng hóa dịch vụ tháng
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Theo thông tư quyết định</label>
                                <select name="mattbct" id="mattbct" class="form-control">
                                    @foreach($m_nhom as $ct)
                                        <option value="{{$ct->matt}}">{{$ct->tentt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Tháng</label>
                                {!! Form::select(
                                'thangbct',
                                getThang()
                                ,date('m'),
                                array('id' => 'thangbct', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Năm</label>
                                <select name="nambct" id="nambct" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="phanloaibct" name="phanloaibct" value="{{$inputs['phanloai']}}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcreatethang()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickhoanthanh(){
            $('#frm_hoanthanh').submit();
        }
        function clickcongbo(){
            $('#frm_congbo').submit();
        }
        function clickhuyhoanthanh(){
            $('#frm_huyhoanthanh').submit();
        }
    </script>

@stop