    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        Thẩm định giá TSNN
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
                                        <td width="2%"><input type="checkbox" {{ (isset($setting->thamdinhgia->index) && $setting->thamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][index]"/></td>
                                        <td>Thẩm định giá</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td width="2%"><input type="checkbox" {{ (isset($setting->thamdinhgia->congbo) && $setting->thamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][congbo]"/></td>
                                        <td>Công bố thẩm định giá</td>
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