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
            var current_path_url = '/tkgiaspdvci?';
            var nam = '&nam='+$('#nam').val();
            var soqd = '&soqd='+$('#soqd').val();
            var mota = '&mota='+$('#mota').val();
            var url = current_path_url+nam+soqd+mota;
            window.location.href = url;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/tkgiaspdvci?';
                var paginate = '&paginate='+$('#paginate').val();
                var nam = '&nam='+$('#nam').val();
                var soqd = '&soqd='+$('#soqd').val();
                var mota = '&mota='+$('#mota').val();
                var url = current_path_url+nam+soqd+mota+paginate;
                window.location.href = url;
            });
        });

        function resettt(){
            $("#nam").val('all');
            $("#soqd").val('');
            $("#mota").val('');
            window.location.href = '/tkgiaspdvci';
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin<small>&nbsp;giá sản phẩm dịch vụ công ích</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        {{--<a href="{{url('tkgianuocsachsinhhoat/printf?&nam='.$inputs['nam'].'&soqd='.$inputs['soqd'].'&mota='.$inputs['mota'])}}" class="btn btn-default btn-sm" target="_blank">--}}
                            {{--<i class="fa fa-print"></i> In trang </a>--}}
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select class="form-control" name="nam" id="nam">
                                                <option value="all">--Tất cả các năm--</option>
                                                <?php
                                                $imax = date('Y') + 1;
                                                $imin = date('Y') - 5;
                                                ?>
                                                @for($i = $imin; $i <= $imax;$i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : '' }}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <label class="control-label">Mô tả<span class="require">*</span></label>
                                        {!! Form::text('mota', $inputs['mota'], ['id' => 'mota', 'rows' => 4, 'cols' => 10, 'class' => 'form-control', 'placeholder' => 'Mô tả']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button type="reset" class="btn btn-circle" onclick="resettt()"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                            <button type="submit" class="btn btn-circle green" onclick="searchtt()"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    Hiển thị
                                    <div class="select2-container form-control input-xsmall input-inline" >
                                        <select class="form-control" name="paginate" id="paginate" >
                                            <option value="5" {{$inputs['paginate'] == 5 ? 'selected' : ''}}>5</option>
                                            <option value="10" {{$inputs['paginate'] == 10 ? 'selected' : ''}}>10</option>
                                            <option value="15" {{$inputs['paginate'] == 15 ? 'selected' : ''}}>15</option>
                                            <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                        </select>
                                    </div>
                                    thông tin
                                </label>
                            </div>
                        </div></br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="10%">Số Quyết định</th>
                                <th style="text-align: center" width="10%">Ngày áp dụng</th>
                                <th style="text-align: center" width="20%">Thông tin quyết định</th>
                                <th style="text-align: center">Mô tả</th>
                                <th style="text-align: center" width="10%">Đơn vị tính</th>
                                <th style="text-align: center" width="10%">Đơn giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($model->count() != 0)
                                @foreach($model as $key => $tt)
                                    <tr>
                                        <td style="text-align: center">{{$key+1}}</td>
                                        <td style="text-align: center">{{$tt->soqd}}</td>
                                        <td style="text-align: center;"><b>{{getDayVn($tt->ngayqd)}}</b></td>
                                        <td style="text-align: left">{{$tt->ttqd}}</td>
                                        <td style="text-align: left">{{$tt->mota}}</td>
                                        <td style="text-align: center">{{$tt->dvt}}</td>
                                        <td style="text-align: right">{{dinhdangsothapphan($tt->gia,5)}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td style="text-align: center" colspan="7">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
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
                                                       'mota'=>$inputs['mota'],
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
    @include('includes.script.create-header-scripts')
@stop