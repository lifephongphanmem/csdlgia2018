@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.theme.default.css')}}" />
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{ url('js/jquery.treetable.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('js/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            //$("#giadat").treetable();
            $("#example-advanced").treetable({ expandable: true });
            //$("#example-advanced").treetable('expandAll');
        });

        $(function(){
            $('#manhom').change(function() {
                var manhom =  $('#manhom').val();
                var url = '/dmhanghoacpi/danhsach?manhom='+manhom;
                window.location.href = url;
            });
        })
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
        function clickdelete(){
            $('#frm_delete').submit();
        }
        function expand(){
            $("#example-advanced").treetable('expandAll');
        }
        function collapse(){
            $("#example-advanced").treetable('collapseAll');
        }
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin chỉ số giá tiêu dùng <small> tháng {{$model_hs->thang}} năm {{$model_hs->nam}}</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        <button type="button" class="btn btn-default btn-xs mbs" id="expand" onclick="expand()"><i class="fa fa-angle-double-down"></i>&nbsp;Mở tất cả</button>
                        <button type="button" class="btn btn-default btn-xs mbs" id="collapse" onclick="collapse()"><i class="fa fa-angle-double-up"></i>&nbsp;Đóng tất cả</button>
                    </div>
                </div>
                {!! Form::model($model_hs, ['method' => 'POST', 'url'=>'hstonghopcpi/update', 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn']) !!}
                <input type="hidden" name="mahs" id="mahs" value="{{$model_hs->mahs}}" />
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Tháng<span class="require">*</span></label>
                                {!!Form::text('thang',null, array('id' => 'thang','class' => 'form-control required', 'readonly'))!!}
                            </div>
                        </div>
                        <!--/span-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Năm<span class="require">*</span></label>
                                {!!Form::text('nam',null, array('id' => 'nam','class' => 'form-control required', 'readonly'))!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nội dung chi tiết</label>
                                {!!Form::textarea('noidung',null, array('id' => 'noidung','class' => 'form-control', 'rows'=>'3'))!!}
                            </div>

                        </div>
                    </div>


                    <!--/row-->
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>


                    <table id="example-advanced" class="treetable">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="15%">Mã hàng hóa</th>
                            <th style="text-align: center">Tên hàng hóa</th>
                            <th style="text-align: center" width="10%">Quyền số</th>
                            <th style="text-align: center" width="10%">Chỉ số</br>giá</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $model_cap1 = $model->where('capdo','1'); ?>
                        @foreach($model_cap1 as $cap1)
                            <tr data-tt-id="{{$cap1->mahh}}" style="display: none">
                                <td>{{$cap1->mahh}}</td>
                                <td>{{$cap1->tenhh}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->quyenso,2)}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->chiso,2)}}</td>
                                <td>

                                </td>
                            </tr>
                            <?php $model_cap2 = $model->where('capdo','2')->where('magoc',$cap1->mahh); ?>
                            @foreach($model_cap2 as $cap2)
                                <tr data-tt-id="{{$cap2->mahh}}" data-tt-parent-id="{{$cap2->magoc}}">
                                    <td>{{$cap2->mahh}}</td>
                                    <td>{{$cap2->tenhh}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->quyenso, 2)}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->chiso, 2)}}</td>
                                    <td>

                                    </td>
                                </tr>
                                <?php $model_cap3 = $model->where('capdo','3')->where('magoc',$cap2->mahh); ?>
                                @foreach($model_cap3 as $cap3)
                                    <tr data-tt-id="{{$cap3->mahh}}" data-tt-parent-id="{{$cap3->magoc}}">
                                        <td>{{$cap3->mahh}}</td>
                                        <td>{{$cap3->tenhh}}</td>
                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->quyenso, 2)}}</td>
                                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->chiso, 2)}}</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <?php $model_cap4 = $model->where('capdo','4')->where('magoc',$cap3->mahh); ?>
                                    @foreach($model_cap4 as $cap4)
                                        <tr data-tt-id="{{$cap4->mahh}}" data-tt-parent-id="{{$cap4->magoc}}">
                                            <td class="text-right">{{$cap4->mahh}}</td>
                                            <td>{{$cap4->tenhh}}</td>
                                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->quyenso)}}</td>
                                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->chiso, 2)}}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div style="text-align: center">
                    <!--button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button-->
                    <a href="{{url('chisocpi/danhsach?nam='.date('Y').'&diaban='.$model_hs->district)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <!--Modal node thêm-->

    <!--Model delete-->

    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop