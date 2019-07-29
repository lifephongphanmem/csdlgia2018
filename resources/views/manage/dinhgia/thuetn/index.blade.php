@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            $(":input").inputmask();
        });

        function searchtt(){
            var current_path_url = '/thuetainguyen?';
            var nam = '&nam='+$('#nam').val();
            var manhom = '&manhom='+$('#manhom').val();
            var cap1 = '&cap1='+$('#cap1').val();
            var cap2 = '&cap2='+$('#cap2').val();
            var cap3 = '&cap3='+$('#cap3').val();
            var cap4 = '&cap4='+$('#cap4').val();
            var cap5 = '&cap5='+$('#cap5').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+nam+manhom+cap1+cap2+cap3+cap4+cap5+paginate;
            window.location.href = url;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/thuetainguyen?';
                var nam = '&nam='+$('#nam').val();
                var manhom = '&manhom='+$('#manhom').val();
                var cap1 = '&cap1='+$('#cap1').val();
                var cap2 = '&cap2='+$('#cap2').val();
                var cap3 = '&cap3='+$('#cap3').val();
                var cap4 = '&cap4='+$('#cap4').val();
                var cap5 = '&cap5='+$('#cap5').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+manhom+cap1+cap2+cap3+cap4+cap5+paginate;
                window.location.href = url;
            });
        });

        function resettt(){
            window.location.href = '/thuetainguyen';
        }

        function ShowDialogAdd(){
            $('#add-modal').modal('show');
        }

        function edittt(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'thuetainguyen/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_matn').val(data.matn);
                    $('#edit_dvt').val(data.dvt);
                    $('#edit_cap1').val(data.cap1);
                    $('#edit_cap2').val(data.cap2);
                    $('#edit_cap3').val(data.cap3);
                    $('#edit_cap4').val(data.cap4);
                    $('#edit_cap5').val(data.cap5);
                    $('#edit_dongia').val(data.dongia);
                    $('#edit_nam').val(data.nam);
                    $('#edit_soqd').val(data.soqd);
                    $('#edit_id').val(data.id);
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
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Giá thuế tài nguyên<small>&nbsp;trên địa bàn</small>
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
                        @if(can('kkgiathuetn','create'))
                        {{--<button type="button" class="btn btn-default btn-xs mbs" data-target="#add-modal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;--}}
                            {{--Thêm mới</button>--}}
                            <button type="button" class="btn btn-default btn-xs mbs" onclick="ShowDialogAdd()"><i class="fa fa-plus"></i>&nbsp;
                                Thêm mới</button>
                        <a href="{{url('thuetainguyen/nhandulieutuexcel')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-file-excel-o"></i> Nhận dữ liệu</a>
                        @endif
                        @if(can('kkgiathuetn','delete'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                            Xóa</button>
                        @endif
                        @if(can('thgiathuetn','congbo'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#check-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;
                            Công bố/ Hủy</button>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Nhóm tài nguyên</label>
                                            <select class="form-control" name="manhom" id="manhom">
                                                <option value="All">--Tất cả--</option>
                                                @foreach($nhoms as $nhom)
                                                <option value="{{$nhom->manhom}}" {{$inputs['manhom'] == $nhom->manhom ? 'selected' : ''}}>{{$nhom->tennhom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><b>Tên nhóm, loại tài nguyên Cấp I </b><span class="require">*</span></label>
                                            {!! Form::text('cap1', $inputs['cap1'], ['id' => 'cap1', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><b>Tên nhóm, loại tài nguyên Cấp II </b><span class="require">*</span></label>
                                            {!! Form::text('cap2', $inputs['cap2'], ['id' => 'cap2', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><b>Tên nhóm, loại tài nguyên Cấp III </b><span class="require">*</span></label>
                                            {!! Form::text('cap3', $inputs['cap3'], ['id' => 'cap3', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><b>Tên nhóm, loại tài nguyên Cấp IV </b><span class="require">*</span></label>
                                            {!! Form::text('cap4', $inputs['cap4'], ['id' => 'cap4', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><b>Tên nhóm, loại tài nguyên Cấp V </b><span class="require">*</span></label>
                                            {!! Form::text('cap5', $inputs['cap5'], ['id' => 'cap5', 'class' => 'form-control']) !!}
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center">Năm/<br> Thông tin quyết định</th>
                                <th style="text-align: center">Nhóm tài nguyên</th>
                                <th style="text-align: center">Mã tài nguyên</th>
                                <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp I</th>
                                <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp II</th>
                                <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp III</th>
                                <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp IV</th>
                                <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp V</th>
                                <th style="text-align: center">Đơn vi<br>tính</th>
                                <th style="text-align: center" >Đơn giá</th>
                                <th style="text-align: center"  width="5%"> Trạng thái</th>
                                <th style="text-align: center"> Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($model->count() != 0)
                                    @foreach($model as $key => $tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td><b>{{$tt->nam}}</b><br>{{$tt->soqd}}</td>
                                            <td>{{$tt->tennhom}}</td>
                                            <td class="active" >{{$tt->matn}}</td>
                                            <td>{{$tt->cap1}}</td>
                                            <td>{{$tt->cap2}}</td>
                                            <td>{{$tt->cap3}}</td>
                                            <td>{{$tt->cap4}}</td>
                                            <td>{{$tt->cap5}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: center">{{dinhdangsothapphan($tt->dongia,2)}}</td>
                                            <td style="text-align: center">
                                                @if($tt->trangthai == 'CB')
                                                    <span class="badge badge-warning">Công bố</span>
                                                @else
                                                    <span class="badge badge-danger">Chưa công bố</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($tt->trangthai == 'CB')
                                                    @if(can('thgiathuetn','congbo'))
                                                    <button type="button" onclick="getIdHcb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huycongbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy công bố</button>
                                                    @endif
                                                @else
                                                    @if(can('kkgiathuetn','edit'))
                                                        <button type="button" onclick="edittt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal" style="margin: 2px"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                    @endif
                                                    @if(can('kkgiathuetn','delete'))
                                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#destroy-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    @endif
                                                    @if(can('thgiathuetn','congbo'))
                                                        <button type="button" onclick="getIdCb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Công bố</button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="13">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                    {{$model->appends([
                                                   'nam'=>$inputs['nam'],
                                                   'manhom'=>$inputs['manhom'],
                                                   'cap1'=>$inputs['cap1'],
                                                   'cap2'=>$inputs['cap2'],
                                                   'cap3'=>$inputs['cap3'],
                                                   'cap4'=>$inputs['cap4'],
                                                   'cap5'=>$inputs['cap5'],
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
    @include('manage.dinhgia.thuetn.include.modal_dialog')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop
