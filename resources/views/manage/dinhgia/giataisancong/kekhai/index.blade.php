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
                var current_path_url = '/giadatphanloai?';
                var namhs = '&nam='+$('#nam').val();
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var maxa = '&maxa='+$('#maxa').val();
                var tenphanloai = '&tenphanloai='+$('#tenphanloai').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+namhs+mahuyen+tenphanloai+paginate+maxa;
                window.location.href = url;
            });
        });
        function searchtt(){
            var current_path_url = '/giataisancong?';
            var namhs = '&nam='+$('#nam').val();
            var mahuyen = '&mahuyen='+$('#mahuyen').val();
            var maxa = '&maxa='+$('#maxa').val();
            var tenphanloai = '&tenphanloai='+$('#tenphanloai').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+namhs+mahuyen+tenphanloai+paginate+maxa;
            window.location.href = url;
        }
        function resettt(){
            window.location.href = '/giataisancong';
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

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin giá tài sản công<small></small>
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
                        @if($inputs['mahuyen'] != 'all')
                            <a href="{{url('giataisancong/create?&mahuyen='.$inputs['mahuyen'])}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới </a>
                        @endif

                        <a href="{{url('giataisancong/print?&mahuyen='.$inputs['mahuyen'].'&nam='.$inputs['nam'].'&tenphanloai='.$inputs['tenphanloai']).'&maxa='.$inputs['maxa']}}"
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
                                    {!! Form::text('tenphanloai', $inputs['tenphanloai'], ['id' => 'tenphanloai', 'class' => 'form-control']) !!}
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
                                <th style="text-align: center">Thời điểm <br>xác định</th>
                                <th style="text-align: center">Tên tài sản</th>
                                <th style="text-align: center">Nguyên giá</th>
                                <th style="text-align: center">Giá trị</th>
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
                                        <td style="text-align: center">{{getDayVn($tt->thoidiemden)}}</td>
                                        <td style="text-align: left">{{$tt->tentaisan}}</td>
                                        <td style="text-align: left">{{dinhdangso($tt->nguyengia)}}</td>
                                        <td style="text-align: left">{{dinhdangso($tt->giathue)}}</td>
                                        <td style="text-align: center">
                                            @if ($tt->trangthai == "CHT")
                                                <span class="badge badge-default">Chưa hoàn thành</span>
                                            @elseif ($tt->trangthai == "HHT")
                                                <span class="badge badge-danger">Hủy hoàn thành</span>
                                            @elseif ($tt->trangthai == "HT")
                                                <span class="badge badge-info">Hoàn thành</span>
                                            @elseif ($tt->trangthai == "CB")
                                                <span class="badge badge-success">Công bố</span>
                                            @else
                                             <span class="badge badge-warning">Chưa công bố</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('giataisancong/'.$tt->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                            @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                                                @if($tt->trangthai == 'CB')
                                                    @if(can('kkgiathuetscong','congbo'))
                                                        <button type="button" onclick="confirmHHT('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-times"></i>&nbsp;
                                                            Hủy công bố</button>
                                                    @endif
                                                @elseif($tt->trangthai == 'HT')
                                                    @if(can('kkgiathuetscong','congbo'))
                                                        <button type="button" onclick="confirmCB('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal-confirm" data-toggle="modal"><i class="fa fa-send"></i>&nbsp;
                                                            Công bố</button>
                                                    @endif
                                                @else
                                                    @if(can('kkgiathuetscong','edit'))
                                                        <a href="{{url('giataisancong/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>

                                                    @endif
                                                    @if(can('kkgiathuetscong','delete'))
                                                        <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                            Xóa</button>
                                                    @endif
                                                @endif
                                            @else
                                                <!-- 03.11.19 làm để giới thiệu (chưa phân quyền) -->
                                                @if($tt->trangthai == 'CHT' || $tt->trangthai == 'HHT')
                                                    @if($tt->mahuyen == session('admin')->district)
                                                        @if(can('kkgiathuetscong','edit'))
                                                            <!--đúng địa bàn quản lý thì đc sửa-->
                                                                <a href="{{url('giataisancong/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                                        @endif

                                                        @if(can('kkgiathuetscong','approve'))
                                                            <button type="button" onclick="confirmHoanthanh('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                                        @endif

                                                        @if(can('kkgiathuetscong','delete'))
                                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                                Xóa</button>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td style="text-align: center" colspan="8">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                                   'tenphanloai'=>$inputs['tenphanloai'],
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
            {!! Form::open(['url'=>'giataisancong/delete','id' => 'frm_delete'])!!}
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
            {!! Form::open(['url'=>'giataisancong/hoanthanh','id' => 'frm_hoanthanh'])!!}
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
            {!! Form::open(['url'=>'giataisancong/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
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
        <!--Modal Hủy Hoàn thành-->
        <div id="congbo-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            {!! Form::open(['url'=>'giataisancong/congbo','id' => 'frm_congbo'])!!}
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
        @include('includes.e.modal-attackfile')
@stop