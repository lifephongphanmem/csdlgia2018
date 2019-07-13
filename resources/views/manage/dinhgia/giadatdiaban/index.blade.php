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
            var current_path_url = '/giadatdiaban?';
            var nam = '&nam='+$('#nam').val();
            var district = '&district='+$('#district').val();
            var loaidat = '&loaidat='+$('#loaidat').val();
            var khuvuc = '&khuvuc='+$('#khuvuc').val();
            var mota = '&mota='+$('#mota').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+nam+district+loaidat+khuvuc+mota+paginate;
            window.location.href = url;
        }

        $(function(){
            $('#paginate').change(function() {
                var current_path_url = '/giadatdiaban?';
                var nam = '&nam='+$('#nam').val();
                var district = '&district='+$('#district').val();
                var loaidat = '&loaidat='+$('#loaidat').val();
                var khuvuc = '&khuvuc='+$('#khuvuc').val();
                var mota = '&mota='+$('#mota').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+nam+district+loaidat+khuvuc+mota+paginate;
                window.location.href = url;
            });
        });

        function resettt(){
            window.location.href = '/giadatdiaban';
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Giá đất <small>&nbsp;trên địa bàn</small>
    </h3>
    {{--<h3 class="page-title">
        <small> <b style="color: blue">{{$dvql->tendv}}</b><b style="color: blue"> - </b><b style="color: blue">{{$dv->tendv}}</b> - Người soạn thảo: <b style="color: blue">{{isset($model) ? $model->cvsoanthao : session('admin')->name}}</b> </small>
    </h3>--}}
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <a href="{{url('giadatdiaban/nhandulieutuexcel')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-file-excel-o"></i> Nhận dữ liệu</a>
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                            Xóa</button>
                    </div>
                </div>
                <hr>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Loại đất</label>
                                            <select class="form-control" name="loaidat" id="loaidat">
                                                <option value="All">--Tất cả--</option>
                                                <option value="Đất trồng lúa" {{$inputs['loaidat'] == 'Đất trồng lúa' ? 'selected' : ''}}>Đất trồng lúa</option>
                                                <option value="Đất trồng cây hàng năm khác" {{$inputs['loaidat'] == 'Đất trồng cây hàng năm khác' ? 'selected' : ''}}>Đất trồng cây hàng năm khác</option>
                                                <option value="Đất trồng cây lâu năm khác" {{$inputs['loaidat'] == 'Đất trồng cây lâu năm khác' ? 'selected' : ''}}>Đất trồng cây lâu năm khác</option>
                                                <option value="Đất lâm nghiệp" {{$inputs['loaidat'] == 'Đất lâm nghiệp' ? 'selected' : ''}}>Đất lâm nghiệp</option>
                                                <option value="Đất nuôi trồng thủy sản" {{$inputs['loaidat'] == 'Đất nuôi trồng thủy sản' ? 'selected' : ''}}>Đất nuôi trồng thủy sản</option>
                                                <option value="Đất ở tại nông thôn" {{$inputs['loaidat'] == 'Đất ở tại nông thôn' ? 'selected' : ''}}>Đất ở tại nông thôn</option>
                                                <option value="Đất thương mại, dịch vụ tại nông thôn" {{$inputs['loaidat'] == 'Đất thương mại, dịch vụ tại nông thôn' ? 'selected' : ''}}>Đất thương mại, dịch vụ tại nông thôn</option>
                                                <option value="Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại nông thôn" {{$inputs['loaidat'] == 'Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại nông thôn' ? 'selected' : ''}}>Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại nông thôn</option>
                                                <option value="Đất ở tại đô thị" {{$inputs['loaidat'] == 'Đất ở tại đô thị' ? 'selected' : ''}}>Đất ở tại đô thị</option>
                                                <option value="Đất thương tại, dịch vụ tại đô thị" {{$inputs['loaidat'] == 'Đất thương tại, dịch vụ tại đô thị' ? 'selected' : ''}}>Đất thương tại, dịch vụ tại đô thị</option>
                                                <option value="Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại đô thị" {{$inputs['loaidat'] == 'Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại đô thị' ? 'selected' : ''}}>Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại đô thị</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Khu vực<span class="require">*</span></label>
                                        {!! Form::text('khuvuc', $inputs['khuvuc'], ['id' => 'khuvuc', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Mô tả<span class="require">*</span></label>
                                        {!! Form::text('mota', $inputs['mota'], ['id' => 'mota', 'rows' => 4, 'cols' => 10, 'class' => 'form-control']) !!}
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
                                            <option value="20" {{$inputs['paginate'] == 20 ? 'selected' : ''}}>20</option>
                                            <option value="50" {{$inputs['paginate'] == 50 ? 'selected' : ''}}>50</option>
                                            <option value="100" {{$inputs['paginate'] == 100? 'selected' : ''}}>100</option>
                                        </select>
                                    </div>
                                    thông tin
                                </label>
                            </div>
                        </div></br>
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
                                <th style="text-align: center" rowspan="2" width="2%">Hệ số K</th>
                                <th style="text-align: center" colspan="5">Giá đất</th>
                                <th style="text-align: center" rowspan="2"> Thao tác</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">VT1</th>
                                <th style="text-align: center">VT2</th>
                                <th style="text-align: center">VT3</th>
                                <th style="text-align: center" width="3%">VT4</th>
                                <th style="text-align: center" width="3%">VT5</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($model->count() != 0)
                                    @foreach($model as $key => $tt)
                                        <tr>
                                            <td style="text-align: center">{{$key+1}}</td>
                                            <td><b>{{$tt->nam}}</b></td>
                                            <td><b>{{$tt->diaban}}</b></td>
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
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="14">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                    {{$model->appends(['loatdat' => $inputs['loaidat'],
                                                   'nam'=>$inputs['nam'],
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

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>

    </div>
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'giadatdiaban/delete','id' => 'frm_delete'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Năm<span class="require">*</span></label>
                                <select class="form-control" name="namdel" id="namdel">
                                    @if ($nam_start = 2015 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}">Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Địa bàn<span class="require">*</span></label>
                                <select class="form-control" name="districtdel" id="districtdel">
                                    @foreach($diabans as $diaban)
                                        <option value="{{$diaban->district}}">{{$diaban->diaban}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Địa bàn<span class="require">*</span></label>
                                <select class="form-control" name="loaidatdel" id="loaidatdel">
                                    <option value="All">--Tất cả--</option>
                                    <option value="Đất trồng lúa">Đất trồng lúa</option>
                                    <option value="Đất trồng cây hàng năm khác"}}>Đất trồng cây hàng năm khác</option>
                                    <option value="Đất trồng cây lâu năm khác">Đất trồng cây lâu năm khác</option>
                                    <option value="Đất lâm nghiệp">Đất lâm nghiệp</option>
                                    <option value="Đất nuôi trồng thủy sản">Đất nuôi trồng thủy sản</option>
                                    <option value="Đất ở tại nông thôn" >Đất ở tại nông thôn</option>
                                    <option value="Đất thương mại, dịch vụ tại nông thôn">Đất thương mại, dịch vụ tại nông thôn</option>
                                    <option value="Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại nông thôn">Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại nông thôn</option>
                                    <option value="Đất ở tại đô thị">Đất ở tại đô thị</option>
                                    <option value="Đất thương tại, dịch vụ tại đô thị">Đất thương tại, dịch vụ tại đô thị</option>
                                    <option value="Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại đô thị">Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại đô thị</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickdelete(){
            $('#frm_delete').submit();
        }
    </script>
    @include('includes.script.create-header-scripts')
@stop