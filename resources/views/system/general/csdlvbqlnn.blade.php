<tr class="active" style="font-weight: bold">
    <td style="color: #f5f5f5">C. CSDL Văn bản quản lý nhà nước về giá</td>
    <td style="text-align: center">  <input type="checkbox" {{ (isset($setting->csdlvbqlnn->index) && $setting->csdlvbqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlvbqlnn][index]"/></td>
    <td style="text-align: center"> <input type="checkbox" {{ (isset($setting->csdlvbqlnn->congbo) && $setting->csdlvbqlnn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlvbqlnn][congbo]"/> </td>
</tr>

<tr style="font-weight: bold;font-style: italic" class="success">
    <td>&nbsp;&nbsp;Văn bản quản lý NN về giá</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->vbgia->index) && $setting->vbgia->index == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->vbgia->congbo) && $setting->vbgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][congbo]"/></td>
</tr>
<tr style="font-weight: bold;font-style: italic" class="success">
    <td>&nbsp;&nbsp;Báo cáo tổng hợp</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->bcthvegia->index) && $setting->bcthvegia->index == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->bcthvegia->congbo) && $setting->bcthvegia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][congbo]"/></td>
</tr>
<tr style="font-weight: bold;font-style: italic" class="success">
    <td>&nbsp;&nbsp;Chỉ số giá tiêu dùng</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->chisogiatieudung->index) && $setting->chisogiatieudung->index == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->chisogiatieudung->congbo) && $setting->chisogiatieudung->congbo == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][congbo]"/></td>
</tr>