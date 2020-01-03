
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
            $('#nam,#tents,#paginate').change(function() {
                var tents = '&tents=' + $('#tents').val();
                var nam = '&nam=' + $('#nam').val();
                var paginate = '&paginate=' + $('#paginate').val();
                var url = 'cbthamdinhgia?' + nam + tents + paginate;
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
                                        <span class="caption-subject theme-font bold uppercase">CSDL Thẩm định giá tại địa phương</span>
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label style="font-weight: bold">Năm</label>
                                        <select name="nam" id="nam" class="form-control">
                                            <option value="all">--Tất cả các năm--</option>
                                            @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                            @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                            @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label style="font-weight: bold">Tên tài sản thẩm định giá</label>
                                        <div class="form-group">
                                            {!! Form::text('tents',$inputs['tents'], array('id'=>'tents','class'=>'form-control'))!!}
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
                                                <th style="text-align: center" width="5%">Số CV</th>
                                                <th style="text-align: center" >Đơn vị thẩm định/<br>Đơn vị yêu cầu thẩm định</th>
                                                <th style="text-align: center" >Thời gian<br> thẩm định</th>
                                                <th style="text-align: center">Thời hạn <br>thẩm định</th>
                                                <th style="text-align: center">Tên tài sản-<br>Thông số kỹ thuật</th>
                                                <th style="text-align: center">Số lương-<br>Đơn vị tính</th>
                                                <th style="text-align: center">Đơn giá<br> thẩm định</th>
                                                <th style="text-align: center">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($model) != 0)
                                                @foreach($model as $tt)
                                                    <tr>
                                                        <td>{{$tt->sotbkl}}</td>
                                                        <td class="active">{{$tt->tendv}}/<br><b>{{$tt->dvyeucau}}</b></td>
                                                        <td>{{getDayVn($tt->thoidiem)}}</td>
                                                        <td>{{getDayVn($tt->thoihan)}}</td>
                                                        <td class="success">{{$tt->tents}}-{{$tt->thongsokt}}</td>
                                                        <td style="text-align: center; font-weight: bold;">{{$tt->sl}}-{{$tt->dvt}}</td>
                                                        <td style="text-align: right; font-weight: bold;" class="active">{{number_format($tt->nguyengiathamdinh)}}</td>
                                                        <td>
                                                            <button type="button" data-target="#modal-show" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="ShowItem({{$tt->id}})"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</button>
                                                        </td>
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
                                                    {{$model->appends(['nam' => $inputs['nam'],
                                                                   'tents'=>$inputs['tents'],
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
