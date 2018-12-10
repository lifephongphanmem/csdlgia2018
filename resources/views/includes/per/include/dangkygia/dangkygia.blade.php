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
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td> <input type="checkbox" {{ (isset($permission->dangkygia->xdttdn) && $permission->dangkygia->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[dangkygia][xdttdn]"/></td>
                                        <td>Xét duyệt thông tin doanh nghiệp</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @include('includes.per.include.dangkygia.xangdau')
                        @include('includes.per.include.dangkygia.dien')
                        @include('includes.per.include.dangkygia.khidau')
                        @include('includes.per.include.dangkygia.phan')
                        @include('includes.per.include.dangkygia.thuocbvtv')
                        @include('includes.per.include.dangkygia.vacxingsgc')
                        @include('includes.per.include.dangkygia.muoi')
                        @include('includes.per.include.dangkygia.suate6t')
                        @include('includes.per.include.dangkygia.duong')
                        @include('includes.per.include.dangkygia.thocgao')
                        @include('includes.per.include.dangkygia.thuocpcb')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif