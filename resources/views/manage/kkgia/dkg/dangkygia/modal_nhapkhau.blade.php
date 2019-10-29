<script>

    function editnhapkhau(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/kkkgct/editnhapkhau',
        type: 'GET',
        data: {
            _token: CSRF_TOKEN,
            id: id
        },
        dataType: 'JSON',
        success: function (data) {
            $('#edit_nktenhh').val(data.tenhh);
            $('#edit_nkdonvisxkd').val(data.nkdonvisxkd);
            $('#edit_nkqcpc').val(data.nkqcpc);

            $('#edit_nksanluongdvt').val(data.nksanluongdvt);
            $('#edit_nksanluongtt').val(data.nksanluongtt);
            $('#edit_nksanluonggc').val(data.nksanluonggc);
            $('#edit_nkgiamuackdvt').val(data.nkgiamuackdvt);
            $('#edit_nkgiamuacktt').val(data.nkgiamuacktt);
            $('#edit_nkgiamuackgc').val(data.nkgiamuackgc);

            $('#edit_nkthuedvt').val(data.nkthuedvt);
            $('#edit_nkthuett').val(data.nkthuett);
            $('#edit_nkthueghichu').val(data.nkthueghichu);

            $('#edit_nkthuettdbdvt').val(data.nkthuettdbdvt);
            $('#edit_nkthuettdbtt').val(data.nkthuettdbtt);
            $('#edit_nkthuettdbgc').val(data.nkthuettdbgc);

            $('#edit_nkthuephikdvt').val(data.nkthuephikdvt);
            $('#edit_nkthuephiktt').val(data.nkthuephiktt);
            $('#edit_nkthuephikgc').val(data.nkthuephikgc);

            $('#edit_nktienkdvt').val(data.nktienkdvt);
            $('#edit_nktienktt').val(data.nktienktt);
            $('#edit_nktienkgc').val(data.nktienkgc);

            $('#edit_nkchiphitcdvt').val(data.nkchiphitcdvt);
            $('#edit_nkchiphitctt').val(data.nkchiphitctt);
            $('#edit_nkchiphitcgc').val(data.nkchiphitcgc);

            $('#edit_nkchiphibhdvt').val(data.nkchiphibhdvt);
            $('#edit_nkchiphibhtt').val(data.nkchiphibhtt);
            $('#edit_nkchiphibhgc').val(data.nkchiphibhgc);

            $('#edit_nkchiphiqldvt').val(data.nkchiphiqldvt);
            $('#edit_nkchiphiqltt').val(data.nkchiphiqltt);
            $('#edit_nkchiphiqlgc').val(data.nkchiphiqlgc);

            $('#edit_nktcp').val(data.nkgiamuacktt+data.nkthuett+data.nkthuettdbtt+data.nkthuephiktt+data.nktienktt
                +data.nkchiphitctt+data.nkchiphibhtt+data.nkchiphiqltt);


            $('#edit_nkgiathanh1spdvt').val(data.nkgiathanh1spdvt);
            $('#edit_nkgiathanh1sptt').val(data.nkgiathanh1sptt);
            $('#edit_nkgiathanh1spgc').val(data.nkgiathanh1spgc);

            $('#edit_nkloinhuandkdvt').val(data.nkloinhuandkdvt);
            $('#edit_nkloinhuandktt').val(data.nkloinhuandktt);
            $('#edit_nkloinhuandkgc').val(data.nkloinhuandkgc);

            $('#edit_nkthuegtgtkdvt').val(data.nkthuegtgtkdvt);
            $('#edit_nkthuegtgtktt').val(data.nkthuegtgtktt);
            $('#edit_nkthuegtgtkgc').val(data.nkthuegtgtkgc);

            $('#edit_nkgiabandkdvt').val(data.nkgiabandkdvt);
            $('#edit_nkgiabandktt').val(data.nkgiabandktt);
            $('#edit_nkgiabandkgc').val(data.nkgiabandkgc);

            $('#edit_nkgtgiamuack').val(data.nkgtgiamuack);
            $('#edit_nkgtthuenk').val(data.nkgtthuenk);
            $('#edit_nkgtthuettdb').val(data.nkgtthuettdb);
            $('#edit_nkgtthuephik').val(data.nkgtthuephik);
            $('#edit_nkgttienk').val(data.nkgttienk);
            $('#edit_nkgtchiphitc').val(data.nkgtchiphitc);
            $('#edit_nkgtchiphibh').val(data.nkgtchiphibh);
            $('#edit_nkgtchiphiql').val(data.nkgtchiphiql);
            $('#edit_nkgtloinhuandk').val(data.nkgtloinhuandk);
            $('#edit_nkgtthuegtgt').val(data.nkgtthuegtgt);
            $('#edit_nkgtgiabandk').val(data.nkgtgiabandk);

            $('#edit_nkid').val(data.id);
        },
        error: function (message) {
            toastr.error(message, 'Lỗi!');
        }
    });
}
    function ClickUpNhapKhau(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/kkkgct/updatenhapkhau',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id:  $('#edit_nkid').val(),
                mahs: $('#mahs').val(),
                nkdonvisxkd:  $('#edit_nkdonvisxkd').val(),
                nkqcpc:  $('#edit_nkqcpc').val(),

                nksanluongdvt:  $('#edit_nksanluongdvt').val(),
                nksanluongtt:  $('#edit_nksanluongtt').val(),
                nksanluonggc:  $('#edit_nksanluonggc').val(),

                nkgiamuackdvt:  $('#edit_nkgiamuackdvt').val(),
                nkgiamuacktt:  $('#edit_nkgiamuacktt').val(),
                nkgiamuackgc:  $('#edit_nkgiamuackgc').val(),

                nkthuedvt:  $('#edit_nkthuedvt').val(),
                nkthuett:  $('#edit_nkthuett').val(),
                nkthueghichu:  $('#edit_nkthueghichu').val(),

                nkthuettdbdvt:  $('#edit_nkthuettdbdvt').val(),
                nkthuettdbtt:  $('#edit_nkthuettdbtt').val(),
                nkthuettdbgc:  $('#edit_nkthuettdbgc').val(),

                nkthuephikdvt:  $('#edit_nkthuephikdvt').val(),
                nkthuephiktt:  $('#edit_nkthuephiktt').val(),
                nkthuephikgc:  $('#edit_nkthuephikgc').val(),

                nktienkdvt:  $('#edit_nktienkdvt').val(),
                nktienktt:  $('#edit_nktienktt').val(),
                nktienkgc:  $('#edit_nktienkgc').val(),

                nkchiphitcdvt:  $('#edit_nkchiphitcdvt').val(),
                nkchiphitctt:  $('#edit_nkchiphitctt').val(),
                nkchiphitcgc:  $('#edit_nkchiphitcgc').val(),

                nkchiphibhdvt:  $('#edit_nkchiphibhdvt').val(),
                nkchiphibhtt:  $('#edit_nkchiphibhtt').val(),
                nkchiphibhgc:  $('#edit_nkchiphibhgc').val(),

                nkchiphiqldvt:  $('#edit_nkchiphiqldvt').val(),
                nkchiphiqltt:  $('#edit_nkchiphiqltt').val(),
                nkchiphiqlgc:  $('#edit_nkchiphiqlgc').val(),

                nkgiathanh1spdvt:  $('#edit_nkgiathanh1spdvt').val(),
                nkgiathanh1sptt:  $('#edit_nkgiathanh1sptt').val(),
                nkgiathanh1spgc:  $('#edit_nkgiathanh1spgc').val(),

                nkloinhuandkdvt:  $('#edit_nkloinhuandkdvt').val(),
                nkloinhuandktt:  $('#edit_nkloinhuandktt').val(),
                nkloinhuandkgc:  $('#edit_nkloinhuandkgc').val(),

                nkthuegtgtkdvt:  $('#edit_nkthuegtgtkdvt').val(),
                nkthuegtgtktt:  $('#edit_nkthuegtgtktt').val(),
                nkthuegtgtkgc:  $('#edit_nkthuegtgtkgc').val(),

                nkgiabandkdvt:  $('#edit_nkgiabandkdvt').val(),
                nkgiabandktt:  $('#edit_nkgiabandktt').val(),
                nkgiabandkgc:  $('#edit_nkgiabandkgc').val(),

                nkgtgiamuack:  $('#edit_nkgtgiamuack').val(),
                nkgtthuenk:  $('#edit_nkgtthuenk').val(),
                nkgtthuettdb:  $('#edit_nkgtthuettdb').val(),
                nkgtthuephik:  $('#edit_nkgtthuephik').val(),
                nkgttienk:  $('#edit_nkgttienk').val(),
                nkgtchiphitc:  $('#edit_nkgtchiphitc').val(),
                nkgtchiphibh:  $('#edit_nkgtchiphibh').val(),
                nkgtchiphiql:  $('#edit_nkgtchiphiql').val(),
                nkgtloinhuandk:  $('#edit_nkgtloinhuandk').val(),
                nkgtthuegtgt:  $('#edit_nkgtthuegtgt').val(),
                nkgtgiabandk:  $('#edit_nkgtgiabandk').val(),


            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin kê khai giá", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-nhapkhau').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function tongchiphi(){
        var tongchiphi = getdl($('#edit_nkgiamuacktt').val())
        +getdl($('#edit_nkthuett').val())
        +getdl($('#edit_nkthuettdbtt').val())
        +getdl($('#edit_nkthuephiktt').val())
        +getdl($('#edit_nktienktt').val())
        +getdl($('#edit_nkchiphitctt').val())
        +getdl($('#edit_nkchiphibhtt').val())
        +getdl($('#edit_nkchiphiqltt').val());

        document.getElementById("edit_nktcp").value=tongchiphi;
    }
