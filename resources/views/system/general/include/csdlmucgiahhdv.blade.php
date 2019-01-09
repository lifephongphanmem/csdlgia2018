<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    CSDL về mức giá hàng hóa, dịch vụ
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->csdlmucgiahhdv->index) && $setting->csdlmucgiahhdv->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlmucgiahhdv][index]"/></td>
                                    <td>CSDL về mức giá hàng hóa, dịch vụ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->csdlmucgiahhdv->congbo) && $setting->csdlmucgiahhdv->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlmucgiahhdv][congbo]"/></td>
                                    <td>Công bố CSDL về mức giá hàng hóa, dịch vụ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.general.include.csdlmucgiahhdv.dinhgia')
                    <div class="row">
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
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->thanhlytaisan->index) && $setting->thanhlytaisan->index == 1) ? 'checked' : '' }} value="1" name="roles[thanhlytaisan][index]"/></td>
                                    <td>Thanh lý tài sản</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->thanhlytaisan->congbo) && $setting->thanhlytaisan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thanhlytaisan][congbo]"/></td>
                                    <td>Công bố giá thanh lý tài sản</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.general.include.csdlmucgiahhdv.bog')
                    @include('system.general.include.csdlmucgiahhdv.kknygia')
                </div>
            </div>
        </div>
    </div>
</div>