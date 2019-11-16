@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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
        $(function(){

            $('#phanloai').change(function() {
                var phanloai = '&phanloai=' +$('#phanloai').val();
                var url = 'vanbanqlnnvegia?'  + phanloai;
                window.location.href = url;
            });
            $('#loaivb').change(function() {
                var phanloai = '&phanloai=' +$('#phanloai').val();
                var loaivb = '&loaivb=' +$('#loaivb').val();
                var url = 'vanbanqlnnvegia?'  + phanloai + loaivb;
                window.location.href = url;
            });
        })
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/vanbanqlnnvegia/dinhkem',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#dinh_kem').replaceWith(data.message);
                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Văn bản quản lý nhà nước<small>&nbsp;về giá, phí lệ phí</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                    <div class="portlet-title">
                        <div class="caption">
                        </div>
                        <div class="actions">
                            @if(can('vbgia','create'))
                            <a href="{{url('vanbanqlnnvegia/create')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới </a>
                            @endif

                            <!--a href="" class="btn btn-default btn-sm">
                                <i class="fa fa-print"></i> Print </a-->
                        </div>
                    </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control" name="phanloai" id="phanloai">
                                    <option value="gia" {{$inputs['phanloai'] == 'gia' ? 'selected' : ''}}>Văn bản về Giá</option>
                                    <option value="philephi"{{$inputs['phanloai'] == 'philephi' ? 'selected' : ''}}>Văn bản Phí lệ phí</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Loại văn bản</label>
                                {!! Form::select('loaivb',getLoaiVbQlNn(),$inputs['loaivb'], ['id' => 'loaivb','class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center" width="15%">Đơn vị ban hành</th>
                            <th style="text-align: center" width="10%">Số hiệu văn bản</th>
                            <th style="text-align: center">Nội dung</th>
                            <th style="text-align: center" width="10%">Ngày ban hành</th>
                            <th style="text-align: center" width="10%">Ngày áp dụng</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->dvbanhanh}}</td>
                                <td class="success">{{$tt->kyhieuvb}}</td>
                                <td>{{$tt->tieude}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaybanhanh)}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                <td>
                                    @if(can('vbgia','edit'))
                                    <a href="{{url('vanbanqlnnvegia/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                    @endif
                                    <button type="button" onclick="get_attack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-cloud-download"></i>&nbsp;Tải tệp</button>
                                    @if(can('vbgia','delete'))
                                    <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                        Xóa</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    @include('includes.e.modal-attackfile')
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'vanbanqlnnvegia/delete','id' => 'frm_delete'])!!}
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
        function clickdelete(){
            $('#frm_delete').submit();
        }
    </script>

@stop