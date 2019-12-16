<tr style="font-weight: bold" class="active">
    <td style="color: #f5f5f5">B. CSDL Thẩm định giá tại địa phương</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->csdlthamdinhgia->index) && $setting->csdlthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlthamdinhgia][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->csdlthamdinhgia->congbo) && $setting->csdlthamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlthamdinhgia][congbo]"/></td>
</tr>
<tr style="font-weight: bold;font-style: italic" class="success">
    <td>&nbsp;&nbsp;DM hàng hóa thẩm định giá</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dmhhthamdinhgia->index) && $setting->dmhhthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->dmhhthamdinhgia->congbo) && $setting->dmhhthamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][congbo]"/></td>
</tr>
<tr style="font-weight: bold;font-style: italic" class="success">
    <td>&nbsp;&nbsp;Thẩm định giá</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->thamdinhgia->index) && $setting->thamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->thamdinhgia->congbo) && $setting->thamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][congbo]"/></td>
</tr>
<tr style="font-weight: bold;font-style: italic" class="success">
    <td>&nbsp;&nbsp;Cung cấp giá</td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->cungcapgia->index) && $setting->cungcapgia->index == 1) ? 'checked' : '' }} value="1" name="roles[cungcapgia][index]"/></td>
    <td style="text-align: center"><input type="checkbox" {{ (isset($setting->cungcapgia->congbo) && $setting->cungcapgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[cungcapgia][congbo]"/></td>
</tr>