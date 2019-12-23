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
        function clearForm(){
            $('#mota').val('');
            $('#dvt').val('');
            $('#gia').val('0');
        }
        function ClickCreate(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giaspdvcict/store',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    mota: $('#mota').val(),
                    dvt: $('#dvt').val(),
                    gia: $('#gia').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
        function edittt(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giaspdvcict/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_mota').val(data.mota);
                    $('#edit_dvt').val(data.dvt);
                    $('#edit_gia').val(data.gia);
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
                url: '/giaspdvcict/update',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#edit_id').val(),
                    mota: $('#edit_mota').val(),
                    dvt: $('#edit_dvt').val(),
                    gia: $('#edit_gia').val(),
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
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function delrow(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giaspdvcict/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin tài sản thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-delete').modal("hide");

                    //}
                }
            })

        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Giá sản phẩm, dịch vụ công ích, dịch vụ sự nghiệp công và hàng hóa, dịch vụ được địa phương đặt hàng, giao kế hoạch sản xuất,
        kinh doanh sử dụng ngân sách địa phương theo quy định của pháp luật<small> chỉnh sửa</small>
    </h3>
    <hr>
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giaspdvci/'. $model->id, 'class'=>'horizontal-form','id'=>'update_philephi']) !!}
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số quyết định</label>
                                {!!Form::text('soqd', null, array('id' => 'soqd','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label class="control-label">Ngày áp dụng</label>
                                {!!Form::text('ngayqd',date('d/m/Y',  strtotime($model->ngayqd)), array('id' => 'ngayqd','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thông tin quyết định</label>
                                {!!Form::text('ttqd', null, array('id' => 'ttqd','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">
                    {!! Form::close() !!}
                    <!--/row-->
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin</button>
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="row" id="dsts">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                <tr>
                                    <th style="text-align: center" width="2%">STT</th>
                                    <th style="text-align: center">Mô tả</th>
                                    <th style="text-align: center" width="10%">Đơn vị tính</th>
                                    <th style="text-align: center" width="10%">Đơn giá</th>
                                    <th style="text-align: center" width="20%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelct as $key=>$ct)
                                    <tr>
                                        <td style="text-align: center">{{$key+1}}</td>
                                        <td class="success">{{$ct->mota}}</td>
                                        <td style="text-align: center">{{$ct->dvt}}</td>
                                        <td style="text-align: right">{{dinhdangsothapphan($ct->gia,5)}}</td>
                                        <td>
                                            <button type="button" data-target="#edit-modal" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="edittt({{$ct->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>
                                            <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$ct->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('giaspdvci')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i>Cập nhập</button>
            </div>
        </div>
    </div>
    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Mô tả</b><span class="require">*</span></label>
                                <div><textarea id="mota" name="mota" class="form-control" cols="5" rows="5"></textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right; font-weight: bold" id="dvt" name="dvt" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Mức giá</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right; font-weight: bold" id="gia" name="gia" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="ClickCreate()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin</h4>
                </div>
                <div class="modal-body" id="edit_node">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Mô tả</label>
                                <textarea name="edit_mota" id="edit_mota" class="form-control" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính</label>
                                <input name="edit_dvt" id="edit_dvt" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn giá<span class="require">*</span></label>
                                {!!Form::text('edit_gia',null, array('id' => 'edit_gia','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" id="edit_id">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="ClickUpdate()">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!--Model Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa thông tin?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="delrow()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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

            if($('#ngayqd').val()==''){
                strb1 += '  - Ngày áp dụng <br>';
                ok = false;
            }

            if($('#ttqd').val()==''){
                strb1 += '  - Thông tin quyết định <br>';
                ok = false;
            }


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