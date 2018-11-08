<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($setting->kkgia->index) && $setting->kkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][index]"/> Kê khai giá
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadvlt->index) && $setting->giadvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvlt][index]"/></td>
                                    <td>Giá dịch vụ lưu trú</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadvlt->congbo) && $setting->giadvlt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadvlt][congbo]"/></td>
                                    <td>Công bố giá dịch vụ lưu trú</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadvlt->index) && $setting->giadvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvlt][index]"/></td>
                                    <td>TPCN dành cho TE dưới 6 tuổi</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadvlt->congbo) && $setting->giadvlt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadvlt][congbo]"/></td>
                                    <td>Công bố giá TPCN dành cho TE dưới 6 tuổi</td>
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