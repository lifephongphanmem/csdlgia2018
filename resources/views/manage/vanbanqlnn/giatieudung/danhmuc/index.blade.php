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
            $("#giadat").treetable();
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
        Thông tin các mặt hàng <small></small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create-lv1" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Nhóm hàng hóa</button>
                        <button type="button" class="btn btn-default btn-xs mbs" id="expand" onclick="expand()"><i class="fa fa-angle-double-down"></i>&nbsp;Expand All</button>
                        <button type="button" class="btn btn-default btn-xs mbs" id="collapse" onclick="collapse()"><i class="fa fa-angle-double-up"></i>&nbsp;Collapse All</button>

                    </div>
                </div>
                <div class="portlet-body">
                    <table id="example-advanced" class="treetable">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="15%">Mã hàng hóa</th>
                            <th style="text-align: center">Tên hàng hóa</th>
                            <th style="text-align: center" width="10%">Quyền số</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $model_cap1 = $model->where('capdo','1'); ?>
                        @foreach($model_cap1 as $cap1)
                            <tr data-tt-id="{{$cap1->mahh}}" style="display: none">
                                <td>{{$cap1->mahh}}</td>
                                <td>{{$cap1->tenhh}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->quyenso,2)}}</td>
                                <td>
                                    <button type="button" onclick="addchirld('{{$cap1->capdo}}','{{$cap1->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                    <button type="button" onclick="editvitri('{{$cap1->id}}','{{$cap1->capdo}}')" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Sửa</button>

                                    @if($cap1->b_xoa)
                                        <button type="button" onclick="confirmDelete('{{$cap1->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $model_cap2 = $model->where('capdo','2')->where('magoc',$cap1->mahh); ?>
                            @foreach($model_cap2 as $cap2)
                                <tr data-tt-id="{{$cap2->mahh}}" data-tt-parent-id="{{$cap2->magoc}}">
                                    <td>{{$cap2->mahh}}</td>
                                    <td>{{$cap2->tenhh}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->quyenso, 2)}}</td>
                                    <td>
                                        <button type="button" onclick="addchirld('{{$cap2->capdo}}','{{$cap2->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                        <button type="button" onclick="editvitri('{{$cap2->id}}','{{$cap2->capdo}}')" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Sửa</button>

                                        @if($cap2->b_xoa)
                                            <button type="button" onclick="confirmDelete('{{$cap2->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        @endif
                                    </td>
                                </tr>
                                <?php $model_cap3 = $model->where('capdo','3')->where('magoc',$cap2->mahh); ?>
                                @foreach($model_cap3 as $cap3)
                                    <tr data-tt-id="{{$cap3->mahh}}" data-tt-parent-id="{{$cap3->magoc}}">
                                        <td>{{$cap3->mahh}}</td>
                                        <td>{{$cap3->tenhh}}</td>
                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->quyenso, 2)}}</td>
                                        <td>
                                            <button type="button" onclick="addchirld('{{$cap3->capdo}}','{{$cap3->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                            <button type="button" onclick="editvitri('{{$cap3->id}}','{{$cap3->capdo}}')" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Sửa</button>

                                            @if($cap3->b_xoa)
                                                <button type="button" onclick="confirmDelete('{{$cap3->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $model_cap4 = $model->where('capdo','4')->where('magoc',$cap3->mahh); ?>
                                    @foreach($model_cap4 as $cap4)
                                        <tr data-tt-id="{{$cap4->mahh}}" data-tt-parent-id="{{$cap4->magoc}}">
                                            <td>{{$cap4->mahh}}</td>
                                            <td>{{$cap4->tenhh}}</td>
                                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->quyenso)}}</td>
                                            <td>
                                                <button type="button" onclick="editvitri('{{$cap4->id}}','{{$cap4->capdo}}')" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Sửa</button>

                                                @if($cap4->b_xoa)
                                                    <button type="button" onclick="confirmDelete('{{$cap4->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                @endif
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
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <div id="modal-create-lv1" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thông tin nhóm hàng hóa</h4>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Mã hàng hóa<span class="require">*</span></label>
                    <input type="text" id="mahh_nhom" class="form-control" name="mahh_nhom" required="required" />

                    <label class="form-control-label">Tên nhóm hàng hóa<span class="require">*</span></label>
                    <textarea id="tenhh_nhom" class="form-control" name="tenhh_nhom" rows="3" required="required"></textarea>

                    <label class="form-control-label">Quyền số<span class="require">*</span></label>
                    <input type="text" id="quyenso_nhom" class="form-control" name="quyenso_nhom" value="0" required="required" />
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="createvitri1()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal node thêm-->
    <div id="modal-add-chirld" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới thông tin vị trí</h4>
                </div>
                <div class="modal-body" id="addchird">
                    <label class="form-control-label">Mã gốc<span class="require">*</span></label>
                    <input type="text" id="magoc_sub" class="form-control" name="magoc_sub" readonly />

                    <label class="form-control-label">Cấp độ<span class="require">*</span></label>
                    <input type="text" id="capdo_sub" class="form-control" name="capdo_sub" required="required" />

                    <label class="form-control-label">Mã hàng hóa<span class="require">*</span></label>
                    <input type="text" id="mahh_sub" class="form-control" name="mahh_sub" required="required" />

                    <label class="form-control-label">Tên nhóm hàng hóa<span class="require">*</span></label>
                    <textarea id="tenhh_sub" class="form-control" name="tenhh_sub" rows="3" required="required"></textarea>

                    <label class="form-control-label">Quyền số<span class="require">*</span></label>
                    <input type="text" id="quyenso_sub" class="form-control" name="quyenso_sub" value="0" required="required" />

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="createchirld()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal node edit-->
    <div id="modal-edit-node" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin vị trí</h4>
                </div>
                <div class="modal-body" id="edit_node">
                    <label class="form-control-label">Tên khu vực / vị trí<span class="require">*</span></label>
                    <textarea id="edit_vitri" class="form-control" name="edit_vitri" rows="3" required="required"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="updatevitri()">Đồng ý</button>
                </div>
            </div>
        </div>
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