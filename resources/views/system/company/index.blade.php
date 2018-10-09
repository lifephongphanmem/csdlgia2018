@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
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
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }
        $(function(){
            $('#level').change(function() {
                var current_path_url = '/company?';
                var pl = '&level='+$('#level').val();
                var url = current_path_url+pl;
                window.location.href = url;
            });
        })
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Danh sách doanh nghiệp<small>&nbsp;cung cấp hàng hoá,dịch vụ</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <!--div class="portlet-title">
                    <div class="actions">
                        <a href="{{url('company/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div-->
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="level" id="level">
                                    @if(canGeneral('dvlt','dvlt') )
                                        @if(can('ttdn','dvlt'))
                                        <option value="DVLT" {{($level == "DVLT") ? 'selected' : ''}}>Dịch vụ lưu trú</option>
                                        @endif
                                    @endif
                                    @if(canGeneral('dvvt','vtxk') || canGeneral('dvvt','vtxb') || canGeneral('dvvt','vtxtx') || canGeneral('dvvt','vtch'))
                                        @if(can('ttdn','dvvt'))
                                        <option value="DVVT" {{($level == "DVVT") ? 'selected' : ''}}>Dịch vụ vận tải</option>
                                        @endif
                                    @endif
                                    @if(canGeneral('dvgs','dvgs'))
                                        @if(can('ttdn','dvgs'))
                                        <option value="DVGS" {{($level == "DVGS") ? 'selected' : ''}}>Mặt hàng sữa</option>
                                        @endif
                                    @endif
                                    @if(canGeneral('dvtacn','dvtacn'))
                                        @if(can('ttdn','dvtacn'))
                                        <option value="DVTACN" {{($level == "DVTACN") ? 'selected' : ''}}>Thức ăn chăn nuôi</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center" width="30%">Tên đơn vị</th>
                            <th style="text-align: center">Mã số thuế</th>
                            <th style="text-align: center" width="20%">Địa chỉ</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td class="active" >{{$tt->tendn}}</td>
                            <td>{{$tt->maxa}}</td>
                            <td style="text-align: center">{{$tt->diachi}}</td>
                            <td>
                                <a href="{{url('company/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                <!--button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                    Xóa</button-->
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
    <div class="clearfix"></div>
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url'=>'district/delete','id' => 'frm_delete'])!!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Đồng ý xóa?</h4>
                    </div>
                    <input type="hidden" name="iddelete" id="iddelete">
                    <div class="modal-footer">
                        <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>



@stop