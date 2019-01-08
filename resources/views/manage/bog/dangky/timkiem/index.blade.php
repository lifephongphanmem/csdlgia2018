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
            $('#nam').change(function() {
                var  ma = 'ma='+ $('#phanloai').val()
                var namhs = '&nam='+ $('#nam').val();
                var url = '/timkiem?'+ma+namhs;
                window.location.href = url;
            });
            $('#madn').change(function() {
                var  ma = 'ma='+ $('#phanloai').val()
                var namhs = '&nam='+ $('#nam').val();
                var madn = '&madn=' + $('#madn').val();
                var url = '/timkiem?'+ ma + namhs + madn;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Tìm kiếm thông tin đăng ký giá<small>&nbsp;</small>
    </h3>
    <div class="row">
        <div class="col-md-2">
            <input type="hidden" name="phanloai" id="phanloai" value="{{$ma}}">
            <div class="form-group">
                <select name="nam" id="nam" class="form-control">
                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                    @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <select class="form-control" name="madn" id="madn">
                    <option value="">--Chọn doanh nghiệp--</option>
                    @foreach($m_dn as $tt)
                        <option value="{{$tt->maxa}}" {{$tt->maxa == $inputs['madn'] ? 'selected' : ''}}>{{$tt->tendn}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>


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
                            <th style="text-align: center ; margin: auto" width="2%">STT</th>
                            <th style="text-align: center" width="20%">Doanh nghiệp</th>
                            <th style="text-align: center">Ngày thực hiện</th>
                            <th style="text-align: center">Phân loại đăng ký</th>
                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                            <th style="text-align: center">Quy cách chất lượng</th>
                            <th style="text-align: center">Đơn vị tính</th>
                            <th style="text-align: center">Đơn giá</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td class="active"><b>Tên DN: </b> {{$tt->tendn}}
                                    <br><b>Mã số thuế:</b> {{$tt->maxa}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaythuchien)}}</td>
                                <td style="text-align: left">{{$tt->phanloaidkg}}</td>
                                <td style="text-align: left">{{$tt->tenhhdv}}</td>
                                <td style="text-align: left">{{$tt->quycach}}</td>
                                <td style="text-align: left">{{$tt->donvitinh}}</td>
                                <td style="text-align: right">{{number_format($tt->mucgiamoi)}}</td>

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

    @include('includes.script.create-header-scripts')
@stop