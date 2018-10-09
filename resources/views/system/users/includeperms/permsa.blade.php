<div class="col-md-3">
    <h4 style="text-align: center;color: #0000ff  ">Thông tin Doanh nghiệp</h4>
    <table class="table table-striped table-bordered table-hover">
        <thead class="action">
        <tr>
            <th class="table-checkbox" width="5%"></th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="checkbox" {{ (isset($permission->ttdn->index) && $permission->ttdn->index == 1) ? 'checked' : '' }} value="1" name="roles[ttdn][index]"/></td>
            <td>Xem</td>
        </tr>
        <tr>
            <td><input type="checkbox" {{ (isset($permission->ttdn->dvlt) && $permission->ttdn->dvlt == 1) ? 'checked' : '' }} value="1" name="roles[ttdn][dvlt]"/></td>
            <td>Dịch vụ lưu trú</td>
        </tr>
        <tr>
            <td><input type="checkbox" {{ (isset($permission->ttdn->dvvt) && $permission->ttdn->dvvt == 1) ? 'checked' : '' }} value="1" name="roles[ttdn][dvvt]"/></td>
            <td>Dịch vụ vận tải</td>
        </tr>
        <tr>
            <td><input type="checkbox" {{ (isset($permission->ttdn->dvgs) && $permission->ttdn->dvgs == 1) ? 'checked' : '' }} value="1" name="roles[ttdn][dvgs]"/></td>
            <td>Dịch vụ giá sữa</td>
        </tr>
        <tr>
            <td><input type="checkbox" {{ (isset($permission->ttdn->dvtacn) && $permission->ttdn->dvtacn == 1) ? 'checked' : '' }} value="1" name="roles[ttdn][dvtacn]"/></td>
            <td>Dịch vụ thức ăn chăn nuôi</td>
        </tr>
        </tbody>
    </table>
</div>