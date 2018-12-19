@if(canGeneral('csdlttpvctqlnn','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                         CSDL thông tin phục vụ công tác quản lý nhà nước về giá
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
                                        <td width="2%"><input type="checkbox" {{ (isset($permission->csdlttpvctqlnn->index) && $permission->csdlttpvctqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlttpvctqlnn][index]"/></td>
                                        <td>CSDL thông tin phục vụ công tác quản lý nhà nước về giá</td>
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
@endif
@endif