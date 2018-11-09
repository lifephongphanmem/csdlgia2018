<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($setting->dinhgia->index) && $setting->dinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dinhgia][index]"/> Định giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giacldat->index) && $setting->giacldat->index == 1) ? 'checked' : '' }} value="1" name="roles[giacldat][index]"/></td>
                                    <td>Giá các loại đất</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giacldat->congbo) && $setting->giacldat->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giacldat][congbo]"/></td>
                                    <td>Công bố giá các loại đất</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadaugiadat->index) && $setting->giadaugiadat->index == 1) ? 'checked' : '' }} value="1" name="roles[giadaugiadat][index]"/></td>
                                    <td>Giá đấu giá loại đất</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadaugiadat->congbo) && $setting->giadaugiadat->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadaugiadat][congbo]"/></td>
                                    <td>Công bố giá đấu giá đất</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giathuedatnuoc->index) && $setting->giathuedatnuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuedatnuoc][index]"/></td>
                                    <td>Giá thuê mặt đất, mặt nước</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuedatnuoc->congbo) && $setting->giathuedatnuoc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuedatnuoc][congbo]"/></td>
                                    <td>Công bố giá thuê mặt đất, mặt nước</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giarung->index) && $setting->giarung->index == 1) ? 'checked' : '' }} value="1" name="roles[giarung][index]"/></td>
                                    <td>Giá rừng</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giarung->congbo) && $setting->giarung->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giarung][congbo]"/></td>
                                    <td>Công bố giá rừng</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giathuemuanhaxh->index) && $setting->giathuemuanhaxh->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuemuanhaxh][index]"/></td>
                                    <td>Giá thuê mua nhà XH</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuemuanhaxh->congbo) && $setting->giathuemuanhaxh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[cbgiathuemuanhaxh][congbo]"/></td>
                                    <td>Công bố giá thuê mua nhà XH</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->gianuocsh->index) && $setting->gianuocsh->index == 1) ? 'checked' : '' }} value="1" name="roles[gianuocsh][index]"/></td>
                                    <td>Giá nước sạch sinh hoạt</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->gianuocsh->congbo) && $setting->gianuocsh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[gianuocsh][congbo]"/></td>
                                    <td>Công bố giá nước sạch sinh hoạt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giathuetsc->index) && $setting->giathuetsc->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetsc][index]"/></td>
                                    <td>Giá thuê tài sản công</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuetsc->congbo) && $setting->giathuetsc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[cbgiathuetsc][congbo]"/></td>
                                    <td>Công bố giá thuê tài sản công</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadvgddt->index) && $setting->giadvgddt->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvgddt][index]"/></td>
                                    <td>Giá DV GD-DT</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadvgddt->congbo) && $setting->giadvgddt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadvgddt][congbo]"/></td>
                                    <td>Công bố giá DV GD-DT</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadvkcb->index) && $setting->giadvkcb->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvkcb][index]"/></td>
                                    <td>Giá DV KCB</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadvkcb->congbo) && $setting->giadvkcb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadvkcb][congbo]"/></td>
                                    <td>Công bố giá DV KCB</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->trogiatrocuoc->index) && $setting->trogiatrocuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[trogiatrocuoc][index]"/></td>
                                    <td>Mức trợ giá, trợ cước</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->trogiatrocuoc->congbo) && $setting->trogiatrocuoc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[trogiatrocuoc][congbo]"/></td>
                                    <td>Công bố mức trợ giá, trợ cước</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giahhdvk->index) && $setting->giahhdvk->index == 1) ? 'checked' : '' }} value="1" name="roles[giahhdvk][index]"/></td>
                                    <td>Giá HH-DV khác</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giahhdvk->congbo) && $setting->giahhdvk->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giahhdvk][congbo]"/></td>
                                    <td>Công bố giá HH-DV khác</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giathuetn->index) && $setting->giathuetn->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetn][index]"/></td>
                                    <td>Giá thuế tài nguyên</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuetn->congbo) && $setting->giathuetn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuetn][congbo]"/></td>
                                    <td>Công bố giá thuế tài nguyên</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->gialephitruocba->index) && $setting->gialephitruocba->index == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocba][index]"/></td>
                                    <td>Giá lệ phí trước bạ</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->gialephitruocba->congbo) && $setting->gialephitruocba->congbo == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocba][congbo]"/></td>
                                    <td>Công bố giá lệ phí trước bạ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giaphilephi->index) && $setting->giaphilephi->index == 1) ? 'checked' : '' }} value="1" name="roles[giaphilephi][index]"/></td>
                                    <td>Giá phí lệ phí</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giaphilephi->congbo) && $setting->giaphilephi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giaphilephi][congbo]"/></td>
                                    <td>Công bố giá phí lệ phí</td>
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