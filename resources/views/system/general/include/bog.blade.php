<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($setting->bog->index) && $setting->bog->index == 1) ? 'checked' : '' }} value="1" name="roles[bog][index]"/>Bình ổn giá
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
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bpbog->index) && $setting->bpbog->index == 1) ? 'checked' : '' }} value="1" name="roles[bpbog][index]"/></td>
                                    <td>Biện pháp bình ổn giá</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->bpbog->congbo) && $setting->bpbog->congbo == 1) ? 'checked' : '' }} value="1" name="roles[bpbog][congbo]"/></td>
                                    <td>Công bố bình ổn giá</td>
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
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgxangdau->index) && $setting->dkgxangdau->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgxangdau][index]"/></td>
                                    <td>ĐKG xăng dầu</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgxangdau->congbo) && $setting->dkgxangdau->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgxangdau][congbo]"/></td>
                                    <td>Công bố ĐKG xăng dầu</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgdien->index) && $setting->dkgdien->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgdien][index]"/></td>
                                    <td>Đăng ký giá điện</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgdien->congbo) && $setting->dkgdien->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgdien][congbo]"/></td>
                                    <td>Công bố đăng ký giá điện</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgkhidau->index) && $setting->dkgkhidau->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgkhidau][index]"/></td>
                                    <td>Đăng ký giá khí dầu mỏ</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgkhidau->congbo) && $setting->dkgkhidau->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgkhidau][congbo]"/></td>
                                    <td>Công bố đăng ký giá khí dầu mỏ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgphan->index) && $setting->dkgphan->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgphan][index]"/></td>
                                    <td>ĐKG phân đạm Urê; phân NPK</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgphan->congbo) && $setting->dkgphan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgphan][congbo]"/></td>
                                    <td>Công bố ĐKG phân đạm Urê; phân NPK</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgthuocbvtv->index) && $setting->dkgthuocbvtv->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgthuocbvtv][index]"/></td>
                                    <td>ĐKG thuốc bảo vệ thực vật</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgthuocbvtv->congbo) && $setting->dkgthuocbvtv->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgthuocbvtv][congbo]"/></td>
                                    <td>Công bố ĐKG thuốc bảo vệ thực vật</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgvacxingsgc->index) && $setting->dkgvacxingsgc->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgvacxingsgc][index]"/></td>
                                    <td>ĐKG vắc-xin phòng bệnh gia súc, gia cầm</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgvacxingsgc->congbo) && $setting->dkgvacxingsgc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgvacxingsgc][congbo]"/></td>
                                    <td>Công bố ĐKG vắc-xin phòng bệnh gia súc, gia cầm</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgmuoi->index) && $setting->dkgmuoi->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgmuoi][index]"/></td>
                                    <td>Đăng ký giá muối ăn</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgmuoi->congbo) && $setting->dkgmuoi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgmuoi][congbo]"/></td>
                                    <td>Công bố đăng ký giá muối ăn</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgsuate6t->index) && $setting->dkgsuate6t->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgsuate6t][index]"/></td>
                                    <td>ĐKG sữa cho trẻ em dưới 6 tuổi</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgsuate6t->congbo) && $setting->dkgsuate6t->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgsuate6t][congbo]"/></td>
                                    <td>Công bố ĐKG sữa cho trẻ em dưới 6 tuổi</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgduong->index) && $setting->dkgduong->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgduong][index]"/></td>
                                    <td>Đăng ký giá Đường ăn</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgduong->congbo) && $setting->dkgduong->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgduong][congbo]"/></td>
                                    <td>Công bố ĐKG ĐƯờng ăn</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgthocgao->index) && $setting->dkgthocgao->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgthocgao][index]"/></td>
                                    <td>ĐKG Thóc, gạo tẻ thường</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgthocgao->congbo) && $setting->dkgthocgao->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgthocgao][congbo]"/></td>
                                    <td>Công bố ĐKG Thóc, gạo tẻ thường</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($setting->dkgthuocpcb->index) && $setting->dkgthuocpcb->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgthuocpcb][index]"/></td>
                                    <td>ĐKG thuốc phòng, chữa bệnh cho người</td>
                                </tr>
                                <tr>
                                    <td width="2"><input type="checkbox" {{ (isset($setting->dkgthuocpcb->congbo) && $setting->dkgthuocpcb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[dkgthuocpcb][congbo]"/></td>
                                    <td>Công bố ĐKG thuốc phòng, chữa bệnh cho người</td>
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