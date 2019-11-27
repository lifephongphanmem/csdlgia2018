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
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function ClickCreate(){
            $('#frm_create').submit();
        }
        function EditTt(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'thongtindaugiadatct/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    $('#edit_loaidat').val(data.loaidat);
                    $('#edit_tenduong').val(data.tenduong);
                    $('#edit_loaiduong').val(data.loaiduong);
                    $('#edit_vitri').val(data.vitri);
                    $('#edit_dientich').val(data.dientich);

                    $('#edit_qdgiadato').val(data.qdgiadato);
                    $('#edit_qdgiadattmdv').val(data.qdgiadattmdv);
                    $('#edit_qdgiadatsxkd').val(data.qdgiadatsxkd);
                    $('#edit_qdgiadatnn').val(data.qdgiadatnn);
                    $('#edit_qdgiadatnuoits').val(data.qdgiadatnuoits);
                    $('#edit_qdgiadatmuoi').val(data.qdgiadatmuoi);

                    $('#edit_qdpddato').val(data.qdpddato);
                    $('#edit_qdpddattmdv').val(data.qdpddattmdv);
                    $('#edit_qdpddatsxkd').val(data.qdpddatsxkd);
                    $('#edit_qdpddatnn').val(data.qdpddatnn);
                    $('#edit_qdpddatnuoits').val(data.qdpddatnuoits);
                    $('#edit_qdpddatmuoi').val(data.qdpddatmuoi);

                    $('#edit_kqdgdato').val(data.kqdgdato);
                    $('#edit_kqdgdattmdv').val(data.kqdgdattmdv);
                    $('#edit_kqdgdatsxkd').val(data.kqdgdatsxkd);
                    $('#edit_kqdgdatnn').val(data.kqdgdatnn);
                    $('#edit_kqdgdatnuoits').val(data.kqdgdatnuoits);
                    $('#edit_kqdgdatmuoi').val(data.kqdgdatmuoi);

                    $('#edit_id').val(data.id);
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
        function ClickUpdate(){
            $('#frm_update').submit();
        }
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin <small>&nbsp;chi tiết hồ sơ đấu giá đất</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        <a href="{{url('thongtindaugiadat?&mahuyen='.$modelhs->mahuyen.'&maxa='.$modelhs->maxa.'&tenduan='.$modelhs->tenduan)}}" class="btn btn-default btn-sm">
                            <i class="fa fa-reply"></i> Quay lại </a>
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Tên dự án:</b> {{$modelhs->tenduan}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Thời điểm:</b> {{getDayVn($modelhs->thoidiem)}} - <b>Diện tích:</b> {{dinhdangsothapphan($modelhs->dientich,3)}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Số quyết định phương án đấu giá:</b> {{$modelhs->soqdpagia}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Số quyết định đấu giá:</b> {{$modelhs->soqddaugia}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Số quyết phê duyệt giá khởi điểm đấu giá:</b> {{$modelhs->soqdgiakhoidiem}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Số quyết công nhận kết quả trúng đấu giá:</b> {{$modelhs->soqdkqdaugia}}</label>
                                </div>
                            </div>
                        </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Loại đất</th>
                            <th style="text-align: center">Tên đường</th>
                            <th style="text-align: center">Loại đường</th>
                            <th style="text-align: center">Vị trí</th>
                            <th style="text-align: center">Diện tích</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td class="active" >{{$tt->loaidat}}</td>
                            <td>{{$tt->tenduong}}</td>
                            <td>{{$tt->loaiduong}}</td>
                            <td>{{$tt->vitri}}</td>
                            <td>{{dinhdangsothapphan($tt->dientich,5)}}</td>
                            <td>
                                <button type="button" onclick="EditTt('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit" data-toggle="modal" style="margin: 2px"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-delete" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>

    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'thongtindaugiadatct/delete','id' => 'frm_delete'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="hidden" name="iddelete" id="iddelete">
                <input type="hidden" name="mahs" id="mahs" value="{{$inputs['mahs']}}">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin vị trí, địa bàn đấu giá đất</h4>
                </div>
                {!! Form::open(['url'=>'thongtindaugiadatct/store','id' => 'frm_create'])!!}
                <div class="modal-body" id="ttmhbog">
                    <h4 style="color: blue">Thông tin địa chính</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại đất<span class="require">*</span></label>
                                {!!Form::text('loaidat',null, array('id' => 'loaidat','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên đường<span class="require">*</span></label>
                                {!!Form::text('tenduong',null, array('id' => 'tenduong','class' => 'form-control required'))!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại đường, khu vực<span class="require">*</span></label>
                                {!!Form::text('loaiduong',null, array('id' => 'loaiduong','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Vị trí<span class="require">*</span></label>
                                {!!Form::text('vitri',null, array('id' => 'vitri','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Diện tích<span class="require">*</span></label>
                                {!!Form::text('dientich',null, array('id' => 'dientich','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                    <h4 style="color: blue">Quyết định bảng giá đất của tỉnh</h4>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất ở<span class="require">*</span></label>
                                {!!Form::text('qdgiadato',0, array('id' => 'qdgiadato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                {!!Form::text('qdgiadattmdv', 0, array('id' => 'qdgiadattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                {!!Form::text('qdgiadatsxkd',0, array('id' => 'qdgiadatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                {!!Form::text('qdgiadatnn',0, array('id' => 'qdgiadatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                {!!Form::text('qdgiadatnuoits',0, array('id' => 'qdgiadatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                {!!Form::text('qdgiadatmuoi', 0, array('id' => 'qdgiadatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>

                    <h4 style="color: blue">Quyết định phê duyệt giá khởi điểm của tỉnh</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất ở<span class="require">*</span></label>
                                {!!Form::text('qdpddato', 0, array('id' => 'qdpddato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                {!!Form::text('qdpddattmdv',0, array('id' => 'qdpddattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                {!!Form::text('qdpddatsxkd', 0, array('id' => 'qdpddatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                {!!Form::text('qdpddatnn',0, array('id' => 'qdpddatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                {!!Form::text('qdpddatnuoits', 0, array('id' => 'qdpddatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                {!!Form::text('qdpddatmuoi',0, array('id' => 'qdpddatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                    <h4 style="color: blue">Kết quả trúng đấu giá</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất ở<span class="require">*</span></label>
                                {!!Form::text('kqdgdato', 0, array('id' => 'kqdgdato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                {!!Form::text('kqdgdattmdv',0, array('id' => 'kqdgdattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                {!!Form::text('kqdgdatsxkd', 0, array('id' => 'kqdgdatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                {!!Form::text('kqdgdatnn',0, array('id' => 'kqdgdatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                {!!Form::text('kqdgdatnuoits', 0, array('id' => 'kqdgdatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                {!!Form::text('kqdgdatmuoi',0, array('id' => 'kqdgdatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                            </div>
                        </div>
                    </div>
                    {!!Form::hidden('mahs',$inputs['mahs'], array('id' => 'mahs','class' => 'form-control'))!!}


                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="ClickCreate()">Thêm mới</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        <!--Modal Edit-->
        <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Chỉnh sửa thông tin vị trí, địa bàn đấu giá đất</h4>
                    </div>
                    {!! Form::open(['url'=>'thongtindaugiadatct/update','id' => 'frm_update'])!!}
                    <div class="modal-body" id="tttsedit">
                        <h4 style="color: blue">Thông tin địa chính</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Loại đất<span class="require">*</span></label>
                                    {!!Form::text('edit_loaidat',null, array('id' => 'edit_loaidat','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên đường<span class="require">*</span></label>
                                    {!!Form::text('edit_tenduong',null, array('id' => 'edit_tenduong','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Loại đường, khu vực<span class="require">*</span></label>
                                    {!!Form::text('edit_loaiduong',null, array('id' => 'edit_loaiduong','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Vị trí<span class="require">*</span></label>
                                    {!!Form::text('edit_vitri',null, array('id' => 'edit_vitri','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Diện tích<span class="require">*</span></label>
                                    {!!Form::text('edit_dientich',null, array('id' => 'edit_dientich','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                        </div>
                        <h4 style="color: blue">Quyết định bảng giá đất của tỉnh</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất ở<span class="require">*</span></label>
                                    {!!Form::text('edit_qdgiadato',0, array('id' => 'edit_qdgiadato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                    {!!Form::text('edit_qdgiadattmdv', 0, array('id' => 'edit_qdgiadattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                    {!!Form::text('edit_qdgiadatsxkd',0, array('id' => 'edit_qdgiadatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                    {!!Form::text('edit_qdgiadatnn',0, array('id' => 'edit_qdgiadatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                    {!!Form::text('edit_qdgiadatnuoits',0, array('id' => 'edit_qdgiadatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                    {!!Form::text('edit_qdgiadatmuoi', 0, array('id' => 'edit_qdgiadatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                        </div>

                        <h4 style="color: blue">Quyết định phê duyệt giá khởi điểm của tỉnh</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất ở<span class="require">*</span></label>
                                    {!!Form::text('edit_qdpddato', 0, array('id' => 'edit_qdpddato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                    {!!Form::text('edit_qdpddattmdv',0, array('id' => 'edit_qdpddattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                    {!!Form::text('edit_qdpddatsxkd', 0, array('id' => 'edit_qdpddatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                    {!!Form::text('edit_qdpddatnn',0, array('id' => 'edit_qdpddatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                    {!!Form::text('edit_qdpddatnuoits', 0, array('id' => 'edit_qdpddatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                    {!!Form::text('edit_qdpddatmuoi',0, array('id' => 'edit_qdpddatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                        </div>
                        <h4 style="color: blue">Kết quả trúng đấu giá</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất ở<span class="require">*</span></label>
                                    {!!Form::text('edit_kqdgdato', 0, array('id' => 'edit_kqdgdato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất TMDV<span class="require">*</span></label>
                                    {!!Form::text('edit_kqdgdattmdv',0, array('id' => 'edit_kqdgdattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất SXKD<span class="require">*</span></label>
                                    {!!Form::text('edit_kqdgdatsxkd', 0, array('id' => 'edit_kqdgdatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất NN trổng cây <span class="require">*</span></label>
                                    {!!Form::text('edit_kqdgdatnn',0, array('id' => 'edit_kqdgdatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
                                    {!!Form::text('edit_kqdgdatnuoits', 0, array('id' => 'edit_kqdgdatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Đất làm muối<span class="require">*</span></label>
                                    {!!Form::text('edit_kqdgdatmuoi',0, array('id' => 'edit_kqdgdatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
                                </div>
                            </div>
                        {!!Form::hidden('mahs',$inputs['mahs'], array('id' => 'mahs','class' => 'form-control required'))!!}
                        {!!Form::hidden('edit_id',null, array('id' => 'edit_id','class' => 'form-control'))!!}
                    </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="ClickUpdate()">Cập nhật</button>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop