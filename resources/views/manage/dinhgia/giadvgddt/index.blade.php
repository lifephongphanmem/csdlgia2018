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
            var current_path_url = '/giadvgiaoducdaotao?';
            var nam = '&nam='+$('#nam').val();
            var district = '&district='+$('#district').val();
            var khuvuc = '&khuvuc='+$('#khuvuc').val();
            var mota = '&mota='+$('#mota').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+nam+district+khuvuc+mota+paginate;
            window.location.href = url;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/giadvgiaoducdaotao?';
                var nam = '&nam='+$('#nam').val();
                var district = '&district='+$('#district').val();
                var khuvuc = '&khuvuc='+$('#khuvuc').val();
                var mota = '&mota='+$('#mota').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+district+khuvuc+mota+paginate;
                window.location.href = url;
            });
        });

        function resettt(){
            window.location.href = '/giadvgiaoducdaotao';
        }

        function edittt(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'giadvgiaoducdaotao/edittt',
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

        function clickhoanthanh(){
            $('#frm_hoanthanh').submit();
        }

        function clickhuyhoanthanh(){
            $('#frm_huyhoanthanh').submit();
        }

        function getIdHt(id) {
            document.getElementById("idhoanthanh").value=id;
        }
        function getIdHHt(id) {
            document.getElementById("idhuyhoanthanh").value=id;
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Giá dịch vụ <small>&nbsp;giáo dục và đào tạo</small>
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
                        @if(can('kkgiadvgddt','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#add-modal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                            Thêm mới</button>
                        <a href="{{url('giadvgiaoducdaotao/nhandulieutuexcel')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-file-excel-o"></i> Nhận dữ liệu</a>
                        @endif
                        @if(can('kkgiadvgddt','delete') && (session('admin')->level == 'T' || session('admin')->level == 'H'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                            Xóa</button>
                        @endif
                        @if(can('thgiadvgddt','congbo')&& (session('admin')->level == 'T' || session('admin')->level == 'H'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#check-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;
                            Công bố/ Hủy</button>
                        @endif
                        <a href="{{url('giadvgiaoducdaotao/prints?&nam='.$inputs['nam'].'&district='.$inputs['district'].'&khuvuc='.$inputs['khuvuc'].'&mota='.$inputs['mota'])}}" class="btn btn-default btn-sm" target="_blank">
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
                                                    <option value="{{$i.'-'.($i+1)}}" {{($i.'-'.($i+1)) == $inputs['nam'] ? 'selected' : ''}}>{{$i.'-'.($i+1)}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Địa bàn</label>
                                            <select class="form-control" name="district" id="district">
                                                <option value="All">--Tất cả--</option>
                                                {{--<option value="Thành thị" {{$inputs['diaban'] == 'Thành thị' ? 'selected' : ''}}>Thành thị</option>--}}
                                                {{--<option value="Nông thôn" {{$inputs['diaban'] == 'Nông thôn' ? 'selected' : ''}}>Nông thôn</option>--}}
                                                {{--<option value="Miền núi" {{$inputs['diaban'] == 'Miền núi' ? 'selected' : ''}}>Miền núi</option>--}}
                                                {{--<option value="Hải đảo" {{$inputs['diaban'] == 'Hải đảo' ? 'selected' : ''}}>Hải đảo</option>--}}
                                                @foreach($diabans as $diaban)
                                                    <option value="{{$diaban->district}}" {{$diaban->district == $inputs['district'] ? 'selected' : ''}}>{{$diaban->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="control-label" style="font-weight: bold">Khu vực<span class="require">*</span></label>
                                        {!! Form::text('khuvuc', $inputs['khuvuc'], ['id' => 'khuvuc', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="control-label" style="font-weight: bold">Mô tả<span class="require">*</span></label>
                                        {!! Form::text('mota', $inputs['mota'], ['id' => 'mota', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
                                        </div>
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
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="8%">Năm học</th>
                                <th style="text-align: center">Địa bàn</th>
                                <th style="text-align: center">Khu vực</th>
                                <th style="text-align: center">Mô tả</th>
                                <th style="text-align: center" >Học phí</th>
                                <th style="text-align: center"  width="5%"> Trạng thái</th>
                                <th style="text-align: center" width="15%"> Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($model->count() != 0)
                                    @foreach($model as $key => $tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td style="text-align: center"><b>{{$tt->nam}}</b></td>
                                            <td><b>{{$tt->diaban}}</b></td>
                                            <td style="text-align: left;"><b>{{$tt->khuvuc}}</b></td>
                                            <td style="text-align: left" class="active">{{$tt->mota}}</td>
                                            {{--<td style="text-align: center">{{$tt->hesok}}</td>--}}
                                            <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->dongia,2)}}</td>
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
                                                    @if(can('thgiadvgddt','congbo'))
                                                        <button type="button" onclick="getIdHcb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huycongbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy công bố</button>
                                                    @endif
                                                @elseif($tt->trangthai == 'CHT')
                                                    {{--Chưa hoàn thành--}}
                                                    @if(can('kkgiadvgddt','edit'))
                                                        <button type="button" onclick="edittt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal" style="margin: 2px"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                    @endif
                                                    @if(can('kkgiadvgddt','delete'))
                                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#destroy-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    @endif
                                                    @if(can('kkgiadvgddt','approve'))
                                                        <button type="button" onclick="getIdHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Hoàn thành</button>
                                                    @endif
                                                @else
                                                    {{--Hoàn thành--}}
                                                    @if(can('thgiadvgddt','congbo'))
                                                        <button type="button" onclick="getIdCb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Công bố</button>
                                                        <button type="button" onclick="getIdHHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy Hoàn thành</button>
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
                        <div class="row">
                            @if(count($model) != 0)
                            <div class="col-md-5 col-sm-12">
                                <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">
                                        Hiển thị 1 đến {{$model->count()}} trên {{$model->total()}} thông tin
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="sample_3_paginate">
                                    {{$model->appends([
                                                   'nam'=>$inputs['nam'],
                                                   'district'=>$inputs['district'],
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


    @include('manage.dinhgia.giadvgddt.include.modal_dialog')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop