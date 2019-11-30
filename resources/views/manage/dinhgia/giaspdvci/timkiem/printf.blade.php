@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="portlet box">
            <div class="portlet-body">
                <div class="row">
                    <div class="portlet-body form" id="form_wizard">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h1 style="text-transform: uppercase;text-align: center">kết quả tra cứu</h1>
                                </div>
                                <div class="col-md-3">
                                    <div class="in" style="float:right">
                                        <input type="submit" onclick="window.print()" value="In trang"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br> <b>Thời gian:</b>&emsp; {{date('h:i:s')}} {{getDayVn(date('Y-m-d'))}} <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br> <b>Điều kiện tìm kiếm:</b> <br>
                                        &emsp;Từ khóa:
                                        &emsp;"{{ isset($inputs['nam']) ? $inputs['nam'] : null }}" +
                                        "{{ isset($inputs['soqd']) ? $inputs['soqd'] : null }}" +
                                        "{{ isset($inputs['mota']) ? $inputs['mota'] : null }}"
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" border="1" cellspacing="0" cellpadding="0" id="data">
                        <thead>
                        <tr>
                            <th style="text-align: center">Ngày áp<br>dụng</th>
                            <th style="text-align: center">Số quyết định</th>
                            <th style="text-align: center" width="30%">Mô tả</th>
                            <th style="text-align: center" width="30%">Ghi chú</th>
                            <th style="text-align: center" width="10%">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key => $tt)
                            <tr>
                                <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                <td style="text-align: center">{{$tt->soqd}}</td>
                                <td style="text-align: left" >{{$tt->mota}}</td>
                                <td style="text-align: left">{{$tt->ghichu}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'XD')
                                        <span class="badge badge-warning">Xác định</span>
                                    @else
                                        <span class="badge badge-danger">Chưa xác định</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
