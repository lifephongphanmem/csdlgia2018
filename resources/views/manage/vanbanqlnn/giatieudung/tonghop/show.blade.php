@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.theme.default.css')}}" />
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{ url('js/jquery.treetable.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('js/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            //$("#giadat").treetable();
            $("#example-advanced").treetable({ expandable: true });
            //$("#example-advanced").treetable('expandAll');
        });

        $(function(){
            $('#manhom').change(function() {
                var manhom =  $('#manhom').val();
                var url = '/dmhanghoacpi/danhsach?manhom='+manhom;
                window.location.href = url;
            });
        })
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
        function clickdelete(){
            $('#frm_delete').submit();
        }
        function expand(){
            $("#example-advanced").treetable('expandAll');
        }
        function collapse(){
            $("#example-advanced").treetable('collapseAll');
        }
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin chỉ số giá tiêu dùng <small> tháng {{$model_hs->thang}} năm {{$model_hs->nam}}</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <button type="button" class="btn btn-default btn-xs mbs" id="expand" onclick="expand()"><i class="fa fa-angle-double-down"></i>&nbsp;Mở tất cả</button>
                        <button type="button" class="btn btn-default btn-xs mbs" id="collapse" onclick="collapse()"><i class="fa fa-angle-double-up"></i>&nbsp;Đóng tất cả</button>
                    </div>
                </div>
                {!! Form::model($model_hs, ['method' => 'POST', 'url'=>'hstonghopcpi/update', 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn']) !!}
                <input type="hidden" name="mahs" id="mahs" value="{{$model_hs->mahs}}" />
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Tháng<span class="require">*</span></label>
                                {!!Form::text('thang',null, array('id' => 'thang','class' => 'form-control required', 'readonly'))!!}
                            </div>
                        </div>
                        <!--/span-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Năm<span class="require">*</span></label>
                                {!!Form::text('nam',null, array('id' => 'nam','class' => 'form-control required', 'readonly'))!!}
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


                    <table id="example-advanced" class="treetable">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="15%">Mã hàng hóa</th>
                            <th style="text-align: center">Tên hàng hóa</th>
                            <th style="text-align: center" width="10%">Quyền số</th>
                            <th style="text-align: center" width="10%">Chỉ số</br>giá</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $model_cap1 = $model->where('capdo','1'); ?>
                        @foreach($model_cap1 as $cap1)
                            <tr data-tt-id="{{$cap1->mahh}}" style="display: none">
                                <td>{{$cap1->mahh}}</td>
                                <td>{{$cap1->tenhh}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->quyenso,2)}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->chiso,2)}}</td>
                                <td>

                                </td>
                            </tr>
                            <?php $model_cap2 = $model->where('capdo','2')->where('magoc',$cap1->mahh); ?>
                            @foreach($model_cap2 as $cap2)
                                <tr data-tt-id="{{$cap2->mahh}}" data-tt-parent-id="{{$cap2->magoc}}">
                                    <td>{{$cap2->mahh}}</td>
                                    <td>{{$cap2->tenhh}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->quyenso, 2)}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->chiso, 2)}}</td>
                                    <td>

                                    </td>
                                </tr>
                                <?php $model_cap3 = $model->where('capdo','3')->where('magoc',$cap2->mahh); ?>
                                @foreach($model_cap3 as $cap3)
                                    <tr data-tt-id="{{$cap3->mahh}}" data-tt-parent-id="{{$cap3->magoc}}">
                                        <td>{{$cap3->mahh}}</td>
                                        <td>{{$cap3->tenhh}}</td>
                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->quyenso, 2)}}</td>
                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->chiso, 2)}}</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <?php $model_cap4 = $model->where('capdo','4')->where('magoc',$cap3->mahh); ?>
                                    @foreach($model_cap4 as $cap4)
                                        <tr data-tt-id="{{$cap4->mahh}}" data-tt-parent-id="{{$cap4->magoc}}">
                                            <td class="text-right">{{$cap4->mahh}}</td>
                                            <td>{{$cap4->tenhh}}</td>
                                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->quyenso)}}</td>
                                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->chiso, 2)}}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--div class="col-md-offset-5 col-md-2">
                    <a class="btn blue" href="{{url('/giathuetn')}}"><i class="fa fa-mail-reply"></i> Quay lại</a>
                </div-->
            </div>

            <div class="row">
                <div style="text-align: center">
                    <!--button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button-->
                    <a href="{{url('hstonghopcpi/danhsach?nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <!--Modal node thêm-->
    <div class="modal fade" id="chuyen-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'kekhaigiadvlt/chuyen','id' => 'frm_chuyen'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý chuyển hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="tthschuyen">
                    </div>
                    <div class="form-group">
                        <label><b>Thông tin người nộp</b></label>
                        <textarea id="ttnguoinop" class="form-control required" name="ttnguoinop" cols="30" rows="5" placeholder="Họ và tên người chuyển- Số ĐT liên lạc- Email lien lạc"></textarea>
                    </div>
                </div>
                <input type="hidden" name="idchuyen" id="idchuyen">
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickChuyen()">Đồng ý</button>

                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!--Model delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'/dmhanghoacpi/delete','id' => 'frm_delete'])!!}
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
        function createvitri1(){
            var valid=true;
            var message='';
            var mahh = $('#mahh_nhom').val();
            var tenhh = $('#tenhh_nhom').val();


            if(mahh == '' || tenhh == ''){
                valid=false;
                message ='Mã hàng hóa và tên hàng hóa không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url:  '/dmhanghoacpi/addnhomhh',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahh: mahh,
                        tenhh: tenhh,
                        quyenso: $('#quyenso_nhom').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                    error: function(message){
                        toastr.error(message);
                    }
                });
            }else{
                toastr.error(message,'Lỗi!.');
            }
        }

        function addchirld(capdo, mahh) {
            $('#magoc_sub').val(mahh);
            $('#mahh_sub').val(mahh+'.');
            $('#capdo_sub').val(parseFloat(capdo) + 1);
            $('#tenhh_sub').val('');
            $('#quyenso_sub').val(0);
        }

        function createchirld(){
            var valid=true;
            var message='';
            var mahh=$('#mahh_sub').val();
            var tenhh=$('#tenhh_sub').val();


            if(mahh=='' || tenhh == ''){
                valid=false;
                message ='Mã hàng hóa và tên hàng hóa không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url:  '/dmhanghoacpi/addhanghoa',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahh: mahh,
                        tenhh: tenhh,
                        quyenso: $('#quyenso_sub').val(),
                        capdo: $('#capdo_sub').val(),
                        magoc: $('#magoc_sub').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                    error: function(message){
                        toastr.error(message);
                    }
                });
            }else{
                toastr.error(message,'Lỗi!.');
            }
        }

        function editvitri(id, capdo) {
            if(capdo == 1){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/dmhanghoacpi/editnhomhh',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $('#mahh_nhom').val(data.mahh);
                        $('#tenhh_nhom').val(data.tenhh);
                        $('#quyenso_nhom').val(data.quyenso);
                    },
                    error: function (message) {
                        toastr.error(message, 'Lỗi!');
                    }
                });
                $('#modal-create-lv1').modal('show');
            }else{
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/dmhanghoacpi/editnhomhh',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        $('#mahh_sub').val(data.mahh);
                        $('#magoc_sub').val(data.magoc);
                        $('#tenhh_sub').val(data.tenhh);
                        $('#capdo_sub').val(data.capdo);
                        $('#quyenso_sub').val(data.quyenso);
                    },
                    error: function (message) {
                        toastr.error(message, 'Lỗi!');
                    }
                });
                $('#modal-add-chirld').modal('show');
            }


        }

        function updatevitri(){
            var valid=true;
            var message='';
            var vitri=$('#edit_vitri').val();


            if(vitri==''){
                valid=false;
                message +='Địa bàn quản lý không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: 'thongtingiacacloaidat/updatevitri',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        vitri: vitri,
                        id: $('#idedit').val(),
                        giadat: $('#edit_giadat').val(),
                        soqd: $('#edit_soquyetdinh').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                    error: function(message){
                        toastr.error(message);
                    }
                });
                $('#modal-node-them').modal('hide');
            }else{

                toastr.error(message,'Lỗi!.');
            }
        }
    </script>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop