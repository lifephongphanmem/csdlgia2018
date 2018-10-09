@extends('maincongbo')

@section('custom-style-cb')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.theme.default.css')}}" />
    <!-- END THEME STYLES -->
@stop


@section('custom-script-cb')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{ url('js/jquery.treetable.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('js/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            $("#giadat").treetable();
            $("#example-advanced").treetable({ expandable: true });
            $("#example-advanced").treetable('expandAll');
        });

        $(function(){
            $('#diaban').change(function() {
                var url ='/vtdat?maso='+$('#diaban').val();
                window.location.href = url;
            });
        })
    </script>

    <script>
        function InputMask() {
            //$(function(){
            // Input Mask
            if ($.isFunction($.fn.inputmask)) {
                $("[data-mask]").each(function (i, el) {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if (placeholder.length) {
                        opts[placeholder] = placeholder;
                    }

                    switch (mask.toLowerCase()) {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');
                            ;

                            mask = "999,999,999.99";

                            if ($this.data('mask').toLowerCase() == 'rcurrency') {
                                mask += ' ' + sign;
                            }
                            else {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup: true,
                                groupSize: 3,
                                radixPoint: attrDefault($this, 'rad', '.'),
                                groupSeparator: attrDefault($this, 'dec', ',')
                            });
                    }

                    if (is_regex) {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
    </script>
@stop

@section('content-cb')
    <div class="container">
        <div class="row margin-top-10">
            <div class=" col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font hide"></i>
                            <span class="caption-subject theme-font bold uppercase">thông tin giá đất theo vị trí, địa điểm</span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box">
                                    <div class="portlet-title">
                                        <div class="caption"></div>
                                        <div class="actions">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-offset-2 col-md-2">
                                                <div class="form-group">
                                                    <label style="margin-top: 5px;color: #000000" class="control-label text-right"> Địa bàn quản lý:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="diaban" id="diaban" class="form-control">
                                                        <option value="ALL">--Chọn địa bàn quản lý--</option>
                                                        @foreach($model_diaban as $diaban)
                                                            <option value="{{$diaban->macapdo}}" {{$macapdo==$diaban->macapdo?'selected':''}}>{{$diaban->vitri}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="portlet-body">
                                        <!--form id="reveal">
                                            <input type="text" name="nodeId" placeholder="nodeId" id="revealNodeId">
                                            <input type="submit" value="Reveal"><br>
                                        </form-->

                                        <table id="example-advanced" class="treetable">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center">Vị trí đất</th>
                                                <th style="text-align: center" width="10%">Căn cứ quyết định</th>
                                                <th style="text-align: center" width="10%">Giá đất</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <!-- Viết hàm đệ quy để tính toán -->
                                            <?php $model_cap1 = $model->where('capdo','1'); ?>
                                            @foreach($model_cap1 as $cap1)
                                                <tr data-tt-id="{{$cap1->maso}}">
                                                    <td>{{$cap1->vitri}}</td>
                                                    <td>{{$cap1->soquyetdinh}}</td>
                                                    <td>{{dinhdangso($cap1->giadat)}}</td>
                                                </tr>
                                                <?php $model_cap2 = $model->where('magoc',$cap1->maso); ?>
                                                @foreach($model_cap2 as $cap2)
                                                    <tr data-tt-id="{{$cap2->maso}}" data-tt-parent-id="{{$cap2->magoc}}">
                                                        <td>{{$cap2->vitri}}</td>
                                                        <td>{{$cap2->soquyetdinh}}</td>
                                                        <td>{{dinhdangso($cap2->giadat)}}</td>
                                                    </tr>
                                                    <?php $model_cap3 = $model->where('magoc',$cap2->maso); ?>
                                                    @foreach($model_cap3 as $cap3)
                                                        <tr data-tt-id="{{$cap3->maso}}" data-tt-parent-id="{{$cap3->magoc}}">
                                                            <td>{{$cap3->vitri}}</td>
                                                            <td>{{$cap3->soquyetdinh}}</td>
                                                            <td>{{dinhdangso($cap3->giadat)}}</td>

                                                        </tr>
                                                        <?php $model_cap4 = $model->where('magoc',$cap3->maso); ?>
                                                        @foreach($model_cap4 as $cap4)
                                                            <tr data-tt-id="{{$cap4->maso}}" data-tt-parent-id="{{$cap4->magoc}}">
                                                                <td>{{$cap4->vitri}}</td>
                                                                <td>{{$cap4->soquyetdinh}}</td>
                                                                <td>{{dinhdangso($cap4->giadat)}}</td>

                                                            </tr>
                                                            <?php $model_cap5 = $model->where('magoc',$cap4->maso); ?>
                                                            @foreach($model_cap5 as $cap5)
                                                                <tr data-tt-id="{{$cap5->maso}}" data-tt-parent-id="{{$cap5->magoc}}">
                                                                    <td>{{$cap5->vitri}}</td>
                                                                    <td>{{$cap5->soquyetdinh}}</td>
                                                                    <td>{{dinhdangso($cap5->giadat)}}</td>

                                                                </tr>
                                                                <?php $model_cap6 = $model->where('magoc',$cap5->maso); ?>
                                                                @foreach($model_cap6 as $cap6)
                                                                    <tr data-tt-id="{{$cap6->maso}}" data-tt-parent-id="{{$cap6->magoc}}">
                                                                        <td>{{$cap6->vitri}}</td>
                                                                        <td>{{$cap6->soquyetdinh}}</td>
                                                                        <td>{{dinhdangso($cap6->giadat)}}</td>

                                                                    </tr>
                                                                    <?php $model_cap7 = $model->where('magoc',$cap6->maso); ?>
                                                                    @foreach($model_cap7 as $cap7)
                                                                        <tr data-tt-id="{{$cap7->maso}}" data-tt-parent-id="{{$cap7->magoc}}">
                                                                            <td>{{$cap7->vitri}}</td>
                                                                            <td>{{$cap7->soquyetdinh}}</td>
                                                                            <td>{{dinhdangso($cap7->giadat)}}</td>

                                                                        </tr>
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--div class="col-md-offset-5 col-md-2">
                    <a class="btn blue" href="{{url('/giathuetn')}}"><i class="fa fa-mail-reply"></i> Quay lại</a>
                </div-->
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
@stop 