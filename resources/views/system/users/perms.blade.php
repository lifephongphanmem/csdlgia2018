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
    {!! Form::open(['url' => '/users/phan-quyen'])!!}
    <div class="row">
        <div class="col-md-12">
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
                <hr>
                <div class="portlet-body">
                    @include('system.users.include.perms.csdlmucgiahhdv')
                    @include('system.users.include.perms.csdlthamdinhgia')
                    @include('system.users.include.perms.csdlvbqlnn')
                    @include('system.users.include.perms.csdlttpvctqlnn')
                    @include('system.users.include.perms.system')
                </div>
            </div>
        </div>
        <div class="col-md-12" style="text-align: center">
            @if($model->level == 'X')
                <a href="{{url('users?&level='.$model->level.'&mahuyen='.$model->mahuyen)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            @else
                <a href="{{url('users?&level='.$model->level)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            @endif
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
        </div>
    </div>

    {!! Form::close() !!}
        <!-- END EXAMPLE TABLE PORTLET-->
        <div class="clearfix"></div>


@stop