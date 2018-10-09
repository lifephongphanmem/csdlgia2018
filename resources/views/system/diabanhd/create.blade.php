@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin địa danh<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'danhmucdiadanh', 'id' => 'create_diaban', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                @if($level == 'X')
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Quận/huyện<span class="require">*</span></label>
                                        <select class="form-control" name="district" id="district">
                                            @foreach($districts as $tt)
                                                <option value="{{$tt->district}}">{{$tt->diaban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mã địa bàn quận/huyện<span class="require">*</span></label>
                                            <input type="text" class="form-control required" name="district" id="district"/>
                                        </div>
                                    </div>
                                @endif
                                <!--/span-->
                            </div>
                            <div class="row">
                                @if($level == 'X')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mã địa bàn xã/phường<span class="require">*</span></label>
                                            <input type="text" class="form-control required" name="town" id="town"/>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa bàn<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="diaban" id="diaban"/>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="level" name="level" value="{{$level}}">
                        </div>
                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('danhmucdiadanh?&level='.$level)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_diaban").validate({
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
        $('input[name="username"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/ajax/checkhuyenhoatdong',
                data: {
                    _token: CSRF_TOKEN,
                    username:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại username", "Username nhập vào đã tồn tại!!!");
                        $('input[name="username"]').val('');
                        $('input[name="username"]').focus();
                    }else
                        toastr.success("Username sử dụng được!", "Thành công!");
                }

            });
        });
        $('input[name="maxa"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/ajax/checkmaqhns',
                data: {
                    _token: CSRF_TOKEN,
                    maqhns:$(this).val(),
                    pl:'town'
                },
                dataType: 'JSON',
                success: function (data) {

                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã quan hệ ngân sách", "Mã quan hệ ngân sách nhập vào đã tồn tại!!!");
                        $('input[name="maxa"]').val('');
                        $('input[name="maxa"]').focus();
                    }else{
                        toastr.success("Mã quan hệ ngân sách sử dụng được!", "Thành công!");
                    }
                }

            });
        });
    </script>
    @include('includes.script.create-header-scripts')
@stop