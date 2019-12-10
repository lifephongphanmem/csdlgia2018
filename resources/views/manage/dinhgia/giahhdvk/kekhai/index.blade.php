@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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
            /*$('#thang').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var thang = '&thang=' + $('#thang').val();
                var district = '&district='+ $('#district').val();
                var url = '/giahhdvkhac?'+ thang + namhs + district;
                window.location.href = url;
            });*/
            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                //var thang = '&thang=' + $('#thang').val();
                var district = '&district='+ $('#district').val();
                var url = '/giahhdvkhac?' + namhs + district;
                window.location.href = url;
            });

            $('#district').change(function() {
                var namhs = '&nam='+ $('#nam').val();
                //var thang = '&thang=' + $('#thang').val();
                var district = '&district='+ $('#district').val();
                var url = '/giahhdvkhac?' + namhs + district;

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
        function clickfilemau(){
            $('#frm_filemau').submit();
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin báo cáo giá hàng hóa dịch vụ khác<small style="color: blue;font-weight: bold">&nbsp;- Địa bàn quản lý {{$diaban->diaban}}</small>
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
                        @if(can('kkgiahhdvk','create'))
                            <button type="button" class="btn btn-default btn-sm" data-target="#create-modal-confirm" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Thêm mới</button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-filemau"><i class="fa fa-cloud-download"></i>
                                &nbsp;Xuất dữ liệu</button>
                            <a href="{{url('/giahhdvkhac/nhanexcel?&district='. $inputs['district'])}}" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu</a>
                        @endif
                    </div>

                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <!--div class="col-md-2">
                            <div class="form-group">
                                <label>Tháng báo cáo</label>
                                {!! Form::select(
                                'thang',
                                getThang()
                                ,$inputs['thang'],
                                array('id' => 'thang', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Năm báo cáo</label>
                                <select name="nam" id="nam" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Địa bàn</label>
                                    <select name="district" id="district" class="form-control">
                                        @foreach($modeldb as $db)
                                            <option value="{{$db->district}}" {{$db->district == $inputs['district'] ? 'selected' : ''}}>{{$db->diaban}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Thời điểm báo cáo</th>
                            <th style="text-align: center">Nhóm hàng hóa dịch vụ</th>
                            <th style="text-align: center" width="20%">Số quyết định <br>Ngày báo cáo</th>
                            <th style="text-align: center" width="20%">Số QĐ liền kề<br>Ngày báo cáo liền kề</th>
                            <th style="text-align: center" width="10%">Trạng thái</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>Tháng {{$tt->thang}}/{{$tt->nam}}</td>
                                <td class="active" style="font-weight: bold">{{$tt->tentt}}</td>
                                <td>Số: {{$tt->soqd}}<br>Ngày báo cáo: {{getDayVn($tt->ngayapdung)}}</td>
                                <td>Số: {{$tt->soqdlk}}<br>Ngày báo cáo: {{getDayVn($tt->ngayapdunglk)}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'HT')
                                        <span class="badge badge-warning">Hoàn thành</span>
                                    @elseif($tt->trangthai == 'CHT')
                                        <span class="badge badge-danger">Chưa hoàn thành</span>
                                    @elseif($tt->trangthai == 'HHT')
                                        <span class="badge badge-danger">Hủy hoàn thành</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('giahhdvkhac/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($tt->trangthai == 'CHT' || $tt->trangthai == 'HHT')
                                        @if(can('kkgiahhdvk','edit'))
                                        <a href="{{url('giahhdvkhac/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        @endif
                                        @if(can('kkgiahhdvk','approve'))
                                        <button type="button" onclick="confirmHoanthanh('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                        @endif
                                        @if($tt->trangthai == 'CHT')
                                            @if(can('kkgiahhdvk','delete'))
                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
                                            @endif
                                        @endif
                                        {{--@if(can('kkgiahhdvk','delete'))--}}
                                            {{--<button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;--}}
                                                {{--Xóa</button>--}}
                                        {{--@endif--}}
                                    @endif
                                    @if($tt->trangthai == 'HT' || $tt->trangthai == 'CB')
                                        @if(session('admin')->level == 'H' || session('admin')->level == 'T')
                                            @if($tt->trangthai == 'HT')
                                                @if(can('thgiahhdvk','congbo'))
                                                <button type="button" onclick="confirmCB('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal-confirm" data-toggle="modal"><i class="fa fa-send"></i>&nbsp;
                                                    Công bố</button>
                                                @endif
                                            @endif
                                            @if(can('kkgiahhdvk','approve'))
                                            <button type="button" onclick="confirmHHT('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-times"></i>&nbsp;
                                                Hủy hoàn thành</button>
                                            @endif

                                        @endif
                                    @endif


                                    <!--a href="{{url('hoso-thamdinhgia/'.$tt->mahs.'/history')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Lịch sử</a-->
                                </td>
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
    @include('includes.e.modal-attackfile')
    <!--Modal Create-->
    <div id="create-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
        {!! Form::open(['url'=>'/giahhdvkhac/create','id' => 'frm_create','method'=>'post'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới báo cáo giá hàng hóa dịch vụ</h4>
                </div>

                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Địa bàn quản lý: <b style="color: blue">{{$diaban->diaban}}</b></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Phân loại nhóm hàng hóa dịch vụ</label>
                                {!!Form::select('mattbc', $a_nhom, null, array('id' => 'mattbc','class' => 'form-control select2me'))!!}
                            </div>
                        </div>
                        <!--div class="form-group">
                            <div class="col-md-12">
                                <label>Phân loại báo cáo</label>
                                {!! Form::select(
                                'phanloaibc',
                                array(
                                '15ngaydau'=>'15 ngày đầu tháng',
                                '15ngaycuoi'=>'15 ngày cuối tháng',
                                )
                                ,null,
                                array('id' => 'phanloaibc', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div-->
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
                        <input type="hidden" id="districtbc" name="districtbc" value="{{$inputs['district']}}">
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

    <!--Modal File mẫu-->
    <div id="modal-filemau" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
        {!! Form::open(['url'=>'/giahhdvkhac/danhmucmau','id' => 'frm_filemau','method'=>'post'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới kê khai giá hàng hóa dịch vụ</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa bàn quản lý: <b style="color: blue">{{$diaban->diaban}}</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lấy danh mục hàng hóa từ</label>
                                    <div class="radio-list">
                                        <label>
                                            <span><input type="radio" name="phanloai" value="DM"></span>Danh mục hàng hóa
                                        </label>
                                        <label>
                                            <span><input type="radio" name="phanloai" value="HS" checked=""></span>Hồ sơ đã hoàn thành gần nhất
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Thông tư quyết định</label>
                                {!!Form::select('matt', $a_nhom, null, array('id' => 'matt','class' => 'form-control select2me'))!!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="diaban" name="diaban" value="{{$inputs['district']}}">
                </div>


                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickfilemau()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'giahhdvkhac/delete','id' => 'frm_delete'])!!}
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
        {!! Form::open(['url'=>'giahhdvkhac/hoanthanh','id' => 'frm_hoanthanh'])!!}
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
        {!! Form::open(['url'=>'giahhdvkhac/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
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
        {!! Form::open(['url'=>'giahhdvkhac/congbo','id' => 'frm_congbo'])!!}
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