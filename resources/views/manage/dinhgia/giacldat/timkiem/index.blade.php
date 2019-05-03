@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/-->
    <!-- BEGIN THEME STYLES -->
    <!--link href="{{url('assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{url('assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/-->
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!--script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script-->
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        $(function(){
            $('#mahuyen').change(function() {
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var url = 'timkiemthongtingiacacloaidat?'+mahuyen;
                window.location.href = url;
            });
            $('#soqd').change(function() {
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var soqd = '&soqd='+ $('#soqd').val();
                var url = 'timkiemthongtingiacacloaidat?' + mahuyen + soqd;
                window.location.href = url;
            });
            $('#vitri').change(function() {
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var soqd = '&soqd='+ $('#soqd').val();
                var vitri = '&vitri=' + $('#vitri').val();
                var url = 'timkiemthongtingiacacloaidat?' + mahuyen + soqd + vitri;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin <small>&nbsp;giá các loại đất</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Địa bàn quản lý</label>
                            <div class="form-group">
                                <select name="mahuyen" id="mahuyen" class="form-control">
                                    @foreach($modeldiaban as $ct)
                                        <option value="{{$ct->district}}" {{$ct->district==$mahuyen? 'selected':''}}>{{ $ct->diaban}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <label>Thông tư quyết định</label>
                            <div class="form-group">
                                <select name="soqd" id="soqd" class="form-control">
                                    <option value="">--Chọn thông tư quyết định--</option>
                                    @foreach($modelqdgiadat as $ct)
                                        <option value="{{$ct->soquyetdinh}}" {{$ct->soquyetdinh==$soqd? 'selected':''}}>{{ $ct->mota}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label>Khu vực/vị trí</label>
                            <div class="form-group">
                                {!! Form::text('vitri',$vitri, array('id'=>'vitri','class'=>'form-control'))!!}
                            </div>
                        </div>

                    </div>
                    <div class="table-toolbar">
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <!--th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th-->
                            <th width="2%" style="text-align: center" rowspan="2">STT</th>
                            <th style="text-align: center" rowspan="2">Địa bàn</th>
                            <th style="text-align: center" rowspan="2">Vị trí</th>
                            <th style="text-align: center" width="10%" rowspan="2">Căn cứ quyết định</th>
                            <th style="text-align: center" colspan="4">Giá đất</th>
                        </tr>
                        <tr>
                            <th>VT1</th>
                            <th>VT2</th>
                            <th>VT3</th>
                            <th>VT4</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{$tt->hienthi}}</td>
                                <td class="success">{{$tt->vitri}}</td>
                                <td class="text-center">{{$tt->soqd}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt1)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt2)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt3)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt4)}}</td>
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
    <div class="modal fade" id="delete-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmqdgiadat/delete','id' => 'frm_delete'])!!}
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
    <script>
        function ClickDelete(){
            $('#frm-demlete').submit();
        }
    </script>
@stop