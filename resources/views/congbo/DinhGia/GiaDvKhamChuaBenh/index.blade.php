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
        $(function(){
            $('#nam,#district,#mota,#paginate').change(function() {
                var current_path_url = '/cbdichvukcb?';
                var nam = '&nam='+$('#nam').val();
                var district = '&district='+$('#district').val();
                var tenbv = '&tenbv='+$('#tenbv').val();
                var mota = '&mota='+$('#mota').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+district+mota+paginate;
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
                                        <span class="caption-subject theme-font bold uppercase">Giá dịch vụ khám chữa bệnh</span>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Địa bàn</label>
                                            <select class="form-control" name="district" id="district">
                                                <option value="all">--Tất cả--</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->district}}" {{$district->district == $inputs['district'] ? 'selected' : ''}}>{{$district->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" style="font-weight: bold">Tên bệnh viện<span class="require">*</span></label>
                                            {!! Form::text('tenbv', $inputs['tenbv'], ['id' => 'tenbv', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" style="font-weight: bold">Mô tả<span class="require">*</span></label>
                                            {!! Form::text('mota', $inputs['mota'], ['id' => 'mota', 'class' => 'form-control']) !!}
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
                                                <th style="text-align: center" width="2%">STT</th>
                                                <th style="text-align: center" width="5%">Thời điểm</th>
                                                <th style="text-align: center">Địa bàn</th>
                                                <th style="text-align: center">Bệnh viện</th>
                                                <th style="text-align: center">Mô tả</th>
                                                <th style="text-align: center" >Đơn vị tính</th>
                                                <th style="text-align: center" >Đơn giá</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($model->count() != 0)
                                                @foreach($model as $key => $tt)
                                                    <tr>
                                                        <td style="text-align: center">{{$key+1}}</td>
                                                        <td><b>{{getDayVn($tt->thoidiem)}}</b></td>
                                                        <td><b>{{$tt->diaban}}</b></td>
                                                        <td style="text-align: left;"><b>{{$tt->tenbv}}</b></td>
                                                        <td style="text-align: left" class="active">{{$tt->mota}}</td>
                                                        <td style="text-align: center">{{$tt->dvt}}</td>
                                                        <td style="text-align: center">{{dinhdangsothapphan($tt->dongia,2)}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td style="text-align: center" colspan="9">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                                                </tr>
                                            @endif
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
                                                                   'district'=>$inputs['district'],
                                                                   'tenbv'=>$inputs['tenbv'],
                                                                   'mota'=>$inputs['mota'],
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



