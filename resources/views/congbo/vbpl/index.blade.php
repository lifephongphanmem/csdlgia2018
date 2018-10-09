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

    </script>

    <script>
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtu-quyetdinh-tw/dinhkem',
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
        <div class="row margin-top-10">
            <div class=" col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font hide"></i>
                            <span class="caption-subject theme-font bold uppercase">thông tin văn bản pháp luật quy định về giá</span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th width="2%" style="text-align: center">STT</th>
                                <th style="text-align: center">Đơn vị</br>ban hành</th>
                                <th style="text-align: center" width="10">Loại văn</br>bản</th>
                                <th style="text-align: center" width="15%">Ngày ban hành/<br>Ngày áp dụng</th>
                                <th style="text-align: center">Số hiệu văn bản</th>
                                <th style="text-align: center">Nội dung</th>
                                <th style="text-align: center" width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td style="text-align: center">{{$key + 1}}</td>
                                    <td class="active">{{$tt->dvbanhanh}}</td>
                                    <td style="text-align: center">{{$tt->tenloaivanban}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->ngaybh)}} || {{getDayVn($tt->ngayad)}}</td>
                                    <td class="success">{{$tt->khvb}}</td>
                                    <td>{{$tt->tieude}}</td>
                                    <td>

                                        <button type="button" onclick="get_attack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            <i class="fa fa-download"></i> Tải tệp</button>
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
    @include('includes.e.modal-attackfile')
@stop 