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
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
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

@section('content-cb')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption caption-md font-blue">
                            <i class="icon-share font-blue"></i>
                            <span class="caption-subject theme-font bold uppercase">VĂN BẢN QUẢN LÝ NHÀ NƯỚC VỀ GIÁ, PHÍ LỆ PHÍ</span>
                        </div>
                    </div>
                    <div class="portlet-body" >
                        <div class="scroller" style="height: 308px;" data-always-visible="1" data-rail-visible="0"  style="min-height: 587px" >
                            <ul class="feeds">
                                @foreach($model as $tt)
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc" id="tentb" name="tentb">
                                                            <button onclick="get_attack('{{$tt->id}}')"  style="color: #ff0000;border: none;background-color: #fafafa; text-align: left" data-target="#dinhkem-modal-confirm" data-toggle="modal">&nbsp;{{$tt->tieude}} &emsp; </button><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col2">
                                                <div class="date" style="color: #808080">
                                                    {{getDayVn($tt->ngaybanhanh)}}
                                                </div>
                                            </div>

                                        </li>
                                @endforeach
                            </ul>
                        </div>
                        <hr>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right">
                                <a href="{{url('cbvanbanqlnnvegia')}}">Xem tất cả</a>
                                <i class="icon-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>

        </div>
        <div class="col-md-12">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right">Tổng cộng&nbsp;
                <span class="badge badge-success badge-roundless">{{number_format($viewpage)}}</span></a>&nbsp;lượt truy cập
            </div>
        </div>
    </div>
    @include('includes.e.modal-attackfile')
@stop 