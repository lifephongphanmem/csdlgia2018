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
    </script>

@stop

@section('content')

    <h3 class="page-title">
        Cấu hình <small>&nbsp;chức năng của chương trình</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            {!! Form::open(['url' => 'setting'])!!}
            <div class="portlet box blue">
                <div class="portlet-body">
                        <div class="table-toolbar">
                        </div>
                        <!--Giá dịch vụ-->
                        <div class="row">
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvlt->dvlt) && $setting->dvlt->dvlt == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][dvlt]"/></td>
                                            <td>Dịch vụ lưu trú</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvvt->vtxk) && $setting->dvvt->vtxk == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][vtxk]"/></td>
                                            <td>Vận tải xe khách</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvvt->vtxb) && $setting->dvvt->vtxb == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][vtxb]"/></td>
                                            <td>Vận tải xe buýt</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvvt->vtxtx) && $setting->dvvt->vtxtx == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][vtxtx]"/></td>
                                            <td>Vận tải xe taxi</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvvt->vtch) && $setting->dvvt->vtch == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][vtch]"/></td>
                                            <td>Vận tải chở hàng</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvgs->dvgs) && $setting->dvgs->dvgs == 1) ? 'checked' : '' }} value="1" name="roles[dvgs][dvgs]"/></td>
                                            <td>Kê khai giá sữa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->dvtacn->dvtacn) && $setting->dvtacn->dvtacn == 1) ? 'checked' : '' }} value="1" name="roles[dvtacn][dvtacn]"/></td>
                                            <td>Kê khai thức ăn chăn nuôi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <!--End Giá dịch vụ-->
                        <!--Giá hàng hoá-->
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->hhtt->hhtt) && $setting->hhtt->hhtt == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][hhtt]"/></td>
                                            <td>Hàng hóa thị trường</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->hhdvtn->hhdvtn) && $setting->hhdvtn->hhdvtn == 1) ? 'checked' : '' }} value="1" name="roles[hhdvtn][hhdvtn]"/></td>
                                            <td>Hàng hóa dịch vụ trong nước</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->hhxnk->hhxnk) && $setting->hhxnk->hhxnk == 1) ? 'checked' : '' }} value="1" name="roles[hhxnk][hhxnk]"/></td>
                                            <td>Hàng hóa xuất nhập khẩu</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->kkgtw->kkgtw) && $setting->kkgtw->kkgtw == 1) ? 'checked' : '' }} value="1" name="roles[kkgtw][kkgtw]"/></td>
                                            <td>Kê khai giá trung ương</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->kkgdp->kkgdp) && $setting->kkgdp->kkgdp == 1) ? 'checked' : '' }} value="1" name="roles[kkgdp][kkgdp]"/></td>
                                            <td>Kê khai giá địa phương</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->tsnnnhadat->tsnnnhadat) && $setting->tsnnnhadat->tsnnnhadat == 1) ? 'checked' : '' }} value="1" name="roles[tsnnnhadat][tsnnnhadat]"/></td>
                                            <td>Tài sản nhà nước (nhà và đất)</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->tsnnotokhac->tsnnotokhac) && $setting->tsnnotokhac->tsnnotokhac == 1) ? 'checked' : '' }} value="1" name="roles[tsnnotokhac][tsnnotokhac]"/></td>
                                            <td>Tài sản nhà nước ( ôtô - tài sản khác)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($setting->gttruocba->gttruocba) && $setting->gttruocba->gttruocba == 1) ? 'checked' : '' }} value="1" name="roles[gttruocba][gttruocba]"/></td>
                                        <td>Giá thuế trước bạ</td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" {{ (isset($setting->gthuetn->gthuetn) && $setting->gthuetn->gthuetn == 1) ? 'checked' : '' }} value="1" name="roles[gthuetn][gthuetn]"/></td>
                                        <td>Giá thuế tài nguyên</td>
                                    </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->tdgia->tdgia) && $setting->tdgia->tdgia == 1) ? 'checked' : '' }} value="1" name="roles[tdgia][tdgia]"/></td>
                                            <td>Thẩm định giá</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->congbogia->congbogia) && $setting->congbogia->congbogia == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][congbogia]"/></td>
                                            <td>Công bố giá</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->ttqd->ttqd) && $setting->ttqd->ttqd == 1) ? 'checked' : '' }} value="1" name="roles[ttqd][ttqd]"/></td>
                                            <td>Thông tư, quyết định</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->loaidat->loaidat) && $setting->loaidat->loaidat == 1) ? 'checked' : '' }} value="1" name="roles[loaidat][loaidat]"/></td>
                                            <td>Giá đất theo phân loại đất</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->vitri->vitri) && $setting->vitri->vitri == 1) ? 'checked' : '' }} value="1" name="roles[vitri][vitri]"/></td>
                                            <td>Giá đất theo vị trí</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--End Giá HH-->
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <div class="row" style="text-align: center">
            <div class="col-md-12">
                <a href="{{url('general')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </div>
        {!! Form::close() !!}

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>



@stop