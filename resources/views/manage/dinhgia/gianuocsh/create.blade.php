@extends('main')

@section('custom-style')
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/admin/pages/scripts/form-wizard.js')}}"></script>
    <script src="{{url('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            FormWizard.init();
            $(":input").inputmask();
            TableManaged.init();
        });

        function edittt(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/gianuocsachsinhhoatct/edittt',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_doituongsd').val(data.doituongsd);
                    $('#edit_giachuathue').val(data.giachuathue);
                    $('#edit_id').val(data.id);
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
        function ClickUpdate(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/gianuocsachsinhhoatct/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#edit_id').val(),
                    giachuathue: $('#edit_giachuathue').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#edit-modal').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Giá nước sinh hoạt<small> thêm mới</small>
    </h3>

    <div class="row">
        {!! Form::open(['url'=>'gianuocsachsinhhoat','method'=>'post' , 'files'=>true, 'id' => 'create_gnsh','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="col-md-12">
            <div class="portlet box blue" id="form_wizard_1">
                <div class="portlet-body form" id="form_wizard">
                    <div class="form-body">
                        <div class="tab-content">
                            <div class="form-body">
                                <b style="color: blue">Thông tin hồ sơ</b>
                                <div class="row">
                                    <div class="col-md-4" >
                                        <label class="control-label">Số quyết định</label>
                                        {!!Form::text('soqd', null, array('id' => 'soqd','class' => 'form-control'))!!}
                                    </div>
                                    <div class="col-md-4" >
                                        <label class="control-label">Ngày áp dụng</label>
                                        {!!Form::text('ngayapdung',isset($model->ngayapdung) ? date('d/m/Y',strtotime($model->ngayapdung)) : date('d/m/Y',strtotime(date('Y-m-d'))), array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Mô tả</label>
                                        {!!Form::text('mota', null, array('id' => 'mota','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Ghi chú<span class="require">*</span></label>
                                        {!! Form::textarea('ghichu', null, ['id' => 'ghichu', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <hr>
                                <b style="color: blue">Giá nước sinh hoạt</b>
                                {{--{!!Form::text('mahs', $inputs['mahs'], array('id' => 'mahs','class' => 'form-control'))!!}--}}
                                <input type="hidden" value="{{$inputs['mahs']}}" name="mahs" id="mahs" class="form-control">
                                <!-- END PAGE HEADER-->
                                <div class="row" id="dsts">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center" width="2%">STT</th>
                                                <th style="text-align: center">Mục đích sử dụng</th>
                                                <th style="text-align: center">Đơn giá</th>
                                                <th style="text-align: center" width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($modelct as $key=>$tt)
                                                <tr class="odd gradeX">
                                                    <td style="text-align: center">{{$key + 1}}</td>
                                                    <td class="active" >{{$tt->doituongsd}}</td>
                                                    <td class="active" >{{number_format($tt->dongia)}}</td>
                                                    <td>
                                                        <button type="button" onclick="edittt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#edit-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                            Sửa</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('gianuocsachsinhhoat')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i>Hoàn thành</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>



    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <div id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin giá nước sạch sinh hoạt</h4>
                </div>
                <div class="modal-body" id="edit_node">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đối tượng</label>
                                <input name="edit_doituongsd" id="edit_doituongsd" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đơn giá<span class="require">*</span></label>
                                {!!Form::text('edit_giachuathue',null, array('id' => 'edit_giachuathue','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" id="edit_id">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="ClickUpdate()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    {{-- @include('manage.dinhgia.gianuocsh.include.modal_dialog')--}}
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
    @include('includes.script.create-header-scripts')
    <script>
        function validateForm(){
            var str = '',strb1='';
            var ok = true;


            if($('#soqd').val()==''){
                strb1 += '  - Số quyết định <br>';
                ok = false;
            }

            if($('#ngayapdung').val()==''){
                strb1 += '  - Ngày áp dụng <br>';
                ok = false;
            }

            if($('#mota').val()==''){
                strb1 += '  - Mô tả <br>';
                ok = false;
            }

//            if($('#ghichu').val()==''){
//                strb1 += '  - Ghi chú <br>';
//                ok = false;
//            }


            //Kết quả
            if ( ok == false){
                if(strb1!='')
                    str+=''+strb1 ;

                toastr.error('Thông tin không được để trống <br>' + str );
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else{
                $("form").unbind('submit').submit();
            }
        }
    </script>
@stop