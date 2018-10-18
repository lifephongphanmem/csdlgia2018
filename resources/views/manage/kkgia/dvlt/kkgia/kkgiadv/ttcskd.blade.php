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
        $(function(){

            $('#namhs').change(function() {
                var nam = $('#namhs').val();
                var masothue = $('#masothue').val();
                var url = '/ke_khai_gia_sua?&masothue='+masothue+'&nam='+nam;

                window.location.href = url;
            });

        });
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }

        function confirmCopy(macskd){
            document.getElementById("macskdcp").value=macskd;
        }

        function confirmChuyen(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/kkgdvgs/checkngay',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error(data.message);
                        $('#chuyen-modal').modal("hide");
                    }else{
                        document.getElementById("idchuyen").value =id;
                    }
                }
            })


        }
        function confirmChuyenHSCham(id){
            document.getElementById("idchuyenhscham").value=id;
        }

        function ClickChuyenHsCham(){
            $('#frm_chuyenhscham').submit();
        }

        function ClickChuyen(){
            if($('#ttnguoinop').val() != ''){
                toastr.success("Hồ sơ đã được chuyển!", "Thành công!");
                $('#frm_chuyen').submit();
            }else{
                toastr.error("Bạn cần nhập thông tin người chuyển", "Lỗi!!!");
            }

        }

        function viewLyDo(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/kkgdvgs/viewlydo',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#showlydo').replaceWith(data.message);
                    }
                }
            })
        }


    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin cơ sở kinh doanh<small>&nbsp; dịch vụ lưu trú</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Tên cơ sở kinh doanh</th>
                            <th style="text-align: center">Loại hạng</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td class="active">{{$tt->tencskd}}</td>
                                <td style="text-align: center">{{$tt->loaihang}}</td>
                                <td>{{$tt->diachikd}}</td>
                                <td>
                                    <a href="{{url('kekhaigiadvlt/?&macskd='.$tt->macskd)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Kê khai giá dịch vụ lưu trú</
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
@stop