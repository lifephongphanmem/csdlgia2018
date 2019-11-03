<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    Định giá
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dinhgia->index) && $setting->dinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dinhgia][index]"/> </td>
                                    <td>Định giá</td>
                                </tr> <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dinhgia->congbo) && $setting->dinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dinhgia][congbo]"/></td>
                                    <td>Công bố định giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadatpl->index) && $setting->giadatpl->index == 1) ? 'checked' : '' }} value="1" name="roles[giadatpl][index]"/></td>
                                    <td>Giá đất phân loại</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadatpl->congbo) && $setting->giadatpl->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadatpl][congbo]"/></td>
                                    <td>Công bố giá đất phân loại</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giadatduan->index) && $setting->giadatduan->index == 1) ? 'checked' : '' }} value="1" name="roles[giadatduan][index]"/></td>
                                    <td>Giá đất cụ thể của dự án</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giadatduan->congbo) && $setting->giadatduan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadatduan][congbo]"/></td>
                                    <td>Công bố giá đất cụ thể của dự án</td>
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->daugiadatts->index) && $setting->daugiadatts->index == 1) ? 'checked' : '' }} value="1" name="roles[daugiadatts][index]"/></td>
                                    <td>Giá đấu giá đất và tài sản gắn liền đất</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->daugiadatts->congbo) && $setting->daugiadatts->congbo == 1) ? 'checked' : '' }} value="1" name="roles[daugiadatts][congbo]"/></td>
                                    <td>Công bố giá đấu giá đất và tài sản gắn liền đất</td>
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
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuemuanhaxh->congbo) && $setting->giathuemuanhaxh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuemuanhaxh][congbo]"/></td>
                                    <td>Công bố giá thuê mua nhà XH</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{--Giá thuê nhà công vụ--}}
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giathuenhacongvu->index) && $setting->giathuenhacongvu->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuenhacongvu][index]"/></td>
                                    <td>Giá thuê nhà công vụ</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuenhacongvu->congbo) && $setting->giathuenhacongvu->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuenhacongvu][congbo]"/></td>
                                    <td>Công bố giá thuê nhà công vụ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{--Giá bán nhà tái định cư--}}
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bannhataidinhcu->index) && $setting->bannhataidinhcu->index == 1) ? 'checked' : '' }} value="1" name="roles[bannhataidinhcu][index]"/></td>
                                    <td>Giá bán nhà tái định cư</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->bannhataidinhcu->congbo) && $setting->bannhataidinhcu->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bannhataidinhcu][congbo]"/></td>
                                    <td>Công bố giá bán nhà tái định cư</td>
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giathuetscong->index) && $setting->giathuetscong->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetscong][index]"/></td>
                                    <td>Giá thuê tài sản công</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giathuetscong->congbo) && $setting->giathuetscong->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuetscong][congbo]"/></td>
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->giaspdvci->index) && $setting->giaspdvci->index == 1) ? 'checked' : '' }} value="1" name="roles[giaspdvci][index]"/></td>
                                    <td>Giá sp-dv công ích</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->giaspdvci->congbo) && $setting->giaspdvci->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giaspdvci][congbo]"/></td>
                                    <td>Công bố giá sp-dv công ích</td>
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