@extends('maincongbo')

@section('custom-style-cb')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script-cb')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{url('assets/admin/pages/scripts/table-managed-class.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
    <script>
        function getTT(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ajax/showttkkdvtacn',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:  id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#ttshow').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManagedclass.init();
                        });
                    }
                }
            })
        }
    </script>
@stop

@section('content-cb')
    {{ csrf_field() }}
    <div class="container">
        <div class="note note-info note-bordered">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-responsive"
                         src="{{ url('images/avatar/'.$modeldn->avatar)}}" width="150">
                </div>
                <div class="col-md-8">
                    <h3><b>{{$modeldn->tendn}}</b></h3>
                    <ul class="contact-info">
                        @if($modeldn->link !='')
                            <li><i class="glyphicon glyphicon-cloud-upload"></i><a href="http://{{$modeldn->link}}" target="_blank"> Trang chủ</a> </li>
                        @endif
                        <li><i class="glyphicon glyphicon-map-marker"></i> {{$modeldn->diachi}}</li>
                        <li><i class="glyphicon glyphicon-earphone"></i> {{$modeldn->tel}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row margin-top-10">
            <div class=" col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font hide"></i>
                            <span class="caption-subject theme-font bold uppercase">Thông tin hồ sơ kê khai mặt hàng sữa</span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="10%">Số hồ sơ</th>
                                <th style="text-align: center" width="30%">Ngày áp dụng</th>
                                <th style="text-align: center" width="10%">Số hồ sơ liền kề</th>
                                <th style="text-align: center" width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td style="text-align: center">{{$tt->socv}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->ngayhieuluc)}}</td>
                                    <td style="text-align: center">{{$tt->socvlk}}</td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-xs mbs" data-toggle="modal" data-target="#modal-show" onclick="getTT({{$tt->id}})"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <a href="{{url('giathucanchannuoi/'.$modeldn->maxa)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
    </div>
    <div class="clearfix">
    </div>

    <div class="modal fade bs-modal-lg" id="modal-show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thông tin kê khai giá</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="ttshow"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop 