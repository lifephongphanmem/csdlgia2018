@if(canGeneral('dangkygia','index'))
    @if($model->level == 'DKG' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->dangkygia->index) && $permission->dangkygia->index == 1) ? 'checked' : '' }} value="1" name="roles[dangkygia][index]"/>Đăng ký giá
                        </div>
                        <div class="tools">
                            <a href="" class="expand" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: none;">
                        <div class="form-body">
                            <?php
                            $modelbog = \App\DmMhBinhOnGia::all();
                            ?>
                            @foreach($modelbog as $bog)
                                @if(canGeneral($bog->phanloai,'index'))
                                    @if($model->phanloai == $bog->phanloai || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                    <?php $phanloai = $bog->phanloai?>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <!-- BEGIN SAMPLE FORM PORTLET-->
                                            <div class="portlet box purple">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <input type="checkbox" {{ (isset($permission->$phanloai->index) && $permission->$phanloai->index == 1) ? 'checked' : '' }} value="1" name="roles[{{$phanloai}}][index]"/>Đăng ký giá {{$bog->hienthi}}
                                                    </div>
                                                    <div class="tools">
                                                        <a href="" class="expand" data-original-title="" title="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form" style="display: none;">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                                                <div class="col-md-3">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead class="action">
                                                                        <tr>
                                                                            <th class="table-checkbox" width="5%">
                                                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                                <?php
                                                                                $ttdn= 'ttdn'.$bog->phanloai;
                                                                                ?>
                                                                            </th>
                                                                            <th>Doanh nghiệp đăng ký giá {{$ttdn}}</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$ttdn->index) && $permission->$ttdn->index == 1) ? 'checked' : '' }} value="1" name="roles[{{$ttdn}}][index]"/></td>
                                                                            <td>Xem</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$ttdn->create) && $permission->$ttdn->create == 1) ? 'checked' : '' }} value="1" name="roles[{{$ttdn}}][create]"/></td>
                                                                            <td>Thêm mới</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$ttdn->edit) && $permission->$ttdn->edit == 1) ? 'checked' : '' }} value="1" name="roles[{{$ttdn}}][edit]"/></td>
                                                                            <td>Chỉnh sửa</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$ttdn->delete) && $permission->$ttdn->delete == 1) ? 'checked' : '' }} value="1" name="roles[{{$ttdn}}][delete]"/></td>
                                                                            <td>Xóa</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead class="action">
                                                                        <tr>
                                                                            <th class="table-checkbox" width="5%">
                                                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                                <?php
                                                                                $th= 'th'.$bog->phanloai;
                                                                                ?>
                                                                            </th>
                                                                            <th>Tổng hợp giá {{$th}}</th>

                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$th->baocao) && $permission->$th->baocao == 1) ? 'checked' : '' }} value="1" name="roles[{{$th}}][baocao]"/></td>
                                                                            <td>Báo cáo</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$th->congbo) && $permission->$th->congbo == 1) ? 'checked' : '' }} value="1" name="roles[{{$th}}][congbo]"/></td>
                                                                            <td>Công bố</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="checkbox" {{ (isset($permission->$th->timkiem) && $permission->$th->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[{{$th}}][timkiem]"/></td>
                                                                            <td>Tìm kiếm</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @endif
                                                            <div class="col-md-3">
                                                                <table class="table table-striped table-bordered table-hover">
                                                                    <thead class="action">
                                                                    <tr>
                                                                        <th class="table-checkbox" width="5%">
                                                                            <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                            <?php
                                                                            $kk= 'kk'.$bog->phanloai;
                                                                            ?>
                                                                        </th>
                                                                        <th>Đăng ký giá {{$kk}}</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><input type="checkbox" {{ (isset($permission->$kk->index) && $permission->$kk->index == 1) ? 'checked' : '' }} value="1" name="roles[{{$kk}}][index]"/></td>
                                                                        <td>Xem</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" {{ (isset($permission->$kk->create) && $permission->$kk->create == 1) ? 'checked' : '' }} value="1" name="roles[{{$kk}}][create]"/></td>
                                                                        <td>Thêm mới</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" {{ (isset($permission->$kk->edit) && $permission->$kk->edit == 1) ? 'checked' : '' }} value="1" name="roles[{{$kk}}][edit]"/></td>
                                                                        <td>Chỉnh sửa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" {{ (isset($permission->$kk->delete) && $permission->$kk->delete == 1) ? 'checked' : '' }} value="1" name="roles[{{$kk}}][delete]"/></td>
                                                                        <td>Xóa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" {{ (isset($permission->$kk->approve) && $permission->$kk->approve == 1) ? 'checked' : '' }} value="1" name="roles[{{$kk}}][approve]"/></td>
                                                                        <td>Xét duyệt</td>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif