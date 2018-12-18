<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                     Kê khai - niêm yết giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->kknydkgia->index) && $setting->kknydkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kknydkgia][index]"/></td>
                                    <td>Kê khai - niêm yết giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->kknydkgia->congbo) && $setting->kknydkgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kknydkgia][congbo]"/> </td>
                                    <td>Công bố Kê khai - niêm yết giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->kkgia->index) && $setting->kkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][index]"/></td>
                                    <td>Kê khai giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->kkgia->congbo) && $setting->kkgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][congbo]"/> </td>
                                    <td>Công bố kê khai giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dvlt->index) && $setting->dvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][index]"/></td>
                                    <td>Giá dịch vụ lưu trú</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dvlt->congbo) && $setting->dvlt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][congbo]"/></td>
                                    <td>Công bố giá dịch vụ lưu trú</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->tpcnte6t->index) && $setting->tpcnte6t->index == 1) ? 'checked' : '' }} value="1" name="roles[tpcnte6t][index]"/></td>
                                    <td>TPCN dành cho TE dưới 6 tuổi</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->tpcnte6t->congbo) && $setting->tpcnte6t->congbo == 1) ? 'checked' : '' }} value="1" name="roles[tpcnte6t][congbo]"/></td>
                                    <td>Công bố giá TPCN dành cho TE dưới 6 tuổi</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->tacn->index) && $setting->tacn->index == 1) ? 'checked' : '' }} value="1" name="roles[tacn][index]"/></td>
                                    <td>Thức ăn chăn nuôi</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->tacn->congbo) && $setting->tacn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[tacn][congbo]"/></td>
                                    <td>Công bố giá thức ăn chăn nuôi</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dvvt->index) && $setting->dvvt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][index]"/></td>
                                    <td>Dịch vụ vận tải</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->tacn->congbo) && $setting->tacn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[tacn][congbo]"/></td>
                                    <td>Công bố giá dịch vụ vận tải</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->vtxk->index) && $setting->vtxk->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxk][index]"/></td>
                                    <td>Vận tải xe khách</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->vtxk->congbo) && $setting->vtxk->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtxk][congbo]"/></td>
                                    <td>Công bố giá vận tải xe khách</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->vtxb->index) && $setting->vtxb->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxb][index]"/></td>
                                    <td>Vận tải xe buýt</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->vtxb->congbo) && $setting->vtxb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtxb][congbo]"/></td>
                                    <td>Công bố giá vận tải xe buýt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->vtxtx->index) && $setting->vtxtx->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxtx][index]"/></td>
                                    <td>Vận tải xe taxi</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->vtxtx->congbo) && $setting->vtxtx->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtxtx][congbo]"/></td>
                                    <td>Công bố giá vận tải xe taxi</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->vtch->index) && $setting->vtch->index == 1) ? 'checked' : '' }} value="1" name="roles[vtch][index]"/></td>
                                    <td>Vận tải khác</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->vtch->congbo) && $setting->vtch->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtch][congbo]"/></td>
                                    <td>Công bố giá vận tải khác</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>