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


        function edittt(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'dmgianuocsachsinhhoat/edittt',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_madoituong').val(data.madoituong);
                    $('#edit_doituongsd').val(data.doituongsd);
                    $('#edit_id').val(data.id);
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }

        function getId(id) {
            document.getElementById("destroy_id").value=id;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/dmgianuocsachsinhhoat?';
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+paginate;
                window.location.href = url;
            });
        });

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Danh mục <small>&nbsp;giá nước sinh hoạt</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('dmgianuocsh','create'))
                            <button type="button" class="btn btn-default btn-xs mbs" data-target="#add-modal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Thêm mới</button>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
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
                                {{--<th style="text-align: center">Mã đối tượng</th>--}}
                                <th style="text-align: center">Mục đích sử dụng</th>
                                <th style="text-align: center" width="10%"> Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($model->count() != 0)
                                @foreach($model as $key => $tt)
                                    <tr>
                                        <td style="text-align: center">{{$key+1}}</td>
                                        {{--<td style="text-align: center" >{{$tt->madoituong}}</td>--}}
                                        <td style="text-align: left" class="active">{{$tt->doituongsd}}</td>
                                        <td style="text-align: center">
                                            @if(can('dmtgianuocsh','edit'))
                                                <button type="button" onclick="edittt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal" style="margin: 2px"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                            @endif
                                            @if(can('dmtgianuocsh','delete'))
                                                <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#destroy-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td style="text-align: center" colspan="11">Không có thông tin</td>
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
    @include('manage.dinhgia.gianuocsh.include.modal_dialog_dm')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop