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
            $('#paginate').change(function() {
                var current_path_url = '/cbgiadaugiadat?';
                var namhs = 'nam='+$('#nam').val();
                var mahuyen = '&mahuyen='+$('#mahuyen').val();
                var maxa = '&maxa='+$('#maxa').val();
                var tenduan = '&tenduan='+$('#tenduan').val();
                var paginate = '&paginate='+$('#paginate').val();
                var url = current_path_url+namhs+mahuyen+tenduan+paginate+maxa;
                window.location.href = url;
            });
        });
        function searchtt(){
            var current_path_url = '/cbgiadaugiadat?';
            var namhs = 'nam='+$('#nam').val();
            var mahuyen = '&mahuyen='+$('#mahuyen').val();
            var maxa = '&maxa='+$('#maxa').val();
            var tenduan = '&tenduan='+$('#tenduan').val();
            var paginate = '&paginate='+$('#paginate').val();
            var url = current_path_url+namhs+mahuyen+tenduan+paginate+maxa;
            window.location.href = url;
        }
        function resettt(){
            window.location.href = '/cbgiadaugiadat';
        }


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
                        <span class="caption-subject theme-font bold uppercase">Giá đấu giá đất</span>
                    </div>
                    </div>
                    <div class="row">
                        <div class="portlet-body form" id="form_wizard">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Năm</label>
                                            <select name="nam" id="nam" class="form-control">
                                                <option value="all">--Tất cả các năm--</option>
                                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                    <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Quận/huyện</label>
                                            <select name="mahuyen" id="mahuyen" class="form-control">
                                                <option value="all">--Tất cả các quận/huyện--</option>
                                                @foreach($huyens as $huyen)
                                                    <option value="{{$huyen->district}}" {{$huyen->district == $inputs['mahuyen'] ? 'selected' : ''}}>{{$huyen->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="font-weight: bold">Xã phường</label>
                                            <select name="maxa" id="maxa" class="form-control">
                                                <option value="all">--Tất cả các xã phường--</option>
                                                @foreach($xas as $xa)
                                                    <option value="{{$xa->town}}" {{$xa->town == $inputs['maxa'] ? 'selected' : ''}}>{{$xa->diaban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label" style="font-weight: bold">Tên dự án<span class="require">*</span></label>
                                        {!! Form::text('tenduan', $inputs['tenduan'], ['id' => 'tenduan', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button type="reset" class="btn btn-circle" onclick="resettt()"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                            <button type="submit" class="btn btn-circle green" onclick="searchtt()"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </div>
                    </div>
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
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="2%" style="text-align: center">STT</th>
                        <th style="text-align: center">Quận/ huyện</th>
                        <th style="text-align: center">Xã/phường</th>
                        <th style="text-align: center">Tên dự án</th>
                        <th style="text-align: center">Thời điểm <br>xác định</th>
                        <th style="text-align: center">Diện tích</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($model->count() != 0)
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: center">{{$tt->tenhuyen}}</td>
                                <td style="text-align: center">{{$tt->tenxa}}</td>
                                <td style="text-align: left">{{$tt->tenduan}}</td>
                                <td style="text-align: center">{{getDayVn($tt->thoidiem)}}</td>
                                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->dientich,3)}}</td>
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
