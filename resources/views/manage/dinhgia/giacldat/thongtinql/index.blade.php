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
            $('#district').change(function() {
                var district =  $('#district').val();
                var url = 'thongtingiacacloaidat?&district='+district;
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
        Thông tin giá đất <small> theo vị trí</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create-lv1" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Khu vục/Vị trí Nhóm I</button>
                    </div>
                </div>
                <div class="portlet-body">
                    @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <select name="district" id="district" class="form-control">
                                    @foreach($model_diaban as $diaban)
                                        <option value="{{$diaban->district}}" {{$diaban->district == $district ? 'selected' :'' }}>{{$diaban->diaban}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <button id="expand" onclick="expand()">Expand All</button>
                                <button id="collapse" onclick="collapse() ">Collapse All</button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="district" id="district" value="{{$district}}">

                    <table id="example-advanced" class="treetable">
                        <thead>
                        <tr>
                            <th style="text-align: center">Vị trí đất</th>
                            <th style="text-align: center" width="10%">Căn cứ quyết định</th>
                            <th style="text-align: center" width="10%">Giá đất</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $model_cap1 = $model->where('capdo','1'); ?>
                        @foreach($model_cap1 as $cap1)
                            <tr data-tt-id="{{$cap1->maso}}" style="display: none">
                                <td>{{$cap1->vitri}}</td>
                                <td>{{$cap1->soqd}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->giadat)}}</td>
                                <td>
                                    @if(can('kkgiacldat','create'))
                                    <button type="button" onclick="addchirld('{{$cap1->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                    @endif
                                    @if(can('kkgiacldat','edit'))
                                    <button type="button" onclick="editvitri('{{$cap1->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                    @endif
                                    @if($cap1->b_xoa)
                                        @if(can('kkgiacldat','delete'))
                                        <button type="button" onclick="confirmDelete('{{$cap1->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <?php $model_cap2 = $model->where('magoc',$cap1->maso); ?>
                            @foreach($model_cap2 as $cap2)
                                <tr data-tt-id="{{$cap2->maso}}" data-tt-parent-id="{{$cap2->magoc}}">
                                    <td>{{$cap2->vitri}}</td>
                                    <td>{{$cap2->soqd}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->giadat)}}</td>
                                    <td>
                                        @if(can('kkgiacldat','create'))
                                        <button type="button" onclick="addchirld('{{$cap2->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                        @endif
                                        @if(can('kkgiacldat','edit'))
                                        <button type="button" onclick="editvitri('{{$cap2->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                        @endif
                                        @if($cap2->b_xoa)
                                            @if(can('kkgiacldat','delete'))
                                            <button type="button" onclick="confirmDelete('{{$cap2->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <?php $model_cap3 = $model->where('magoc',$cap2->maso); ?>
                                @foreach($model_cap3 as $cap3)
                                    <tr data-tt-id="{{$cap3->maso}}" data-tt-parent-id="{{$cap3->magoc}}">
                                        <td>{{$cap3->vitri}}</td>
                                        <td>{{$cap3->soqd}}</td>
                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->giadat)}}</td>
                                        <td>
                                            @if(can('kkgiacldat','create'))
                                            <button type="button" onclick="addchirld('{{$cap3->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                            @endif
                                            @if(can('kkgiacldat','edit'))
                                            <button type="button" onclick="editvitri('{{$cap3->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                            @endif
                                            @if($cap3->b_xoa)
                                                @if(can('kkgiacldat','delete'))
                                                <button type="button" onclick="confirmDelete('{{$cap3->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $model_cap4 = $model->where('magoc',$cap3->maso); ?>
                                    @foreach($model_cap4 as $cap4)
                                        <tr data-tt-id="{{$cap4->maso}}" data-tt-parent-id="{{$cap4->magoc}}">
                                            <td>{{$cap4->vitri}}</td>
                                            <td>{{$cap4->soquyetdinh}}</td>
                                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->giadat)}}</td>
                                            <td>
                                                @if(can('kkgiacldat','create'))
                                                <button type="button" onclick="addchirld('{{$cap4->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                @endif
                                                @if(can('kkgiacldat','edit'))
                                                <button type="button" onclick="editvitri('{{$cap4->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                @endif
                                                @if($cap4->b_xoa)
                                                    @if(can('kkgiacldat','delete'))
                                                    <button type="button" onclick="confirmDelete('{{$cap4->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $model_cap5 = $model->where('magoc',$cap4->maso); ?>
                                        @foreach($model_cap5 as $cap5)
                                            <tr data-tt-id="{{$cap5->maso}}" data-tt-parent-id="{{$cap5->magoc}}">
                                                <td>{{$cap5->vitri}}</td>
                                                <td>{{$cap5->soqd}}</td>
                                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap5->giadat)}}</td>
                                                <td>
                                                    @if(can('kkgiacldat','create'))
                                                    <button type="button" onclick="addchirld('{{$cap5->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                    @endif
                                                    @if(can('kkgiacldat','edit'))
                                                    <button type="button" onclick="editvitri('{{$cap5->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                    @endif
                                                    @if($cap5->b_xoa)
                                                        @if(can('kkgiacldat','delete'))
                                                        <button type="button" onclick="confirmDelete('{{$cap5->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            <?php $model_cap6 = $model->where('magoc',$cap5->maso); ?>
                                            @foreach($model_cap6 as $cap6)
                                                <tr data-tt-id="{{$cap6->maso}}" data-tt-parent-id="{{$cap6->magoc}}">
                                                    <td>{{$cap6->vitri}}</td>
                                                    <td>{{$cap6->soqd}}</td>
                                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap6->giadat)}}</td>
                                                    <td>
                                                        @if(can('kkgiacldat','create'))
                                                        <button type="button" onclick="addchirld('{{$cap6->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                        @endif
                                                        @if(can('kkgiacldat','edit'))
                                                        <button type="button" onclick="editvitri('{{$cap6->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                        @endif
                                                        @if($cap6->b_xoa)
                                                            @if(can('kkgiacldat','delete'))
                                                            <button type="button" onclick="confirmDelete('{{$cap6->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                <?php $model_cap7 = $model->where('magoc',$cap6->maso); ?>
                                                @foreach($model_cap7 as $cap7)
                                                    <tr data-tt-id="{{$cap7->maso}}" data-tt-parent-id="{{$cap7->magoc}}">
                                                        <td>{{$cap7->vitri}}</td>
                                                        <td>{{$cap7->soqd}}</td>
                                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap7->giadat)}}</td>
                                                        <td>
                                                            <!--button type="button" onclick="addchirld('{{$cap7->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-add-chirld" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button-->
                                                            @if(can('kkgiacldat','edit'))
                                                            <button type="button" onclick="editvitri('{{$cap7->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                            @endif
                                                            @if($cap7->b_xoa)
                                                                @if(can('kkgiacldat','delete'))
                                                                <button type="button" onclick="confirmDelete('{{$cap7->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
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
                    <h4 id="modal-header-primary-label" class="modal-title">Tạo Khu vực/Vị trí</h4>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Tên khu vực vị trí<span class="require">*</span></label>
                    <textarea id="vitri1" class="form-control" name="vitri1" rows="3" required="required"></textarea>
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
                    <label class="form-control-label">Tên khu vực / vị trí<span class="require">*</span></label>
                    <textarea id="vitrichirld" class="form-control" name="vitrichirld" rows="3" required="required"></textarea>
                    <input type="hidden" id="idchirld" name="idchirld" value="">
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
        {!! Form::open(['url'=>'thongtingiacacloaidat/delete','id' => 'frm_delete'])!!}
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
            var vitri1=$('#vitri1').val();


            if(vitri1==''){
                valid=false;
                message +='Địa bàn quản lý không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url:  'thongtingiacacloaidat/addlv1',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        vitri: vitri1,
                        mahuyen: $('#district').val()
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

        function addchirld(id) {
            document.getElementById("idchirld").value=id;
        }

        function createchirld(){
            var valid=true;
            var message='';
            var vitrichirld=$('#vitrichirld').val();


            if(vitrichirld==''){
                valid=false;
                message +='Địa bàn quản lý không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url:  'thongtingiacacloaidat/storechirld',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        vitri: vitrichirld,
                        mahuyen: $('#district').val(),
                        id: $('#idchirld').val()
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

        function editvitri(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'thongtingiacacloaidat/editvitri',
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