</script>

<div class="modal fade in" id="modal-nhapkhau" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Thuyết minh cơ cấu tính giá hàng hóa dịch vụ đăng ký giá (đối với mặt hàng nhập khẩu)</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label">Tên hàng hóa dịch vụ:</label>
                            <div><input type="text" id="edit_nktenhh" name="edit_nktenhh" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label">Đơn vị sản xuất kinh doanh</label>
                            <div><input type="text" name="edit_nkdonvisxkd" id="edit_nkdonvisxkd" class="form-control" ></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">Quy cách phẩm chất; điều kiện bán hàng hoặc giao hàng; chính sách khuyến mại
                            , giảm giá, chiết kháu cho các đối tượng khách hàng (nếu có)</label>
                            <div><input type="text" id="edit_nkqcpc" name="edit_nkqcpc" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <p style="font-weight: bold"> I. BẢNG TỔNG HỢP TÍNH GÍ VỐN, GIÁ BÁN HÀNG HÓA NHẬP KHẨU CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
                <table class="table table-bordered table-hover">
                    <thead><tr>
                        <th width="5%">STT</th>
                        <th width="35%">Khoản mục chi phí</th>
                        <th width="10%">Đơn vị tính</th>
                        <th width="10%">Thành tiền</th>
                        <th >Ghi chú</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;font-weight: bold">A</td>
                        <td style="font-weight: bold">Sản lượng nhập khẩu</td>
                        <td style="text-align: center"><input type="text" id="edit_nksanluongdvt" name="edit_nksanluongdvt" class="form-control" style="text-align: center;font-weight: bold"></td>
                        <td style="text-align: right">{!!Form::text('edit_nksanluongtt',null, array('id' => 'edit_nksanluongtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td><input type="text" id="edit_nksanluonggc" name="edit_nksanluonggc" class="form-control" style="font-weight: bold"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">B</td>
                        <td style="font-weight: bold">Giá vốn nhập khẩu</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">1</td>
                        <td>Giá mua tại cửa khẩu Việt Nam (giá CIF)</td>
                        <td style="text-align: center"><input type="text" id="edit_nkgiamuackdvt" name="edit_nkgiamuackdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkgiamuacktt',null, array('id' => 'edit_nkgiamuacktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkgiamuackgc" name="edit_nkgiamuackgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>Thuế nhập khẩu</td>
                        <td style="text-align: center"><input type="text" id="edit_nkthuedvt" name="edit_nkthuedvt" class="form-control" style="text-align: center;"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkthuett',null, array('id' => 'edit_nkthuett','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkthueghichu" name="edit_nkthueghichu" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>Thuế tiêu thụ đặc biệt (nếu có)</td>
                        <td style="text-align: center"><input type="text" id="edit_nkthuettdbdvt" name="edit_nkthuettdbdvt" class="form-control" style="text-align: center;"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkthuettdbtt',null, array('id' => 'edit_nkthuettdbtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkthuettdbgc" name="edit_nkthuettdbgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">4</td>
                        <td>Các khoản thuế, phí khác (nếu có)</td>
                        <td style="text-align: center"><input type="text" id="edit_nkthuephikdvt" name="edit_nkthuephikdvt" class="form-control" style="text-align: center;"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkthuephiktt',null, array('id' => 'edit_nkthuephiktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkthuephikgc" name="edit_nkthuephikgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">5</td>
                        <td>Các khoản chi bằng tiền khác theo quy định (nếu có)</td>
                        <td style="text-align: center"><input type="text" id="edit_nktienkdvt" name="edit_nktienkdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_nktienktt',null, array('id' => 'edit_nktienktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nktienkgc" name="edit_nktienkgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">C</td>
                        <td style="font-weight: bold">Chi phí chung</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">6</td>
                        <td>Chi phí tài chính (nếu có)</td>
                        <td style="text-align: center"><input type="text" id="edit_nkchiphitcdvt" name="edit_nkchiphitcdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkchiphitctt',null, array('id' => 'edit_nkchiphitctt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkchiphitcgc" name="edit_nkchiphitcgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">7</td>
                        <td>Chi phí bán hàng</td>
                        <td style="text-align: center"><input type="text" id="edit_nkchiphibhdvt" name="edit_nkchiphibhdvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkchiphibhtt',null, array('id' => 'edit_nkchiphibhtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkchiphibhgc" name="edit_nkchiphibhgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">8</td>
                        <td>Chi phí quản lý</td>
                        <td style="text-align: center"><input type="text" id="edit_nkchiphiqldvt" name="edit_nkchiphiqldvt" class="form-control" style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_nkchiphiqltt',null, array('id' => 'edit_nkchiphiqltt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right','onchange'=>"tongchiphi()"))!!}</td>
                        <td><input type="text" id="edit_nkchiphiqlgc" name="edit_nkchiphiqlgc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">D</td>
                        <td style="font-weight: bold">Tổng chi phí</td>
                        <td style="text-align: center"></td>
                        <td style="text-align: right">{!!Form::text('edit_nktcp',null, array('id' => 'edit_nktcp','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">Đ</td>
                        <td style="font-weight: bold">Giá thành toàn bộ 01(một) đơn vị sản phẩm</td>
                        <td style="text-align: center; font-weight: bold"><input type="text" id="edit_nkgiathanh1spdvt" name="edit_nkgiathanh1spdvt" class="form-control" style="text-align: center;font-weight: bold"></td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_nkgiathanh1sptt',null, array('id' => 'edit_nkgiathanh1sptt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold"><input type="text" id="edit_nkgiathanh1spgc" name="edit_nkgiathanh1spgc" class="form-control" style="font-weight: bold;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">E</td>
                        <td style="font-weight: bold">Lợi nhuận dự kiến</td>
                        <td style="text-align: center; font-weight: bold"><input type="text" id="edit_nkloinhuandkdvt" name="edit_nkloinhuandkdvt" class="form-control" style="text-align: center;font-weight: bold"></td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_nkloinhuandktt',null, array('id' => 'edit_nkloinhuandktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold"><input type="text" id="edit_nkloinhuandkgc" name="edit_nkloinhuandkgc" class="form-control" style="font-weight: bold"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">G</td>
                        <td style="font-weight: bold">Thuế giá trị gia tăng, thuế khác (nếu có) theo quy định</td>
                        <td style="text-align: center; font-weight: bold"><input type="text" id="edit_nkthuegtgtkdvt" name="edit_nkthuegtgtkdvt" class="form-control" style="text-align: center;font-weight: bold"></td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_nkthuegtgtktt',null, array('id' => 'edit_nkthuegtgtktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold"><input type="text" id="edit_nkthuegtgtkgc" name="edit_nkthuegtgtkgc" class="form-control" style="font-weight: bold"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">H</td>
                        <td style="font-weight: bold">Giá bán dự kiến</td>
                        <td style="text-align: center; font-weight: bold"><input type="text" id="edit_nkgiabandkdvt" name="edit_nkgiabandkdvt" class="form-control" style="text-align: center;font-weight: bold"></td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_nkgiabandktt',null, array('id' => 'edit_nkgiabandktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold"><input type="text" id="edit_nkgiabandkgc" name="edit_nkgiabandkgc" class="form-control" style="font-weight: bold"></td>
                    </tr>
                    </tbody>
                </table>
                <p style="font-weight: bold">II. GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN MỤC CHI PHÍ CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">1. Giá mua tại cửa khẩu Việt Nam (giá CIF)</label>
                            <div><input type="text" id="edit_nkgtgiamuack" name="edit_nkgtgiamuack" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">2. Thuế nhập khẩu</label>
                            <div><input type="text" id="edit_nkgtthuenk" name="edit_nkgtthuenk" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">3. Thuế tiêu thụ đặc biệt (nếu có)</label>
                            <div><input type="text" id="edit_nkgtthuettdb" name="edit_nkgtthuettdb" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">4. Các khoản thuế, phí khác (nếu có)</label>
                            <div><input type="text" id="edit_nkgtthuephik" name="edit_nkgtthuephik" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">5. Các khoản chi bằng tiền khác theo quy định (nếu có)</label>
                            <div><input type="text" id="edit_nkgttienk" name="edit_nkgttienk" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">6. Chi phí tài chính (nếu có)</label>
                            <div><input type="text" id="edit_nkgtchiphitc" name="edit_nkgtchiphitc" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">7. Chi phí bán hàng</label>
                            <div><input type="text" id="edit_nkgtchiphibh" name="edit_nkgtchiphibh" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">8. Chi phí quản lý</label>
                            <div><input type="text" id="edit_nkgtchiphiql" name="edit_nkgtchiphiql" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">9. Lợi nhuận dự kiến</label>
                            <div><input type="text" id="edit_nkgtloinhuandk" name="edit_nkgtloinhuandk" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">10. Thuế giá trị gia tăng, thuế khác (nếu có) theo quy định</label>
                            <div><input type="text" id="edit_nkgtthuegtgt" name="edit_nkgtthuegtgt" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">11. Giá bán dự kiến</label>
                            <div><input type="text" id="edit_nkgtgiabandk" name="edit_nkgtgiabandk" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_nkid" id="edit_nkid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn blue" onclick="ClickUpNhapKhau()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>