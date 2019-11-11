<script>

    function editPag(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/giavtxkct/editpag',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_tendvcu').val(data.tendvcu);
                $('#edit_dvcu').val(data.dvcu);

                $('#edit_sltgdvt').val(data.sltgdvt);
                $('#edit_sltgtt').val(data.sltgtt);
                $('#edit_sltggc').val(data.sltggc);

                $('#edit_chiphinldvt').val(data.chiphinldvt);
                $('#edit_chiphinltt').val(data.chiphinltt);
                $('#edit_chiphinlgc').val(data.chiphinlgc);

                $('#edit_chiphincdvt').val(data.chiphincdvt);
                $('#edit_chiphinctt').val(data.chiphinctt);
                $('#edit_chiphincgc').val(data.chiphincgc);

                $('#edit_chiphikhdvt').val(data.chiphikhdvt);
                $('#edit_chiphikhtt').val(data.chiphikhtt);
                $('#edit_chiphikhdv').val(data.chiphikhdv);

                $('#edit_chiphisxkddtdvt').val(data.chiphisxkddtdvt);
                $('#edit_chiphisxkddttt').val(data.chiphisxkddttt);
                $('#edit_chiphisxkddtgc').val(data.chiphisxkddtgc);

                $('#edit_chiphisxcdvt').val(data.chiphisxcdvt);
                $('#edit_chiphisxctt').val(data.chiphisxctt);
                $('#edit_chiphisxcgc').val(data.chiphisxcgc);

                $('#edit_chiphitcdvt').val(data.chiphitcdvt);
                $('#edit_chiphitctt').val(data.chiphitctt);
                $('#edit_chiphitcgc').val(data.chiphitcgc);

                $('#edit_chiphibhdvt').val(data.chiphibhdvt);
                $('#edit_chiphibhtt').val(data.chiphibhtt);
                $('#edit_chiphibhgc').val(data.chiphibhgc);

                $('#edit_chiphiqldvt').val(data.chiphiqldvt);
                $('#edit_chiphiqltt').val(data.chiphiqltt);
                $('#edit_chiphiqlgc').val(data.chiphiqlgc);

                $('#edit_tchiphisxkd').val(getdl(data.chiphinltt) + getdl(data.chiphinctt) + getdl(data.chiphikhtt)
                                        + getdl(data.chiphisxkddttt) + getdl(data.chiphisxctt) + getdl(data.chiphitctt)
                                        + getdl(data.chiphibhtt) + getdl(data.chiphiqltt));

                $('#edit_chiphidvkdvt').val(data.chiphidvkdvt);
                $('#edit_chiphidvktt').val(data.chiphidvktt);
                $('#edit_chiphidvkgc').val(data.chiphidvkgc);

                $('#edit_giathanhtb').val(getdl(data.chiphinltt) + getdl(data.chiphinctt) + getdl(data.chiphikhtt)
                + getdl(data.chiphisxkddttt) + getdl(data.chiphisxctt) + getdl(data.chiphitctt)
                + getdl(data.chiphibhtt) + getdl(data.chiphiqltt)- getdl(data.chiphidvktt));

                $('#edit_giathanhtbsp').val((getdl(data.chiphinltt) + getdl(data.chiphinctt) + getdl(data.chiphikhtt)
                + getdl(data.chiphisxkddttt) + getdl(data.chiphisxctt) + getdl(data.chiphitctt)
                + getdl(data.chiphibhtt) + getdl(data.chiphiqltt)- getdl(data.chiphidvktt))/getdl(data.sltgtt));

                $('#edit_giaitrinhctcp').val(data.giaitrinhctcp);

                $('#edit_pagid').val(data.id);
            },
            error: function (message) {
                toastr.error(message, 'Lỗi!');
            }
        });
    }
    function ClickUpPag(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//        alert(CSRF_TOKEN);
        $.ajax({
            url: '/giavtxkct/updatepag',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id:  $('#edit_pagid').val(),
                mahs: $('#mahs').val(),

                dvcu: $('#edit_dvcu').val(),
                sltgdvt: $('#edit_sltgdvt').val(),
                sltgtt: $('#edit_sltgtt').val(),
                sltggc: $('#edit_sltggc').val(),

                chiphinldvt: $('#edit_chiphinldvt').val(),
                chiphinltt: $('#edit_chiphinltt').val(),
                chiphinlgc: $('#edit_chiphinlgc').val(),

                chiphincdvt: $('#edit_chiphincdvt').val(),
                chiphinctt: $('#edit_chiphinctt').val(),
                chiphincgc: $('#edit_chiphincgc').val(),

                chiphikhdvt: $('#edit_chiphikhdvt').val(),
                chiphikhtt: $('#edit_chiphikhtt').val(),
                chiphikhdv: $('#edit_chiphikhdv').val(),

                chiphisxkddtdvt: $('#edit_chiphisxkddtdvt').val(),
                chiphisxkddttt: $('#edit_chiphisxkddttt').val(),
                chiphisxkddtgc: $('#edit_chiphisxkddtgc').val(),

                chiphisxcdvt: $('#edit_chiphisxcdvt').val(),
                chiphisxctt: $('#edit_chiphisxctt').val(),
                chiphisxcgc: $('#edit_chiphisxcgc').val(),

                chiphitcdvt: $('#edit_chiphitcdvt').val(),
                chiphitctt: $('#edit_chiphitctt').val(),
                chiphitcgc: $('#edit_chiphitcgc').val(),

                chiphibhdvt: $('#edit_chiphibhdvt').val(),
                chiphibhtt: $('#edit_chiphibhtt').val(),
                chiphibhgc: $('#edit_chiphibhgc').val(),

                chiphiqldvt: $('#edit_chiphiqldvt').val(),
                chiphiqltt: $('#edit_chiphiqltt').val(),
                chiphiqlgc: $('#edit_chiphiqlgc').val(),

                chiphidvkdvt: $('#edit_chiphidvkdvt').val(),
                chiphidvktt: $('#edit_chiphidvktt').val(),
                chiphidvkgc: $('#edit_chiphidvkgc').val(),

                giaitrinhctcp: $('#edit_giaitrinhctcp').val()

            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin kê khai giá", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-pag').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function tinhtoan(){
        var tc = getdl($('#edit_chiphinltt').val()) +

                getdl($('#edit_chiphinctt').val()) +

                getdl($('#edit_chiphikhtt').val()) +

                getdl($('#edit_chiphisxkddttt').val()) +

                getdl($('#edit_chiphisxctt').val()) +

                getdl($('#edit_chiphitctt').val()) +

                getdl($('#edit_chiphibhtt').val()) +

                getdl($('#edit_chiphiqltt').val());
        var cp = getdl($('#edit_chiphidvktt').val());
        var giathanhtb = tc-cp;
        var giathanhtbsp = giathanhtb/getdl($('#edit_sltgtt').val());

        document.getElementById("edit_tchiphisxkd").value= tc;
        document.getElementById("edit_giathanhtb").value= giathanhtb;
        document.getElementById("edit_giathanhtbsp").value= giathanhtbsp;

    }
</script>

<div class="modal fade in" id="modal-pag" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Phương án giá</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label">Tên dịch vụ cung ứng</label>
                            <div><input type="text" id="edit_tendvcu" name="edit_tendvcu" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label">Đơn vị cung ứng</label>
                            <div><input type="text" name="edit_dvcu" id="edit_dvcu" class="form-control" ></div>
                        </div>
                    </div>
                </div>
                <p style="font-weight: bold"> I. BẢNG TỔNG HỢP TÍNH GIÁ</p>
                <table class="table table-bordered table-hover">
                    <thead><tr>
                        <th width="5%">STT</th>
                        <th width="35%">Nội dung chi phí</th>
                        <th width="10%">Đơn vị tính</th>
                        <th width="10%">Thành tiền</th>
                        <th >Ghi chú</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;font-weight: bold">A</td>
                        <td style="font-weight: bold">Sản lượng tính giá</td>
                        <td style="text-align: center"><input type="text" id="edit_sltgdvt" name="edit_sltgdvt" class="form-control" style="text-align: center;font-weight: bold"></td>
                        <td style="text-align: right">{!!Form::text('edit_sltgtt',null, array('id' => 'edit_sltgtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td><input type="text" id="edit_sltggc" name="edit_sltggc" class="form-control" style="font-weight: bold"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">B</td>
                        <td style="font-weight: bold">Chi phí sản xuất, kinh doanh</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">I</td>
                        <td style="font-weight: bold">Chi phí trực tiếp</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">1</td>
                        <td>Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphinldvt" name="edit_chiphinldvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphinltt',null, array('id' => 'edit_chiphinltt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphinlgc" name="edit_chiphinlgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>Chi phí nhân công trực tiếp</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphincdvt" name="edit_chiphincdvt" class="form-control" style="text-align: center;"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphinctt',null, array('id' => 'edit_chiphinctt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphincgc" name="edit_chiphincgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>Chi phí khấu hao máy móc, thiết bị trực tiếp (trường hợp được trích khấu hao)</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphikhdvt" name="edit_chiphikhdvt" class="form-control" style="text-align: center;"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphikhtt',null, array('id' => 'edit_chiphikhtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphikhgc" name="edit_chiphikhgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">4</td>
                        <td>Chi phí sản xuất, kinh doanh (chưa tính ở mục 1, 2 ,3 theo đặc thù)</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphisxkddtdvt" name="edit_chiphisxkddtdvt" class="form-control" style="text-align: center;"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphisxkddttt',null, array('id' => 'edit_chiphisxkddttt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphisxkddtgc" name="edit_chiphisxkddtgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">II</td>
                        <td style="font-weight: bold">Chi phí chung</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">5</td>
                        <td>Chi phí sản xuất chung</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphisxcdvt" name="edit_chiphisxcdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphisxctt',null, array('id' => 'edit_chiphisxctt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphisxcgc" name="edit_chiphisxcgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">6</td>
                        <td>Chi phí tài chính (nếu có)</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphitcdvt" name="edit_chiphitcdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphitctt',null, array('id' => 'edit_chiphitctt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphitcgc" name="edit_chiphitcgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">7</td>
                        <td>Chi phí bán hàng</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphibhdvt" name="edit_chiphibhdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphibhtt',null, array('id' => 'edit_chiphibhtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphibhgc" name="edit_chiphibhgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">8</td>
                        <td>Chi phí quản lý</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphiqldvt" name="edit_chiphiqldvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphiqltt',null, array('id' => 'edit_chiphiqltt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphiqlgc" name="edit_chiphiqlgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold"></td>
                        <td style="font-weight: bold">Tổng chi phí sản xuất, kinh doanh (TC)</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_tchiphisxkd',null, array('id' => 'edit_tchiphisxkd','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">C</td>
                        <td style="font-weight: bold">Chi phí phân bố cho dịch vụ khác (nếu có)(CP)</td>
                        <td style="text-align: center"><input type="text" id="edit_chiphidvkdvt" name="edit_chiphidvkdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_chiphidvktt',null, array('id' => 'edit_chiphidvktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tinhtoan()"))!!}</td>
                        <td><input type="text" id="edit_chiphidvkgc" name="edit_chiphidvkgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">D</td>
                        <td style="font-weight: bold">Giá thành toàn bộ (TC-CP)</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_giathanhtb',null, array('id' => 'edit_giathanhtb','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">Đ</td>
                        <td style="font-weight: bold">Giá thành toàn bộ 01(một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_giathanhtbsp',null, array('id' => 'edit_giathanhtbsp','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <p style="font-weight: bold">II. GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN MỤC CHI PHÍ (từ mục 1 đến mục 8 bảng tổng hợp tính giá)</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div><input type="text" id="edit_giaitrinhctcp" name="edit_giaitrinhctcp" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_pagid" id="edit_pagid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn blue" onclick="ClickUpPag()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>