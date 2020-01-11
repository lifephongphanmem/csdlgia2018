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
            $('#nam,#manhom,#ptcp,#paginate').change(function() {
                var current_path_url = '/cbphilephi?';
                var nam = '&nam='+$('#nam').val();
                var manhom = '&manhom='+$('#manhom').val();
                var ptcp = '&ptcp='+$('#ptcp').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+manhom+ptcp+paginate;
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
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet light" style="min-height: 587px">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs font-green-sharp"></i>
                                        <span class="caption-subject theme-font bold uppercase">Giá phí, lệ phí</span>
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select class="form-control" name="nam" id="nam">
                                                <option value="all">--Tất cả các năm--</option>
                                                @if ($nam_start = 2015 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Nhóm phí lệ phí</label>
                                            <div class="form-group">
                                                <select name="manhom" id="manhom" class="form-control">
                                                    <option value="all">--Chọn nhóm phí lệ phí--</option>
                                                    @foreach($m_nhomphilephi as $nhom)
                                                        <option value="{{$nhom->manhom}}" {{$nhom->manhom == $inputs['manhom'] ? 'selected' : ''}}>{{$nhom->tennhom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Mô tả</label>
                                            <div class="form-group">
                                                {!! Form::text('ptcp',$inputs['ptcp'], array('id'=>'ptcp','class'=>'form-control'))!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            Hiển thị&nbsp;
                                            <div class="select2-container form-control input-xsmall input-inline" >
                                                <select class="form-control" name="paginate" id="paginate" >
                                                    <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                                    <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                                    <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                                    <option value="100" {{$inputs['paginate'] == 100? 'selected' : ''}}>100</option>
                                                </select>
                                            </div>
                                            &nbsp;thông tin
                                        </label>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <!--th class="table-checkbox">
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                                                </th-->
                                                <th style="text-align: center" >Số QĐ</th>
                                                <th style="text-align: center">Ngày áp dụng</th>
                                                <th style="text-align: center">Nhóm phí lệ phí</th>
                                                <th style="text-align: center">Mô tả</th>
                                                <th style="text-align: center">Mức thu phí</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($model) != 0)
                                                @foreach($model as $key=>$tt)
                                                    <tr>
                                                        <td>{{$tt->soqd}}</td>
                                                        <td>{{getDayVn($tt->ngayapdung)}}</td>
                                                        <td>{{$tt->tennhom}}</td>
                                                        <td class="active">{{$tt->ptcp}}</td>
                                                        <td style="text-align: left;font-weight: bold">{{$tt->mucthuphi != '' && $tt->mucthuphi != 0 ? number_format($tt->mucthuphi) : $tt->ghichu}}</td>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td style="text-align: center" colspan="6">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        @if(count($model) != 0)
                                            <div class="col-md-5 col-sm-12">
                                                <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">
                                                    Hiển thị 1 đến {{$model->count()}} trên {{$model->total()}} thông tin
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="dataTables_paginate paging_simple_numbers" id="sample_3_paginate">
                                                    {{$model->appends(['nam' => $inputs['nam'],
                                                                   'manhom'=>$inputs['manhom'],
                                                                   'ptcp'=>$inputs['ptcp'],
                                                                   'paginate'=>$inputs['paginate'],
                                                ])->links()}}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                    <!--/div-->
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop
