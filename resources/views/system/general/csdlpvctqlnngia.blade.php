<tr style="font-weight: bold; " class="active" >
    <td style="color: #f5f5f5">D. CSDL Thông tin phục vụ công tác quản lý nhà nước về giá</td>
    <td style="text-align: center">  <input type="checkbox" {{ (isset($setting->csdlttpvctqlnn->index) && $setting->csdlttpvctqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlttpvctqlnn][index]"/></td>
    <td style="text-align: center"> <input type="checkbox" {{ (isset($setting->csdlttpvctqlnn->congbo) && $setting->csdlttpvctqlnn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[csdlttpvctqlnn][congbo]"/> </td>
</tr>