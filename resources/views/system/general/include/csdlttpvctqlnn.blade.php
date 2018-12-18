<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    &nbsp;CSDL Thông tin phục vụ công tác quản lý nhà nước về giá
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
                                    <td width="2%">  <input type="checkbox" {{ (isset($setting->csdlttpvctqlnn->index) && $setting->csdlttpvctqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlttpvctqlnn][index]"/></td>
                                    <td>CSDL Thông tin phục vụ công tác quản lý nhà nước về giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->csdlttpvctqlnn->congbo) && $setting->csdlttpvctqlnn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlttpvctqlnn][congbo]"/> </td>
                                    <td>Công bố CSDL Thông tin phục vụ công tác quản lý nhà nước về giá</td>
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