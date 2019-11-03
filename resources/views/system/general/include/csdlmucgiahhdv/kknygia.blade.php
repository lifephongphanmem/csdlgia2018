<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                     Kê khai - niêm yết giá
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->kknygia->index) && $setting->kknygia->index == 1) ? 'checked' : '' }} value="1" name="roles[kknygia][index]"/></td>
                                    <td>Kê khai - niêm yết giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->kknygia->congbo) && $setting->kknygia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kknygia][congbo]"/> </td>
                                    <td>Công bố Kê khai - niêm yết giá</td>
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->kkgia->index) && $setting->kkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][index]"/></td>
                                    <td>Kê khai giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->kkgia->congbo) && $setting->kkgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][congbo]"/> </td>
                                    <td>Công bố kê khai giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->dvlt->index) && $setting->dvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][index]"/></td>--}}
                                    {{--<td>Giá dịch vụ lưu trú</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->dvlt->congbo) && $setting->dvlt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][congbo]"/></td>--}}
                                    {{--<td>Công bố giá dịch vụ lưu trú</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->tpcnte6t->index) && $setting->tpcnte6t->index == 1) ? 'checked' : '' }} value="1" name="roles[tpcnte6t][index]"/></td>--}}
                                    {{--<td>TPCN dành cho TE dưới 6 tuổi</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->tpcnte6t->congbo) && $setting->tpcnte6t->congbo == 1) ? 'checked' : '' }} value="1" name="roles[tpcnte6t][congbo]"/></td>--}}
                                    {{--<td>Công bố giá TPCN dành cho TE dưới 6 tuổi</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->tacn->index) && $setting->tacn->index == 1) ? 'checked' : '' }} value="1" name="roles[tacn][index]"/></td>--}}
                                    {{--<td>Thức ăn chăn nuôi</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->tacn->congbo) && $setting->tacn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[tacn][congbo]"/></td>--}}
                                    {{--<td>Công bố giá thức ăn chăn nuôi</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->dvvt->index) && $setting->dvvt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][index]"/></td>--}}
                                    {{--<td>Dịch vụ vận tải</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->tacn->congbo) && $setting->tacn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[tacn][congbo]"/></td>--}}
                                    {{--<td>Công bố giá dịch vụ vận tải</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->vtxk->index) && $setting->vtxk->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxk][index]"/></td>--}}
                                    {{--<td>Vận tải xe khách</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->vtxk->congbo) && $setting->vtxk->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtxk][congbo]"/></td>--}}
                                    {{--<td>Công bố giá vận tải xe khách</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->vtxb->index) && $setting->vtxb->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxb][index]"/></td>--}}
                                    {{--<td>Vận tải xe buýt</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->vtxb->congbo) && $setting->vtxb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtxb][congbo]"/></td>--}}
                                    {{--<td>Công bố giá vận tải xe buýt</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->vtxtx->index) && $setting->vtxtx->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxtx][index]"/></td>--}}
                                    {{--<td>Vận tải xe taxi</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->vtxtx->congbo) && $setting->vtxtx->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtxtx][congbo]"/></td>--}}
                                    {{--<td>Công bố giá vận tải xe taxi</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->vtch->index) && $setting->vtch->index == 1) ? 'checked' : '' }} value="1" name="roles[vtch][index]"/></td>--}}
                                    {{--<td>Vận tải khác</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->vtch->congbo) && $setting->vtch->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vtch][congbo]"/></td>--}}
                                    {{--<td>Công bố giá vận tải khác</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->vlxd->index) && $setting->vlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[vlxd][index]"/></td>--}}
                                    {{--<td>Vật liệu xây dựng</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->vlxd->congbo) && $setting->vlxd->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vlxd][congbo]"/></td>--}}
                                    {{--<td>Công bố giá vật liệu xây dựng</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->xmtxd->index) && $setting->xmtxd->index == 1) ? 'checked' : '' }} value="1" name="roles[xmtxd][index]"/></td>--}}
                                    {{--<td>Xi măng, thép xây dựng</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->xmtxd->congbo) && $setting->xmtxd->congbo == 1) ? 'checked' : '' }} value="1" name="roles[xmtxd][congbo]"/></td>--}}
                                    {{--<td>Công bố giá xi măng, thép xây dựng</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->dvhdtm->index) && $setting->dvhdtm->index == 1) ? 'checked' : '' }} value="1" name="roles[dvhdtm][index]"/></td>--}}
                                    {{--<td>Dịch vụ hỗ trợ hoạt động thương mại</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->dvhdtm->congbo) && $setting->dvhdtm->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dvhdtm][congbo]"/></td>--}}
                                    {{--<td>Công bố giá Dịch vụ hỗ trợ hoạt động thương mại</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->than->index) && $setting->than->index == 1) ? 'checked' : '' }} value="1" name="roles[than][index]"/></td>--}}
                                    {{--<td>Than</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->than->congbo) && $setting->dvhdtm->congbo == 1) ? 'checked' : '' }} value="1" name="roles[than][congbo]"/></td>--}}
                                    {{--<td>Công bố giá than</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->giay->index) && $setting->giay->index == 1) ? 'checked' : '' }} value="1" name="roles[giay][index]"/></td>--}}
                                    {{--<td>Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->giay->congbo) && $setting->giay->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giay][congbo]"/></td>--}}
                                    {{--<td>Công bố giá Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->sach->index) && $setting->sach->index == 1) ? 'checked' : '' }} value="1" name="roles[sach][index]"/></td>--}}
                                    {{--<td>Sách giáo khoa</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->sach->congbo) && $setting->sach->congbo == 1) ? 'checked' : '' }} value="1" name="roles[sach][congbo]"/></td>--}}
                                    {{--<td>Công bố giá Sách giáo khoa</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->etanol->index) && $setting->etanol->index == 1) ? 'checked' : '' }} value="1" name="roles[etanol][index]"/></td>--}}
                                    {{--<td>Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->etanol->congbo) && $setting->etanol->congbo == 1) ? 'checked' : '' }} value="1" name="roles[etanol][congbo]"/></td>--}}
                                    {{--<td>Công bố giá Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td width="2%"><input type="checkbox" {{ (isset($setting->kcbtn->index) && $setting->kcbtn->index == 1) ? 'checked' : '' }} value="1" name="roles[kcbtn][index]"/></td>--}}
                                    {{--<td>Dịch vụ khám bệnh, chữa bệnh cho người<br> tại cơ sở khám bệnh, chữa bệnh tư nhân; <br>khám bệnh, chữa bệnh theo yêu cầu tại<br> cơ sở khám bệnh, chữa bệnh của nhà nước</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td width="2"><input type="checkbox" {{ (isset($setting->kcbtn->congbo) && $setting->kcbtn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kcbtn][congbo]"/></td>--}}
                                    {{--<td>Công bố giá Dịch vụ khám bệnh, chữa bệnh cho người<br> tại cơ sở khám bệnh, chữa bệnh tư nhân; <br>khám bệnh, chữa bệnh theo yêu cầu tại<br> cơ sở khám bệnh, chữa bệnh của nhà nước</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>