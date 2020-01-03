@extends('maincongbo')

@section('custom-style-cb')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop

@section('custom-script-cb')
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
        $(function(){
            $('#level').change(function() {
                var level = '&level=' + $('#level').val();
                var url = '/danhsachusertaphuan?' + level;
                window.location.href = url;
            });
        });
    </script>
@stop

@section('content-cb')
    <div class="container">
        <div class="row margin-top-10">
            <div class=" col-sm-12">
                <!-- BEGIN PORTLET-->
                <!--div class="portlet light"-->
                <div class="portlet-title">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet light" style="min-height: 587px">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs font-green-sharp"></i>
                                        <span class="caption-subject theme-font bold uppercase">Danh sách tài khoản tập huấn</span>
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-5">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label style="font-weight: bold">Phân loại User</label>--}}
                                            {{--<select name="level" id="level" class="form-control">--}}
                                                {{--<option value="H" {{($inputs['level'] == "H") ? 'selected' : ''}}>Đơn vị quản lý</option>--}}
                                                {{--<option value="DN" {{($inputs['level'] == "DN") ? 'selected' : ''}}>Doanh nghiệp đăng ký - kê khai giá</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <br>
                                <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center" width="2%">STT</th>
                                                <th style="text-align: center">Tên đơn vị/ Doanh nghiệp</th>
                                                <th style="text-align: center">Username</th>
                                                <th style="text-align: center" width="10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model as $key=>$tt)
                                                <tr class="odd gradeX">
                                                    <td style="text-align: center">{{$key + 1}}</td>
                                                    <td>{{$tt->name}}</td>
                                                    <td class="active">{{$tt->username}}</td>
                                                    <td><a href="{{url('login?&username='.$tt->username)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Login</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                    <!--/div-->
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
    </div>
@stop