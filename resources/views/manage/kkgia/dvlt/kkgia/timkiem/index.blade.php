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

        function searchtt(){
            var current_path_url = '/timkiemkkgiadvlt?';
            var nam = '&nam='+$('#nam').val();
            var tencskd = '&tencskd='+$('#tencskd').val();
            var tenhhdv = '&tenhhdv='+$('#tenhhdv').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+nam+tencskd+tenhhdv+paginate;
            window.location.href = url;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/timkiemkkgiadvlt?';
                var nam = '&nam='+$('#nam').val();
                var tencskd = '&tencskd='+$('#tencskd').val();
                var tenhhdv = '&tenhhdv='+$('#tenhhdv').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+tencskd+tenhhdv+paginate;
                window.location.href = url;
            });
        });

        function resettt(){
            window.location.href = '/timkiemkkgiadvlt';
        }

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Giá <small>&nbsp;dịch vụ lưu trú</small>
    </h3>
    {{--<h3 class="page-title">
        <small> <b style="color: blue">{{$dvql->tendv}}</b><b style="color: blue"> - </b><b style="color: blue">{{$dv->tendv}}</b> - Người soạn thảo: <b style="color: blue">{{isset($model) ? $model->cvsoanthao : session('admin')->name}}</b> </small>
    </h3>--}}
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
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
                                    <div class="col-md-4">
                                        <label class="control-label">Tên khách sạn<span class="require">*</span></label>
                                        {!! Form::text('tencskd', $inputs['tencskd'], ['id' => 'tencskd', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Tên hàng hóa dịch vụ<span class="require">*</span></label>
                                        {!! Form::text('tenhhdv', $inputs['tenhhdv'], ['id' => 'tenhhdv','class' => 'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div style="text-align: center">
                            <button type="reset" class="btn btn-circle" onclick="resettt()"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                            <button type="submit" class="btn btn-circle green" onclick="searchtt()"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </div>
                    </div>
                    <hr>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    Hiển thị
                                    <div class="select2-container form-control input-xsmall input-inline" >
                                        <select class="form-control" name="paginate" id="paginate" >
                                            <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                            <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                            <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                            <option value="100" {{$inputs['paginate'] == 100? 'selected' : ''}}>100</option>
                                        </select>
                                    </div>
                                    thông tin
                                </label>
                            </div>
                        </div></br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center" width="2%" rowspan="2">STT</th>
                                    <th style="text-align: center" >Tên doanh nghiệp</th>
                                    <th style="text-align: center" >Tên khách sạn</th>
                                    <th style="text-align: center" >Ngày áp dụng mức giá</th>
                                    <th style="text-align: center" >Tên hàng hóa dịch vụ</th>
                                    <th style="text-align: center" >Quy cách chất lượng</th>
                                    <th style="text-align: center" >Đơn vị tính</th>
                                    <th style="text-align: center" >Mức giá hiện hành</th>
                                    <th style="text-align: center" >Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($model->count() != 0)
                                    @foreach($model as $key => $tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td><b>{{$tt->tendn}}</b></td>
                                            <td style="text-align: left"><b>{{$tt->tencskd}}</b></td>
                                            <td style="text-align: center">{{getDayVn($tt->ngayhieuluc)}}</td>
                                            <td style="text-align: left">{{$tt->tenhhdv}}</td>
                                            <td style="text-align: left">{{$tt->qccl}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->mucgiakk)}}</td>
                                            <td>{{$tt->ghichu}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="9">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                        {{$model->appends(['nam'=>$inputs['nam'],
                                                       'tencskd'=>$inputs['tencskd'],
                                                       'paginate'=>$inputs['paginate'],
                                    ])->links()}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>

    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop