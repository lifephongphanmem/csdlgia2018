
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
            $('#phanloai').change(function() {
                var phanloai = '&phanloai=' +$('#phanloai').val();
                var loaivb = '&loaivb=' +$('#loaivb').val();
                var tieude = '&tieude=' +$('#tieude').val();
                var paginate = '&paginate=' +$('#paginate').val();
                var url = 'cbvanbanqlnnvegia?'  + phanloai + loaivb + tieude +  paginate;
                window.location.href = url;
            });
            $('#loaivb').change(function() {
                var phanloai = '&phanloai=' +$('#phanloai').val();
                var loaivb = '&loaivb=' +$('#loaivb').val();
                var tieude = '&tieude=' +$('#tieude').val();
                var paginate = '&paginate=' +$('#paginate').val();
                var url = 'cbvanbanqlnnvegia?'  + phanloai + loaivb + tieude +  paginate;
                window.location.href = url;
            });
            $('#tieude').change(function() {
                var phanloai = '&phanloai=' +$('#phanloai').val();
                var loaivb = '&loaivb=' +$('#loaivb').val();
                var tieude = '&tieude=' +$('#tieude').val();
                var paginate = '&paginate=' +$('#paginate').val();
                var url = 'cbvanbanqlnnvegia?'  + phanloai + loaivb + tieude +  paginate;
                window.location.href = url;
            });
            $('#paginate').change(function() {
                var phanloai = '&phanloai=' +$('#phanloai').val();
                var loaivb = '&loaivb=' +$('#loaivb').val();
                var tieude = '&tieude=' +$('#tieude').val();
                var paginate = '&paginate=' +$('#paginate').val();
                var url = 'cbvanbanqlnnvegia?'  + phanloai + loaivb + tieude +  paginate;
                window.location.href = url;
            });
        })
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/vanbanqlnnvegia/dinhkem',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#dinh_kem').replaceWith(data.message);
                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
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
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet light" style="min-height: 587px">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs font-green-sharp"></i>
                                            <span class="caption-subject theme-font bold uppercase">Văn bản quản lý nhà nước về giá, phí lệ phí</span>
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Phân loại</label>
                                                <select class="form-control" name="phanloai" id="phanloai">
                                                    <option value="all" {{$inputs['phanloai'] == 'all' ? 'selected' : ''}}>--Tất cả--</option>
                                                    <option value="gia" {{$inputs['phanloai'] == 'gia' ? 'selected' : ''}}>Văn bản về Giá</option>
                                                    <option value="philephi"{{$inputs['phanloai'] == 'philephi' ? 'selected' : ''}}>Văn bản Phí lệ phí</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Loại văn bản</label>
                                                {!! Form::select('loaivb',getLoaiVbQlNn(),$inputs['loaivb'], ['id' => 'loaivb','class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                {!! Form::text('tieude',$inputs['tieude'], ['id' => 'tieude','class' => 'form-control']) !!}
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
                                                    <th style="text-align: center">Đơn vị ban hành</th>
                                                    <th style="text-align: center" width="5%">Số hiệu <br>văn bản</th>
                                                    <th style="text-align: center">Nội dung</th>
                                                    <th style="text-align: center">Ngày <br>áp dụng</th>
                                                    <th style="text-align: center" width="5%">Thao tác</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($model) != 0)
                                                    @foreach($model as $key=>$tt)
                                                        <tr>
                                                            <td class="active">{{$tt->dvbanhanh}}</td>
                                                            <td class="success">{{$tt->kyhieuvb}}</td>
                                                            <td>{{$tt->tieude}}</td>
                                                            <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                                            <td>
                                                                <button type="button" onclick="get_attack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-cloud-download"></i>&nbsp;Tải tệp</button>
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
                                                        {{$model->appends(['phanloai' => $inputs['phanloai'],
                                                                       'loaivb'=>$inputs['loaivb'],
                                                                       'tieude'=>$inputs['tieude'],
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
    @include('includes.e.modal-attackfile')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop
