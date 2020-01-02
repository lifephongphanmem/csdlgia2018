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
            $('#nam,#district,#maloaidat,#khuvuc,#mota,#paginate').change(function() {
                var current_path_url = '/cbgiadatdiaban?';
                var nam = '&nam='+$('#nam').val();
                var district = '&district='+$('#district').val();
                var maloaidat = '&maloaidat='+$('#maloaidat').val();
                var khuvuc = '&khuvuc='+$('#khuvuc').val();
                var mota = '&mota='+$('#mota').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+district+maloaidat+khuvuc+mota+paginate;
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
                                        <span class="caption-subject theme-font bold uppercase">Giá đất theo địa bàn</span>
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
                                                <option value="All">--Tất cả--</option>
                                                @foreach($diabans as $diaban)
                                                    <option value="{{$diaban->district}}" {{$diaban->district == $inputs['district'] ? 'selected' : ''}}>{{$diaban->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Loại đất</label>
                                            <select class="form-control" name="maloaidat" id="maloaidat">
                                                <option value="All">--Tất cả--</option>
                                                @foreach($loaidats as $loaidat)
                                                    <option value="{{$loaidat->maloaidat}}" {{$loaidat->maloaidat == $inputs['maloaidat'] ? 'selected' : ''}}>{{$loaidat->loaidat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" style="font-weight: bold">Khu vực<span class="require">*</span></label>
                                        {!! Form::text('khuvuc', $inputs['khuvuc'], ['id' => 'khuvuc', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" style="font-weight: bold">Mô tả<span class="require">*</span></label>
                                        {!! Form::text('mota', $inputs['mota'], ['id' => 'mota', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
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
                                                <th style="text-align: center" width="2%" rowspan="2">STT</th>
                                                <th style="text-align: center" width="2%" rowspan="2">Năm</th>
                                                <th style="text-align: center" rowspan="2" width="10%">Địa bàn</th>
                                                <th style="text-align: center" rowspan="2" width="10%">Loại đất</th>
                                                <th style="text-align: center" rowspan="2">Khu vực</th>
                                                <th style="text-align: center" rowspan="2">Mô tả</th>
                                                <th style="text-align: center" rowspan="2" width="5%">MĐSD</th>
                                                <th style="text-align: center" rowspan="2" width="2%">Hệ<br> số<br> K</th>
                                                <th style="text-align: center" colspan="5">Giá đất</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center">VT1</th>
                                                <th style="text-align: center">VT2</th>
                                                <th style="text-align: center">VT3</th>
                                                <th style="text-align: center">VT4</th>
                                                <th style="text-align: center">VT5</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($model) != 0)
                                                @foreach($model as $key=>$tt)
                                                    <tr>
                                                        <td style="text-align: center">{{$key+1}}</td>
                                                        <td><b>{{$tt->nam}}</b></td>
                                                        <td><b>{{$tt->diaban}}</b><br>{{$tt->soqd}}</td>
                                                        <td style="text-align: left"><b>{{$tt->loaidat}}</b></td>
                                                        <td style="text-align: left;"><b>{{$tt->khuvuc}}</b></td>
                                                        <td style="text-align: left" class="active">{{$tt->mota}}</td>
                                                        <td style="text-align: center">{{$tt->mdsd}}</td>
                                                        <td style="text-align: center">{{$tt->hesok}}</td>
                                                        <td style="text-align: center">{{dinhdangsothapphan($tt->giavt1,2)}}</td>
                                                        <td style="text-align: center">{{dinhdangsothapphan($tt->giavt2,2)}}</td>
                                                        <td style="text-align: center">{{dinhdangsothapphan($tt->giavt3,2)}}</td>
                                                        <td style="text-align: center">{{dinhdangsothapphan($tt->giavt4,2)}}</td>
                                                        <td style="text-align: center">{{dinhdangsothapphan($tt->giavt5,2)}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td style="text-align: center" colspan="15">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                                                   'district'=>$inputs['district'],
                                                                   'maloaidat'=>$inputs['maloaidat'],
                                                                   'khuvuc'=>$inputs['khuvuc'],
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
