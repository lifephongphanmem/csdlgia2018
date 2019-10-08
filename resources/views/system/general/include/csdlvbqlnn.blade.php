<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    &nbsp;CSDL Văn bản quản lý nhà nước về giá
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
                                    <td width="2%">  <input type="checkbox" {{ (isset($setting->csdlvbqlnn->index) && $setting->csdlvbqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlvbqlnn][index]"/></td>
                                    <td>CSDL Văn bản quản lý nhà nước về giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->csdlvbqlnn->congbo) && $setting->csdlvbqlnn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlvbqlnn][congbo]"/> </td>
                                    <td>Công bố CSDL Văn bản quản lý nhà nước về giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->giacpi->index) && $setting->giacpi->index == 1) ? 'checked' : '' }} value="1" name="roles[giacpi][index]"/></td>--}}
                                    {{--<td>Giá CPI</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->giacpi->congbo) && $setting->giacpi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giacpi][congbo]"/></td>--}}
                                    {{--<td>Công bố giá CPI</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bcthvegia->index) && $setting->bcthvegia->index == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][index]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->bcthvegia->congbo) && $setting->bcthvegia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][congbo]"/></td>
                                    <td>Công bố báo cáo tổng hợp</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->chisogiatieudung->index) && $setting->chisogiatieudung->index == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][index]"/></td>
                                    <td>Chỉ số giá tiêu dùng</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->chisogiatieudung->congbo) && $setting->chisogiatieudung->congbo == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][congbo]"/></td>
                                    <td>Công bố chỉ số giá tiêu dùng</td>
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