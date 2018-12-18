<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    Bình ổn giá
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bog->index) && $setting->bog->index == 1) ? 'checked' : '' }} value="1" name="roles[bog][index]"/></td>
                                    <td>Bình ổn giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bog->congbo) && $setting->bog->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bog][congbo]"/></td>
                                    <td>Công bố bình ổn giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bpbog->index) && $setting->bpbog->index == 1) ? 'checked' : '' }} value="1" name="roles[bpbog][index]"/></td>
                                    <td>Biện pháp bình ổn giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bpbog->congbo) && $setting->bpbog->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bpbog][congbo]"/></td>
                                    <td>Công bố biện pháp bình ổn giá</td>
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
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->dangkygia->index) && $setting->dangkygia->index == 1) ? 'checked' : '' }} value="1" name="roles[dangkygia][index]"/></td>
                                    <td>Đăng ký giá</td>
                                </tr>
                                <tr>
                                    <td width="2%"> <input type="checkbox" {{ (isset($setting->dangkygia->congbo) && $setting->dangkygia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dangkygia][congbo]"/> </td>
                                    <td>Công bố đăng ký giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                            $model = \App\DmMhBinhOnGia::all();
                        ?>
                        @foreach($model as $bog)
                            <?php $phanloai = $bog->phanloai?>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->$phanloai->index) && $setting->$phanloai->index == 1) ? 'checked' : '' }} value="1" name="roles[{{$phanloai}}][index]"/></td>
                                    <td>ĐKG {{$bog->hienthi}}</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->$phanloai->congbo) && $setting->$phanloai->congbo == 1) ? 'checked' : '' }} value="1" name="roles[{{$phanloai}}][congbo]"/></td>
                                    <td>Công bố ĐKG {{$bog->hienthi}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>