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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>