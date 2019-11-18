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
        jQuery(document).ready(function() {
            TableManaged.init();
        });

        $(function(){
            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var url = '/cbphilephi?' + namhs;
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
            <!--div class="portlet light"-->
                <div class="portlet-title">
                    <div class="row">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Giá phí lệ phí</span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Năm hồ sơ</label>
                                            <select name="nam" id="nam" class="form-control">
                                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <!--th class="table-checkbox">
                            <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                        </th-->
                        <th width="2%" style="text-align: center">STT</th>
                        <th style="text-align: center" width="20%">Nhóm phí lệ phí</th>
                        <th style="text-align: center" width="20%">Mô tả</th>
                        <th style="text-align: center" width="10%">Số quyết định</th>
                        <th style="text-align: center">Ngày áp dụng</th>
                        <th style="text-align: center">Phương tiện chịu phí</th>
                        <th style="text-align: center">Mức thu phí</th>
                        <th style="text-align: center">Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($model) != 0)
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="success">{{$tt->tennhom}}</td>
                                <td class="active">{{$tt->mota}}</td>
                                <td>{{$tt->soqd}}</td>
                                <td class="text-center" style="font-weight: bold">{{getDayVn($tt->ngayapdung)}}</td>
                                <td>{{$tt->ptcp}}</td>
                                <td style="text-align: right">{{dinhdangso($tt->mucthuphi)}}</td>
                                <td>{{$tt->ghichu}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align: center" colspan="8">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="row">
                    @if(count($model) != 0)
                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">
                                Hiển thị 1 đến {{$model->count()}} trên {{count($model)}} thông tin
                            </div>
                        </div>
                    @endif
                </div>
            <!--/div-->
            <!-- END PORTLET-->
        </div>
    </div>
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop
