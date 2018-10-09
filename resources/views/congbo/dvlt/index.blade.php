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
        $(function(){
            $('#loaihang').change(function() {
                var loaihang = $('#loaihang').val();
                var url = '/giadichvuluutru?&loaihang='+loaihang;
                window.location.href = url;
            });
            $('#district').change(function() {
                var loaihang = $('#loaihang').val();
                var district = $('#district').val();
                var url = '/giadichvuluutru?&loaihang='+loaihang+'&district='+district;
                window.location.href = url;
            });
            $('#town').change(function() {
                var loaihang = $('#loaihang').val();
                var district = $('#district').val();
                var town = $('#town').val();
                var url = '/giadichvuluutru?&loaihang='+loaihang+'&district='+district+'&town='+town;
                window.location.href = url;
            });
        });
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
                            <span class="caption-subject theme-font bold uppercase">Dịch vụ lưu trú</span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select id="loaihang" name="loaihang" class="form-control">
                                        <option value="1" {{$loaihang == 1 ? 'selected' : ''}}>1 sao</option>
                                        <option value="2" {{$loaihang == 2 ? 'selected' : ''}}>2 sao</option>
                                        <option value="3" {{$loaihang == 3 ? 'selected' : ''}}>3 sao</option>
                                        <option value="4" {{$loaihang == 4 ? 'selected' : ''}}>4 sao</option>
                                        <option value="5" {{$loaihang == 5 ? 'selected' : ''}}>5 sao</option>
                                        <option value="K" {{$loaihang == 'K' ? 'selected' : ''}}>Khác (Nhà nghỉ)</option>
                                        <option value="CXD" {{$loaihang == 'CXD' ? 'selected' : ''}}>Chưa xác định (Khách sạn chưa xác định sao)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select id="district" name="district" class="form-control">
                                        <option value="all" >--Chọn quận/huyện--</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->district}}" {{$district->district == $huyen ? 'selected' : ''}}>{{$district->diaban}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if($huyen != 'all')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select id="town" name="town" class="form-control">
                                        <option value="all" >--Chọn quận/huyện--</option>
                                        @foreach($towns as $town)
                                            <option value="{{$town->town}}" {{$town->town == $xa ? 'selected' : ''}}>{{$town->diaban}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="10%">Ảnh đại diện</th>
                                <th style="text-align: center" width="30%">Tên cơ sở kinh doanh</th>
                                <th style="text-align: center" width="10%">Loại hạng</th>
                                <th style="text-align: center" width="20%">Địa chỉ</th>
                                <th style="text-align: center" width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td align="center">{{$key+1}}</td>
                                    <td align="center" style="vertical-align: middle">
                                        <img src="{{ url('images/avatar/'.$tt->avatar)}}" width="96">
                                    </td>
                                    <td><a href="{{$tt->link}}" target="_blank">{{$tt->tencskd}}</a></td>
                                    <td>{{$tt->loaihang}}</td>
                                    <td>{{$tt->diachikd}}</td>
                                    <td>
                                        <a href="{{url('giadichvuluutru/'.$tt->macskd)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem thông tin </a>
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
@stop 