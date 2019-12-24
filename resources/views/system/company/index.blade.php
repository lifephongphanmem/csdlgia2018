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
            $('#tendn').change(function() {
                var tendn = '&tendn='+ $('#tendn').val();
                var masothue = '&masothue='+$('#masothue').val();
                var diachi = '&diachi='+$('#diachi').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/company?'  + tendn + masothue + diachi + paginate;
                window.location.href = url;
            });
            $('#masothue').change(function() {
                var tendn = '&tendn='+ $('#tendn').val();
                var masothue = '&masothue='+$('#masothue').val();
                var diachi = '&diachi='+$('#diachi').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/company?'  + tendn + masothue + diachi + paginate;
                window.location.href = url;
            });
            $('#diachi').change(function() {
                var tendn = '&tendn='+ $('#tendn').val();
                var masothue = '&masothue='+$('#masothue').val();
                var diachi = '&diachi='+$('#diachi').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/company?'  + tendn + masothue + diachi + paginate;
                window.location.href = url;
            });
            $('#paginate').change(function() {
                var tendn = '&tendn='+ $('#tendn').val();
                var masothue = '&masothue='+$('#masothue').val();
                var diachi = '&diachi='+$('#diachi').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = '/company?'  + tendn + masothue + diachi + paginate;
                window.location.href = url;
            });
        });
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Danh sách doanh nghiệp<small>&nbsp;cung cấp hàng hoá,dịch vụ</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <a href="{{url('company/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">Tên đơn vị<span class="require">*</span></label>
                                {!! Form::text('tendn', $inputs['tendn'], ['id' => 'tendn', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">Mã số thuế<span class="require">*</span></label>
                                {!! Form::text('masothue', $inputs['masothue'], ['id' => 'masothue', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-5">
                                <label class="control-label">Địa chỉ<span class="require">*</span></label>
                                {!! Form::text('diachi', $inputs['diachi'], ['id' => 'diachi', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <br>
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
                                    <th style="text-align: center" width="2%">STT</th>
                                    <th style="text-align: center" width="30%">Tên đơn vị</th>
                                    <th style="text-align: center">Mã số thuế</th>
                                    <th style="text-align: center" width="20%">Địa chỉ</th>
                                    <th style="text-align: center" width="10%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($model->count() != 0)
                                    @foreach($model as $key=>$tt)
                                        <tr class="odd gradeX">
                                            <td style="text-align: center">{{$key + 1}}</td>
                                            <td class="active" >{{$tt->tendn}}</td>
                                            <td>{{$tt->maxa}}</td>
                                            <td>{{$tt->diachi}}</td>
                                            <td>
                                                <a href="{{url('company/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="5">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
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
                                        {{$model->appends(['tendn' => $inputs['tendn'],
                                                       'masothue'=>$inputs['masothue'],
                                                       'diachi'=>$inputs['diachi'],
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
@stop