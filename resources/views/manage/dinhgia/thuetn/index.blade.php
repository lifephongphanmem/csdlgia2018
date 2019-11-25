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
        function getId(id) {
            document.getElementById("iddelete").value=id;
        }
        function getIdHt(id) {
            document.getElementById("idhoanthanh").value=id;
        }
        function getIdHHt(id){
            document.getElementById("idhuyhoanthanh").value=id;
        }
        function getIdCb(id){
            document.getElementById("idcongbo").value=id;
        }
        function getIdHcb(id){
            document.getElementById("idhuycongbo").value=id;
        }

        $(function(){
            $('#manhom').change(function() {
                var manhom = '&manhom='+ $('#manhom').val();
                var url = '/thuetainguyen?' + manhom;
                window.location.href = url;
            });
        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin Bảng giá<small style="color: blue;font-weight: bold"> tính thuế tài nguyên trên địa bàn</small>
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
                        @if(can('kkgiathuetn','create'))
                            <button type="button" class="btn btn-default btn-sm" data-target="#create-modal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Thêm mới</button>
                            <a href="{{url('thuetainguyen/nhandulieutuexcel')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-file-excel-o"></i> Nhận dữ liệu</a>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-filemau"><i class="fa fa-cloud-download"></i>
                                &nbsp;Xuất dữ liệu</button>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nhóm tài nguyên</label>
                                <select name="manhom" id="manhom" class="form-control">
                                    <option value="all">--Tất cả các nhóm tài nguyên--</option>
                                    @foreach($modeldm as $dm)
                                        <option value="{{$dm->manhom}}" {{$dm->manhom == $inputs['manhom'] ? 'selected' : ''}}>{{$dm->tennhom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Năm ban hành</th>
                            <th style="text-align: center">Số quyết định</th>
                            <th style="text-align: center">Ngày quyết định</th>
                            <th style="text-align: center">Nhóm tài nguyên</th>
                            <th style="text-align: center" width="10%">Trạng thái</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="text-align: center">{{$tt->nam}}</td>
                                <td style="text-align: center">{{$tt->soqd}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayqd)}}</td>
                                <td style="text-align: left">{{$tt->tennhom}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'CB')
                                        <span class="badge badge-warning">Công bố</span>
                                    @elseif($tt->trangthai == 'CHT')
                                        <span class="badge badge-danger">Chưa hoàn thành</span>
                                    @else
                                        <span class="badge badge-blue">Hoàn thành</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('thuetainguyen/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($tt->trangthai == 'CB')
                                        {{--Công bố--}}
                                        @if(can('kkgiathuetn','congbo'))
                                            <button type="button" onclick="getIdHcb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huycongbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy công bố</button>
                                        @endif
                                    @elseif($tt->trangthai == 'CHT')
                                        {{--Chưa hoàn thành--}}
                                        @if(can('kkgiathuetn','edit'))
                                            <a href="{{url('thuetainguyen/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                        @endif
                                        @if(can('kkgiathuetn','delete'))
                                            <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#destroy-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        @endif
                                        @if(can('kkgiathuetn','approve'))
                                            <button type="button" onclick="getIdHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Hoàn thành</button>
                                        @endif
                                    @else
                                        {{--Hoàn thành--}}
                                        @if(can('kkgiathuetn','congbo'))
                                            <button type="button" onclick="getIdCb('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-send"></i>&nbsp;Công bố</button>
                                            <button type="button" onclick="getIdHHt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal" data-toggle="modal" style="margin: 2px"><i class="fa fa-times"></i>&nbsp;Hủy Hoàn thành</button>
                                        @endif
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
    @include('manage.dinhgia.thuetn.include.modal')

@stop