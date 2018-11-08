<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($setting->vbqlnn->index) && $setting->vbqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[vbqlnn][index]"/> Văn bản quản lý nhà nước về giá
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->vbgia->index) && $setting->vbgia->index == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][index]"/></td>
                                    <td>Văn bản quản lý NN về giá</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->vbgia->congbo) && $setting->vbgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][congbo]"/></td>
                                    <td>Công bố văn bản quản lý NN về giá</td>
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