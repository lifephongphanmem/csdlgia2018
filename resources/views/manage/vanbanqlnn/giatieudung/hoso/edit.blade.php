@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });

    </script>
    @include('includes.crumbs.script_inputdate')
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/hsgiacpi/get_chitiet',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#mahh_edit').val(data.mahh);
                    $('#tenhh_edit').val(data.tenhh);
                    $('#giatu_edit').val(data.giatu);
                    $('#giaden_edit').val(data.giaden);
                    $('#id_edit').val(data.id);
                }
            })
        }

        function updatets(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/hsgiacpi/update_chitiet',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:$('#id_edit').val(),
                    giatu: $('#giatu_edit').val(),
                    giaden: $('#giaden_edit').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin hàng hóa thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-wide-width').modal("hide");

                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }

        function deleteRow(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giathuetn/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin tài nguyên thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    //}
                }
            })
        }

    </script>
    <script>
        function InputMask() {
            //$(function(){
            // Input Mask
            if ($.isFunction($.fn.inputmask)) {
                $("[data-mask]").each(function (i, el) {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if (placeholder.length) {
                        opts[placeholder] = placeholder;
                    }

                    switch (mask.toLowerCase()) {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');
                            ;

                            mask = "999,999,999.99";

                            if ($this.data('mask').toLowerCase() == 'rcurrency') {
                                mask += ' ' + sign;
                            }
                            else {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup: true,
                                groupSize: 3,
                                radixPoint: attrDefault($this, 'rad', '.'),
                                groupSeparator: attrDefault($this, 'dec', ',')
                            });
                    }

                    if (is_regex) {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin giá hàng hóa tiêu dùng<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'POST', 'url'=>'hsgiacpi/update', 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn']) !!}
                    <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}" />
                    <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                        {!!Form::text('tgnhap',date('d/m/Y',  strtotime($model->tgnhap)), array('id' => 'tgnhap','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Số quyết định<span class="require">*</span></label>
                                        {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nội dung chi tiết</label>
                                        {!!Form::textarea('noidung',null, array('id' => 'noidung','class' => 'form-control', 'rows'=>'3'))!!}
                                    </div>

                                </div>
                            </div>


                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>

                            <div class="row" id="dsts">
                                <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Mã số</th>
                                                <th style="text-align: center">Tên hàng hóa</th>
                                                <th>Giá liền kề</th>
                                                <th>Giá hàng hóa</th>
                                                <th style="text-align: center" width="15%">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        @if(isset($model_hh))
                                            @foreach($model_hh as $key=>$tt)
                                                <tr>
                                                    <td style="text-align: center">{{$key +1}}</td>
                                                    <td>{{$tt->mahh}}</td>
                                                    <td class="active">{{$tt->tenhh}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giatu)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giaden)}}</td>
                                                    <td>
                                                        <button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                        <!--button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow({{$tt->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button-->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                                        @endif
                                        </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <div class="row">
                <div style="text-align: center">
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('hsgiacpi/danhsach?thang='.$model->thang.'&nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_ttgiahhdvtn").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('button[name="capnhatts"]').click(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/giathuetn/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        masopnhom: $('#mapnhom').val(),
                        mahh: $('#mahh').val(),
                        giatu: $('#giatu').val(),
                        giaden: $('#giaden').val(),
                        soluong: $('#soluong').val(),
                        nguontin: $('#nguontin').val(),
                        gc: $('textarea[name="gc"]').val(),
                        mahs: $('#mahs').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin giá tài nguyên thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
                            $('#mapnhom').val('');
                            $('#mahh').val('');
                            $('#mahh').children().remove().end().append('<option selected value="">--Chọn tài nguyên--</option>') ;
                            $('#mahh').select2({placeholder: '--Chọn tài nguyên--'});
                            $('#giatu').val('0');
                            $('#giaden').val('0');
                            $('#soluong').val('1');
                            $('#nguontin').val('');
                            $('#gc').val('');

                            $('#mapnhom').focus();
                        }
                        else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#mapnhom').focus();
                        }
                    }
                })
            });

        }(jQuery));
    </script>

    <!--Modal Wide Width-->
    <div class="modal fade bs-modal-lg" id="modal-wide-width" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin hàng hóa dịch vụ</h4>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Mã hàng hòa<span class="require">*</span></label>
                    <input type="text" id="mahh_edit" class="form-control" name="mahh_edit" readonly />

                    <label class="form-control-label">Tên hàng hóa<span class="require">*</span></label>
                    <input type="text" id="tenhh_edit" class="form-control" name="tenhh_edit" required="required" />

                    <label class="form-control-label">Giá liền kề<span class="require">*</span></label>
                    <input type="text" id="giatu_edit" class="form-control" name="giatu_edit" data-mask="fdecimal" />

                    <label class="form-control-label">Giá hàng hóa<span class="require">*</span></label>
                    <input type="text" id="giaden_edit" class="form-control" name="giaden_edit" data-mask="fdecimal" />

                    <input type="hidden" id="id_edit" name="id_edit" >
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
@stop