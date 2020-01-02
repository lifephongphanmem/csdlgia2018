<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5" >A .CSDL về mức giá hàng hóa dịch vụ</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->csdlmucgiahhdv->index) && $setting->csdlmucgiahhdv->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlmucgiahhdv][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->csdlmucgiahhdv->congbo) && $setting->csdlmucgiahhdv->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlmucgiahhdv][congbo]"/></td>
</tr>
<tr style="font-style: italic; font-weight: bold" class="success" >
    <td>&nbsp;&nbsp;Giá hàng hóa, dịch vụ do UBND định giá</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dinhgia->index) && $setting->dinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dinhgia][index]"/> </td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dinhgia->congbo) && $setting->dinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dinhgia][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá các loại đất</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giacldat->index) && $setting->giacldat->index == 1) ? 'checked' : '' }} value="1" name="roles[giacldat][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giacldat->congbo) && $setting->giacldat->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giacldat][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá đất phân loại</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadatpl->index) && $setting->giadatpl->index == 1) ? 'checked' : '' }} value="1" name="roles[giadatpl][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadatpl->congbo) && $setting->giadatpl->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadatpl][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá đất cụ thể của dự án</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadatduan->index) && $setting->giadatduan->index == 1) ? 'checked' : '' }} value="1" name="roles[giadatduan][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadatduan->congbo) && $setting->giadatduan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadatduan][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá đấu giá loại đất</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadaugiadat->index) && $setting->giadaugiadat->index == 1) ? 'checked' : '' }} value="1" name="roles[giadaugiadat][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadaugiadat->congbo) && $setting->giadaugiadat->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadaugiadat][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá đấu giá đất và tài sản gắn liền đất</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->daugiadatts->index) && $setting->daugiadatts->index == 1) ? 'checked' : '' }} value="1" name="roles[daugiadatts][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->daugiadatts->congbo) && $setting->daugiadatts->congbo == 1) ? 'checked' : '' }} value="1" name="roles[daugiadatts][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá thuế tài nguyên</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuetn->index) && $setting->giathuetn->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetn][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuetn->congbo) && $setting->giathuetn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuetn][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá thuê mặt đất, mặt nước</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuedatnuoc->index) && $setting->giathuedatnuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuedatnuoc][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuedatnuoc->congbo) && $setting->giathuedatnuoc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuedatnuoc][congbo]"/></td>
</tr>
<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá rừng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giarung->index) && $setting->giarung->index == 1) ? 'checked' : '' }} value="1" name="roles[giarung][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giarung->congbo) && $setting->giarung->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giarung][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá thuê mua nhà XH</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuemuanhaxh->index) && $setting->giathuemuanhaxh->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuemuanhaxh][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuemuanhaxh->congbo) && $setting->giathuemuanhaxh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuemuanhaxh][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá thuê nhà công vụ</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuenhacongvu->index) && $setting->giathuenhacongvu->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuenhacongvu][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuenhacongvu->congbo) && $setting->giathuenhacongvu->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuenhacongvu][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá bán nhà tái định cư</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->bannhataidinhcu->index) && $setting->bannhataidinhcu->index == 1) ? 'checked' : '' }} value="1" name="roles[bannhataidinhcu][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->bannhataidinhcu->congbo) && $setting->bannhataidinhcu->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bannhataidinhcu][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá nước sạch sinh hoạt</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->gianuocsh->index) && $setting->gianuocsh->index == 1) ? 'checked' : '' }} value="1" name="roles[gianuocsh][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->gianuocsh->congbo) && $setting->gianuocsh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[gianuocsh][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá thuê tài sản công</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuetscong->index) && $setting->giathuetscong->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetscong][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathuetscong->congbo) && $setting->giathuetscong->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathuetscong][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá DV GD-DT</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadvgddt->index) && $setting->giadvgddt->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvgddt][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadvgddt->congbo) && $setting->giadvgddt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadvgddt][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá DV KCB</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadvkcb->index) && $setting->giadvkcb->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvkcb][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giadvkcb->congbo) && $setting->giadvkcb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giadvkcb][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Mức trợ giá, trợ cước</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->trogiatrocuoc->index) && $setting->trogiatrocuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[trogiatrocuoc][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->trogiatrocuoc->congbo) && $setting->trogiatrocuoc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[trogiatrocuoc][congbo]"/></td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Giá sp-dv công ích</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giaspdvci->index) && $setting->giaspdvci->index == 1) ? 'checked' : '' }} value="1" name="roles[giaspdvci][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giaspdvci->congbo) && $setting->giaspdvci->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giaspdvci][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success" >
    <td>&nbsp;&nbsp;Giá HH-DV khác</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giahhdvk->index) && $setting->giahhdvk->index == 1) ? 'checked' : '' }} value="1" name="roles[giahhdvk][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giahhdvk->congbo) && $setting->giahhdvk->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giahhdvk][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá thị trường</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathitruong->index) && $setting->giathitruong->index == 1) ? 'checked' : '' }} value="1" name="roles[giathitruong][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giathitruong->congbo) && $setting->giathitruong->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giathitruong][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá lệ phí trước bạ</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->gialephitruocba->index) && $setting->gialephitruocba->index == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocba][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->gialephitruocba->congbo) && $setting->gialephitruocba->congbo == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocba][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá lệ phí trước bạ đối với nhà</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->gialephitruocbanha->index) && $setting->gialephitruocbanha->index == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocbanha][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->gialephitruocbanha->congbo) && $setting->gialephitruocbanha->congbo == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocbanha][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá phí lệ phí</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giaphilephi->index) && $setting->giaphilephi->index == 1) ? 'checked' : '' }} value="1" name="roles[giaphilephi][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giaphilephi->congbo) && $setting->giaphilephi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giaphilephi][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Thanh lý tài sản</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->thanhlytaisan->index) && $setting->thanhlytaisan->index == 1) ? 'checked' : '' }} value="1" name="roles[thanhlytaisan][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->thanhlytaisan->congbo) && $setting->thanhlytaisan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thanhlytaisan][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá gốc vật liệu xây dựng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giagocvlxd->index) && $setting->giagocvlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[giagocvlxd][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giagocvlxd->congbo) && $setting->giagocvlxd->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giagocvlxd][congbo]"/></td>
</tr>
<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá giao dịch bất động sản</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giabatdongsan->index) && $setting->giabatdongsan->index == 1) ? 'checked' : '' }} value="1" name="roles[giabatdongsan][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->giabatdongsan->congbo) && $setting->giabatdongsan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[giabatdongsan][congbo]"/></td>
</tr>
<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->muataisan->index) && $setting->muataisan->index == 1) ? 'checked' : '' }} value="1" name="roles[muataisan][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->muataisan->congbo) && $setting->muataisan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[muataisan][congbo]"/></td>
</tr>

<tr style="font-style: italic; font-weight: bold" class="success">
    <td>&nbsp;&nbsp;Kê khai - đăng ký giá hàng hóa, dịch vụ thuộc danh mục</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->kknygia->index) && $setting->kknygia->index == 1) ? 'checked' : '' }} value="1" name="roles[kknygia][index]"/></td>
    <td style="text-align: center"> <input type="checkbox" {{ (isset($setting->kknygia->congbo) && $setting->kknygia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kknygia][congbo]"/> </td>
</tr>

<tr class="warning">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Kê khai giá - đăng ký giá</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->kkgia->index) && $setting->kkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][index]"/></td>
    <td style="text-align: center"> <input type="checkbox" {{ (isset($setting->kkgia->congbo) && $setting->kkgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][congbo]"/> </td>
</tr>