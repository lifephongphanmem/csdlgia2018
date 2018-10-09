@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>

@stop

@section('content')

    <h3 class="page-title">
        Quản lý phân quyền chức năng cho<small>&nbsp;tài khoản</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['url' => '/users/phan-quyen'])!!}
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption" style="color: #000000">
                        Tên tài khoản: {{$model->name .' ( Tài khoản truy cập: '. $model->username. ')' }}
                        <input type="hidden" name="id" id="id" value="{{$model->id}}">
                    </div>
                    <div class="actions">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        @if($model->sadmin == 'sa' || $model->sadmin == 'satc' || $model->sadmin == 'sact' || $model->sadmin == 'sagt' )
                            @include('system.users.includeperms.permsa')
                        @else
                            @if( $model->level != 'DVLT' && $model->level != 'DVVT' && $model->level != 'DVGS' && $model->level != 'DVTACN')
                                @include('system.users.includeperms.perm_hhdv')
                            @endif
                            @if(canGeneral('dvlt','dvlt'))
                                @include('system.users.includeperms.permdvlt')
                            @endif
                            @if(canGeneral('dvvt','vtxk') || canGeneral('dvvt','vtxb') || canGeneral('vtxtx','vtxb') || canGeneral('dvvt','vtch'))
                                @include('system.users.includeperms.permdvvt')
                            @endif
                            @if(canGeneral('dvgs','dvgs'))
                                @include('system.users.includeperms.permdvgs')
                            @endif
                            @if(canGeneral('dvtacn','dvtacn'))
                                @include('system.users.includeperms.permdvtacn')
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div style="text-align: center">
            <?php
                if($model->level == 'satc' || $model->level == 'sact' || $model->level == 'sagt' || $model->level == 'sa')
                    $phanloai = 'HT';
                else
                    $phanloai = $model->level;
            ?>

            <a href="{{url('users?&phanloai='.$phanloai)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
        </div>
        {!! Form::close() !!}
        <!-- END EXAMPLE TABLE PORTLET-->
        {!! Form::hidden('id', $model->id)!!}
        {!! Form::close() !!}
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>


</div>
@stop