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
            $('#paginate').change(function() {
                var current_path_url = '/thongtindaugiadat?';
                var namhs = '&nam='+$('#nam').val();
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var maxa = '&maxa='+$('#maxa').val();
                var tenduan = '&tenduan='+$('#tenduan').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+namhs+mahuyen+tenduan+paginate+maxa;
                window.location.href = url;
            });
        });
        function searchtt(){
            var current_path_url = '/thongtindaugiadat?';
            var namhs = '&nam='+$('#nam').val();
            var mahuyen = '&mahuyen='+$('#mahuyen').val();
            var maxa = '&maxa='+$('#maxa').val();
            var tenduan = '&tenduan='+$('#tenduan').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+namhs+mahuyen+tenduan+paginate+maxa;
            window.location.href = url;
        }
        function resettt(){
            window.location.href = '/thongtindaugiadat';
        }
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
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/filethamdinhgia/dinhkem',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#dinh_kem').replaceWith(data.message);
                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
        function getIdCb(id) {
            document.getElementById("congbo_id").value=id;
        }
        function getIdHcb(id) {
            document.getElementById("huycongbo_id").value=id;
        }
        function getIdHt(id) {
            document.getElementById("hoanthanh_id").value=id;
        }
        function getIdHHt(id) {
            document.getElementById("huyhoanthanh_id").value=id;
        }
        function ClickCongBo(){
            $('#frm_congbo').submit();
        }
        function ClickHuyCongBo(){
            $('#frm_huycongbo').submit();
        }
        function ClickHht(){
            $('#frm_huyhoanthanh').submit();
        }
        function ClickHt(){
            $('#frm_hoanthanh').submit();
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin <small>&nbsp;giá đấu giá đất</small>
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
                        @if(can('kkgiadaugiadat','create'))
                            @if($inputs['mahuyen'] != 'all')
                                <a href="{{url('thongtindaugiadat/create?&mahuyen='.$inputs['mahuyen'])}}" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus"></i> Thêm mới </a>
                            @endif
                            {{--<a href="{{url('thongtindaugiadat/nhandulieutuexcel')}}" class="btn btn-default btn-sm">--}}
                                {{--<i class="fa fa-file-excel-o"></i> Nhận dữ liệu</a>--}}
                        @endif

                        @if(can('thgiadaugiadat','congbo'))
                            {{--<button type="button" class="btn btn-default btn-xs mbs" data-target="#check-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Công bố/ Hủy</button>--}}
                        @endif
                        <a href="{{url('thongtindaugiadat/print?&mahuyen='.$inputs['mahuyen'].'&nam='.$inputs['nam'].'&tenduan='.$inputs['tenduan']).'&maxa='.$inputs['maxa']}}"
                           class="btn btn-default btn-sm" target="_blank"><i class="fa fa-print"></i> Print </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="portlet-body form" id="form_wizard">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="font-weight: bold">Năm</label>
                                        <select name="nam" id="nam" class="form-control">
                                            <option value="all">--Tất cả các năm--</option>
                                            @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                            @if ($nam_stop = intval(date('Y')) + 1) @endif
                                            @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold">Quận/huyện</label>
                                        <select name="mahuyen" id="mahuyen" class="form-control">
                                            <option value="all">--Tất cả các quận/huyện--</option>
                                            @foreach($huyens as $huyen)
                                                <option value="{{$huyen->district}}" {{$huyen->district == $inputs['mahuyen'] ? 'selected' : ''}}>{{$huyen->diaban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold">Xã phường</label>
                                        <select name="maxa" id="maxa" class="form-control">
                                            <option value="all">--Tất cả các xã phường--</option>
                                            @foreach($xas as $xa)
                                                <option value="{{$xa->town}}" {{$xa->town == $inputs['maxa'] ? 'selected' : ''}}>{{$xa->diaban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label" style="font-weight: bold">Tên dự án<span class="require">*</span></label>
                                    {!! Form::text('tenduan', $inputs['tenduan'], ['id' => 'tenduan', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="reset" class="btn btn-circle" onclick="resettt()"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                        <button type="submit" class="btn btn-circle green" onclick="searchtt()"><i class="fa fa-search"></i>Tìm kiếm</button>
                    </div>
                </div>
                <div class="portlet-body">
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="2%" style="text-align: center">STT</th>
                                <th style="text-align: center">Quận/ huyện</th>
                                <th style="text-align: center">Xã/phường</th>
                                <th style="text-align: center">Tên dự án</th>
                                <th style="text-align: center">Thời điểm <br>xác định</th>
                                {{--<th style="text-align: center">Diện tích</th>--}}
                                <th style="text-align: center">Trạng thái</th>
                                <th style="text-align: center" width="20%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($model->count() != 0)
                                @foreach($model as $key=>$tt)
                                    <tr>
                                        <td style="text-align: center">{{$key + 1}}</td>
                                        <td style="text-align: center">{{$tt->tenhuyen}}</td>
                                        <td style="text-align: center">{{$tt->tenxa}}</td>
                                        <td style="text-align: left">{{$tt->tenduan}}</td>
                                        <td style="text-align: center">{{getDayVn($tt->thoidiem)}}</td>
                                        {{--<td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->dientich,3)}}</td>--}}
                                        <td style="text-align: center">
                                            @if($tt->trangthai == 'CB')
                                                <span class="badge badge-warning">Công bố</span>
                                            @elseif($tt->trangthai == 'CHT')
                                                <span class="badge badge-danger">Chưa hoàn thành</span>
                                            @else
                                                <span class="badge badge-blue">Hoàn thành</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('thongtindaugiadat/'.$tt->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                            @if($tt->trangthai == 'CB')
                                                {{--Công bố--}}
                                                @if(can('thgiadaugiadat','congbo'))
                                                    <button type="button" onclick="getIdHcb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huycongbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy công bố</button>
                                                @endif
                                            @elseif($tt->trangthai == 'CHT')
                                                {{--Chưa hoàn thành--}}
                                                @if(can('kkgiadaugiadat','edit'))
                                                    <a href="{{url('thongtindaugiadat/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                    <a href="{{url('thongtindaugiadatct?&mahs='.$tt->mahs)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chi tiết</a>
                                                @endif
                                                @if(can('kkgiadaugiadat','delete'))
                                                    <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                        Xóa</button>
                                                @endif
                                                @if(can('kkgiadaugiadat','approve'))
                                                    <button type="button" onclick="getIdHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Hoàn thành</button>
                                                @endif
                                            @else
                                                {{--Hoàn thành--}}
                                                @if(can('thgiadaugiadat','congbo'))
                                                    <button type="button" onclick="getIdCb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Công bố</button>
                                                    <button type="button" onclick="getIdHHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy Hoàn thành</button>
                                                @endif
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td style="text-align: center" colspan="7">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                    {{$model->appends(['nam'=>$inputs['nam'],
                                                   'mahuyen'=>$inputs['mahuyen'],
                                                   'maxa'=>$inputs['maxa'],
                                                   'tenduan'=>$inputs['tenduan'],
                                                   'paginate'=>$inputs['paginate'],
                                ])->links()}}
                                </div>
                            </div>
                        @endif
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
        <!--Modal Delete-->
        <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            {!! Form::open(['url'=>'thongtindaugiadat/delete','id' => 'frm_delete'])!!}
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
        <div id="hoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            {!! Form::open(['url'=>'thongtindaugiadat/hoanthanh','id' => 'frm_hoanthanh'])!!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn thành hồ sơ?</h4>

                        <input type="hidden" name="hoanthanh_id" id="hoanthanh_id">

                    </div>
                    <div class="modal-body">
                        <p style="color: #0000FF">Hồ sơ đã hoàn thành sẽ không được phép chỉnh sửa và xóa hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickHt()">Đồng ý</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!--Modal Hủy Hoàn thành-->
        <div id="huyhoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            {!! Form::open(['url'=>'thongtindaugiadat/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành hồ sơ?</h4>

                        <input type="hidden" name="huyhoanthanh_id" id="huyhoanthanh_id">

                    </div>
                    <div class="modal-body">
                        <p style="color: #0000FF">Hồ sơ Bị hủy sẽ chuyển lại cho cơ quan nhập chủ quản có thể chỉnh sửa hồ sơ!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickHht()">Đồng ý</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        {{--Model công bố--}}
        <div id="congbo-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            {!! Form::open(['url'=>'thongtindaugiadat/congbo','id' => 'frm_congbo'])!!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý công bố?</h4>

                        <input type="hidden" name="congbo_id" id="congbo_id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickCongBo()">Đồng ý</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        {{--Model công bố--}}
        <div id="huycongbo-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            {!! Form::open(['url'=>'thongtindaugiadat/huycongbo','id' => 'frm_huycongbo'])!!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy công bố?</h4>

                        <input type="hidden" name="huycongbo_id" id="huycongbo_id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickHuyCongBo()">Đồng ý</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        @include('includes.e.modal-attackfile')
@stop