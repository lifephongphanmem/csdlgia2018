@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
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

        function searchtt(){
            var current_path_url = '/giadatdiaban?';
            var nam = '&nam='+$('#nam').val();
            var district = '&district='+$('#district').val();
            var maloaidat = '&maloaidat='+$('#maloaidat').val();
            var khuvuc = '&khuvuc='+$('#khuvuc').val();
            var mota = '&mota='+$('#mota').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+nam+district+maloaidat+khuvuc+mota+paginate;
            window.location.href = url;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/giadatdiaban?';
                var nam = '&nam='+$('#nam').val();
                var district = '&district='+$('#district').val();
                var maloaidat = '&maloaidat='+$('#maloaidat').val();
                var khuvuc = '&khuvuc='+$('#khuvuc').val();
                var mota = '&mota='+$('#mota').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+district+maloaidat+khuvuc+mota+paginate;
                window.location.href = url;
            });
        });

        function resettt(){
            window.location.href = '/giadatdiaban';
        }

        function edittt(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'giadatdiaban/edittt',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#edit_node').replaceWith(data.message);
                        InputMask();
                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
        function getId(id) {
            document.getElementById("destroy_id").value=id;
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
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Giá đất <small>&nbsp;trên địa bàn</small>
    </h3>
    {{--<h3 class="page-title">
        <small> <b style="color: blue">{{$dvql->tendv}}</b><b style="color: blue"> - </b><b style="color: blue">{{$dv->tendv}}</b> - Người soạn thảo: <b style="color: blue">{{isset($model) ? $model->cvsoanthao : session('admin')->name}}</b> </small>
    </h3>--}}
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('kkgiacldat','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#add-modal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                            Thêm mới</button>
                        <a href="{{url('giadatdiaban/nhandulieutuexcel')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-file-excel-o"></i> Nhận dữ liệu</a>
                        @endif
                        @if(can('kkgiacldat','delete'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                            Xóa</button>
                        @endif
                        @if(can('thgiacldat','congbo'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#check-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Công bố/ Hủy</button>
                        @endif
                        <a href="{{url('giadatdiaban/prints?nam='.$inputs['nam'].'&district='.$inputs['district'].'&maloaidat='.$inputs['maloaidat'].'&khuvuc='.$inputs['khuvuc'].'&mota='.$inputs['mota'])}}" class="btn btn-default btn-sm" target="_blank">
                            <i class="fa fa-print"></i> In</a>
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select class="form-control" name="nam" id="nam">
                                                <option value="all">--Tất cả các năm--</option>
                                                @if ($nam_start = 2015 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Địa bàn</label>
                                            <select class="form-control" name="district" id="district">
                                                <option value="All">--Tất cả--</option>
                                                @foreach($diabans as $diaban)
                                                    <option value="{{$diaban->district}}" {{$diaban->district == $inputs['district'] ? 'selected' : ''}}>{{$diaban->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Loại đất</label>
                                            <select class="form-control" name="maloaidat" id="maloaidat">
                                                <option value="All">--Tất cả--</option>
                                                @foreach($loaidats as $loaidat)
                                                    <option value="{{$loaidat->maloaidat}}" {{$loaidat->maloaidat == $inputs['maloaidat'] ? 'selected' : ''}}>{{$loaidat->loaidat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Khu vực<span class="require">*</span></label>
                                        {!! Form::text('khuvuc', $inputs['khuvuc'], ['id' => 'khuvuc', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Mô tả<span class="require">*</span></label>
                                        {!! Form::text('mota', $inputs['mota'], ['id' => 'mota', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <th style="text-align: center" width="2%" rowspan="2">STT</th>
                                <th style="text-align: center" width="2%" rowspan="2">Năm</th>
                                <th style="text-align: center" rowspan="2" width="10%">Địa bàn</th>
                                <th style="text-align: center" rowspan="2" width="10%">Loại đất</th>
                                <th style="text-align: center" rowspan="2">Khu vực</th>
                                <th style="text-align: center" rowspan="2">Mô tả</th>
                                <th style="text-align: center" rowspan="2" width="5%">MĐSD</th>
                                <th style="text-align: center" rowspan="2" width="5%">Hệ số K (so với bảng giá đất)</th>
                                <th style="text-align: center" colspan="5">Giá đất</th>
                                <th style="text-align: center" rowspan="2" width="5%"> Trạng thái</th>
                                <th style="text-align: center" rowspan="2"> Thao tác</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">VT1</th>
                                <th style="text-align: center">VT2</th>
                                <th style="text-align: center">VT3</th>
                                <th style="text-align: center">VT4</th>
                                <th style="text-align: center">VT5</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($model->count() != 0)
                                    @foreach($model as $key => $tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td><b>{{$tt->nam}}</b></td>
                                            <td><b>{{$tt->diaban}}</b><br>{{$tt->soqd}}</td>
                                            <td style="text-align: left"><b>{{$tt->loaidat}}</b></td>
                                            <td style="text-align: left;"><b>{{$tt->khuvuc}}</b></td>
                                            <td style="text-align: left" class="active">{{$tt->mota}}</td>
                                            <td style="text-align: center">{{$tt->mdsd}}</td>
                                            <td style="text-align: center">{{$tt->hesok}}</td>
                                            <td style="text-align: center">{{dinhdangsothapphan($tt->giavt1,2)}}</td>
                                            <td style="text-align: center">{{dinhdangsothapphan($tt->giavt2,2)}}</td>
                                            <td style="text-align: center">{{dinhdangsothapphan($tt->giavt3,2)}}</td>
                                            <td style="text-align: center">{{dinhdangsothapphan($tt->giavt4,2)}}</td>
                                            <td style="text-align: center">{{dinhdangsothapphan($tt->giavt5,2)}}</td>
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
                                                @if($tt->trangthai == 'CB')
                                                    {{--Công bố--}}
                                                    @if(can('thgiacldat','congbo'))
                                                        <button type="button" onclick="getIdHcb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huycongbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy công bố</button>
                                                    @endif
                                                @elseif($tt->trangthai == 'CHT')
                                                    {{--Chưa hoàn thành--}}
                                                    @if(can('kkgiacldat','edit'))
                                                        <button type="button" onclick="edittt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal" style="margin: 2px"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                    @endif
                                                    @if(can('kkgiacldat','delete'))
                                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#destroy-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    @endif
                                                    @if(can('kkgiacldat','approve'))
                                                        <button type="button" onclick="getIdHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Hoàn thành</button>
                                                    @endif
                                                @else
                                                    {{--Hoàn thành--}}
                                                    @if(can('thgiacldat','congbo'))
                                                        <button type="button" onclick="getIdCb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Công bố</button>
                                                        <button type="button" onclick="getIdHHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy Hoàn thành</button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="15">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                    {{$model->appends(['maloaidat' => $inputs['maloaidat'],
                                                   'nam'=>$inputs['nam'],
                                                   'khuvuc'=>$inputs['khuvuc'],
                                                   'mota'=>$inputs['mota'],
                                                   'paginate'=>$inputs['paginate'],
                                ])->links()}}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>

    </div>
    @include('manage.dinhgia.giadatdiaban.include.modal_dialog')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop