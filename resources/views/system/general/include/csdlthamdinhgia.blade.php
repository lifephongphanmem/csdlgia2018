<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    CSDL Thẩm định giá tại địa phương
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->csdlthamdinhgia->index) && $setting->csdlthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlthamdinhgia][index]"/></td>
                                    <td>&nbsp;CSDL Thẩm định giá tại địa phương</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->csdlthamdinhgia->congbo) && $setting->csdlthamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlthamdinhgia][congbo]"/></td>
                                    <td>Công bố CSDL Thẩm định giá tại địa phương</td>
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dmhhthamdinhgia->index) && $setting->dmhhthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][index]"/></td>
                                    <td>DM hàng hóa thẩm định giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dmhhthamdinhgia->congbo) && $setting->dmhhthamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][congbo]"/></td>
                                    <td>Công bố DM hàng hóa thẩm định giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->thamdinhgia->index) && $setting->thamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][index]"/></td>
                                    <td>Thẩm định giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->thamdinhgia->congbo) && $setting->thamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][congbo]"/></td>
                                    <td>Công bố thẩm định giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->cungcapgia->index) && $setting->cungcapgia->index == 1) ? 'checked' : '' }} value="1" name="roles[cungcapgia][index]"/></td>
                                    <td>Cung cấp giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->cungcapgia->congbo) && $setting->cungcapgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[cungcapgia][congbo]"/></td>
                                    <td>Công bố cung cấp giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->thamdinhgiahh->index) && $setting->thamdinhgiahh->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgiahh][index]"/></td>
                                    <td>Thẩm định giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->thamdinhgiahh->congbo) && $setting->thamdinhgiahh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgiahh][congbo]"/></td>
                                    <td>Công bố thẩm định giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>