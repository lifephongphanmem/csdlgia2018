<script>

    function editsanxuat(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/kkkgct/editsanxuat',
        type: 'GET',
        data: {
            _token: CSRF_TOKEN,
            id: id
        },
        dataType: 'JSON',
        success: function (data) {
            $('#edit_sxtenhh').val(data.tenhh);
            $('#edit_sxdonvisxkd').val(data.sxdonvisxkd);
            $('#edit_sxqcpc').val(data.sxqcpc);

            $('#edit_sxchiphinvldvt').val(data.sxchiphinvldvt);
            $('#edit_sxchiphinvlsl').val(data.sxchiphinvlsl);
            $('#edit_sxchiphinvldg').val(data.sxchiphinvldg);
            $('#edit_sxchiphinvltt').val(data.sxchiphinvldg*data.sxchiphinvlsl);

            $('#edit_sxchiphincdvt').val(data.sxchiphincdvt);
            $('#edit_sxchiphincsl').val(data.sxchiphincsl);
            $('#edit_sxchiphincdg').val(data.sxchiphincdg);
            $('#edit_sxchiphinctt').val(data.sxchiphincdg*data.sxchiphincsl);


            $('#edit_sxchiphinvpxdvt').val(data.sxchiphinvpxdvt);
            $('#edit_sxchiphinvpxsl').val(data.sxchiphinvpxsl);
            $('#edit_sxchiphinvpxdg').val(data.sxchiphinvpxdg);
            $('#edit_sxchiphinvpxtt').val(data.sxchiphinvpxdg*data.sxchiphinvpxsl);

            $('#edit_sxchiphivldvt').val(data.sxchiphivldvt);
            $('#edit_sxchiphivlsl').val(data.sxchiphivlsl);
            $('#edit_sxchiphivldg').val(data.sxchiphivldg);
            $('#edit_sxchiphivltt').val(data.sxchiphivldg*data.sxchiphivlsl);

            $('#edit_sxchiphidcsxdvt').val(data.sxchiphidcsxdvt);
            $('#edit_sxchiphidcsxsl').val(data.sxchiphidcsxsl);
            $('#edit_sxchiphidcsxdg').val(data.sxchiphidcsxdg);
            $('#edit_sxchiphidcsxtt').val(data.sxchiphidcsxdg*data.sxchiphidcsxsl);

            $('#edit_sxchiphikhtscddvt').val(data.sxchiphikhtscddvt);
            $('#edit_sxchiphikhtscdsl').val(data.sxchiphikhtscdsl);
            $('#edit_sxchiphikhtscddg').val(data.sxchiphikhtscddg);
            $('#edit_sxchiphikhtscdtt').val(data.sxchiphikhtscddg*data.sxchiphikhtscdsl);

            $('#edit_sxchiphidvmndvt').val(data.sxchiphidvmndvt);
            $('#edit_sxchiphidvmnsl').val(data.sxchiphidvmnsl);
            $('#edit_sxchiphidvmndg').val(data.sxchiphidvmndg);
            $('#edit_sxchiphidvmntt').val(data.sxchiphidvmndg*data.sxchiphidvmnsl);

            $('#edit_sxchiphitienkdvt').val(data.sxchiphitienkdvt);
            $('#edit_sxchiphitienksl').val(data.sxchiphitienksl);
            $('#edit_sxchiphitienkdg').val(data.sxchiphitienkdg);
            $('#edit_sxchiphitienktt').val(data.sxchiphitienkdg*data.sxchiphitienksl);

            $('#edit_sxtongchiphisx').val(data.sxchiphinvldg*data.sxchiphinvlsl + data.sxchiphincdg*data.sxchiphincsl + data.sxchiphinvpxdg*data.sxchiphinvpxsl
                                        + data.sxchiphivldg*data.sxchiphivlsl + data.sxchiphidcsxdg*data.sxchiphidcsxsl + data.sxchiphikhtscddg*data.sxchiphikhtscdsl
                                        + data.sxchiphidvmndg*data.sxchiphidvmnsl + data.sxchiphitienkdg*data.sxchiphitienksl);

            $('#edit_sxchiphibhdvt').val(data.sxchiphibhdvt);
            $('#edit_sxchiphibhsl').val(data.sxchiphibhsl);
            $('#edit_sxchiphibhdg').val(data.sxchiphibhdg);
            $('#edit_sxchiphibhtt').val(data.sxchiphibhdg*data.sxchiphibhsl);

            $('#edit_sxchiphiqldndvt').val(data.sxchiphiqldndvt);
            $('#edit_sxchiphiqldnsl').val(data.sxchiphiqldnsl);
            $('#edit_sxchiphiqldndg').val(data.sxchiphiqldndg);
            $('#edit_sxchiphiqldntt').val(data.sxchiphiqldndg*data.sxchiphiqldnsl);

            $('#edit_sxchiphitcdvt').val(data.sxchiphitcdvt);
            $('#edit_sxchiphitcsl').val(data.sxchiphitcsl);
            $('#edit_sxchiphitcdg').val(data.sxchiphitcdg);
            $('#edit_sxchiphitctt').val(data.sxchiphitcdg*data.sxchiphitcsl);

            $('#edit_tonggiathanh').val(data.sxchiphinvldg*data.sxchiphinvlsl + data.sxchiphincdg*data.sxchiphincsl + data.sxchiphinvpxdg*data.sxchiphinvpxsl
                                        + data.sxchiphivldg*data.sxchiphivlsl + data.sxchiphidcsxdg*data.sxchiphidcsxsl + data.sxchiphikhtscddg*data.sxchiphikhtscdsl
                                        + data.sxchiphidvmndg*data.sxchiphidvmnsl + data.sxchiphitienkdg*data.sxchiphitienksl + data.sxchiphibhdg*data.sxchiphibhsl
                                        + data.sxchiphiqldndg*data.sxchiphiqldnsl + data.sxchiphitcdg*data.sxchiphitcsl);

            $('#edit_sxloinhuandkdvt').val(data.sxloinhuandkdvt);
            $('#edit_sxloinhuandksl').val(data.sxloinhuandksl);
            $('#edit_sxloinhuandkdg').val(data.sxloinhuandkdg);
            $('#edit_sxloinhuandktt').val(data.sxloinhuandkdg*data.sxloinhuandksl);

            $('#edit_sxgiabanctdvt').val(data.sxgiabanctdvt);
            $('#edit_sxgiabanctsl').val(data.sxgiabanctsl);
            $('#edit_sxgiabanctdg').val(data.sxgiabanctdg);
            $('#edit_sxgiabancttt').val(data.sxgiabanctdg*data.sxgiabanctsl);


            $('#edit_sxthuettdbdvt').val(data.sxthuettdbdvt);
            $('#edit_sxthuettdbsl').val(data.sxthuettdbsl);
            $('#edit_sxthuettdbdg').val(data.sxthuettdbdg);
            $('#edit_sxthuettdbtt').val(data.sxthuettdbdg*data.sxthuettdbsl);

            $('#edit_sxthuegtgtdvt').val(data.sxthuegtgtdvt);
            $('#edit_sxthuegtgtsl').val(data.sxthuegtgtsl);
            $('#edit_sxthuegtgtdg').val(data.sxthuegtgtdg);
            $('#edit_sxthuegtgttt').val(data.sxthuegtgtdg*data.sxthuegtgtsl);

            $('#edit_sxgiabandvt').val(data.sxgiabandvt);
            $('#edit_sxgiabansl').val(data.sxgiabansl);
            $('#edit_sxgiabandg').val(data.sxgiabandg);
            $('#edit_sxgiabantt').val(data.sxgiabandg*data.sxgiabansl);

            $('#edit_sxgtchiphisx').val(data.sxgtchiphisx);
            $('#edit_sxgtchiphibh').val(data.sxgtchiphibh);
            $('#edit_sxgtchiphiqldn').val(data.sxgtchiphiqldn);
            $('#edit_sxgtchiphitc').val(data.sxgtchiphitc);
            $('#edit_sxgtloinhuandk').val(data.sxgtloinhuandk);
            $('#edit_sxgtthuettdb').val(data.sxgtthuettdb);
            $('#edit_sxgtthuegtgt').val(data.sxgtthuegtgt);
            $('#edit_sxgtgiaban').val(data.sxgtgiaban);

            $('#edit_sxid').val(data.id);
        },
        error: function (message) {
            toastr.error(message, 'Lỗi!');
        }
    });
}
    function ClickUpSanXuat(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/kkkgct/updatesanxuat',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id:  $('#edit_sxid').val(),
                mahs: $('#mahs').val(),
                sxdonvisxkd:  $('#edit_sxdonvisxkd').val(),
                sxqcpc:  $('#edit_sxqcpc').val(),

                sxchiphinvldvt:  $('#edit_sxchiphinvldvt').val(),
                sxchiphinvlsl:  $('#edit_sxchiphinvlsl').val(),
                sxchiphinvldg:  $('#edit_sxchiphinvldg').val(),

                sxchiphincdvt:  $('#edit_sxchiphincdvt').val(),
                sxchiphincsl:  $('#edit_sxchiphincsl').val(),
                sxchiphincdg:  $('#edit_sxchiphincdg').val(),

                sxchiphinvpxdvt:  $('#edit_sxchiphinvpxdvt').val(),
                sxchiphinvpxsl:  $('#edit_sxchiphinvpxsl').val(),
                sxchiphinvpxdg:  $('#edit_sxchiphinvpxdg').val(),

                sxchiphivldvt:  $('#edit_sxchiphivldvt').val(),
                sxchiphivlsl:  $('#edit_sxchiphivlsl').val(),
                sxchiphivldg:  $('#edit_sxchiphivldg').val(),

                sxchiphidcsxdvt:  $('#edit_sxchiphidcsxdvt').val(),
                sxchiphidcsxsl:  $('#edit_sxchiphidcsxsl').val(),
                sxchiphidcsxdg:  $('#edit_sxchiphidcsxdg').val(),

                sxchiphikhtscddvt:  $('#edit_sxchiphikhtscddvt').val(),
                sxchiphikhtscdsl:  $('#edit_sxchiphikhtscdsl').val(),
                sxchiphikhtscddg:  $('#edit_sxchiphikhtscddg').val(),

                sxchiphidvmndvt:  $('#edit_sxchiphidvmndvt').val(),
                sxchiphidvmnsl:  $('#edit_sxchiphidvmnsl').val(),
                sxchiphidvmndg:  $('#edit_sxchiphidvmndg').val(),

                sxchiphitienkdvt:  $('#edit_sxchiphitienkdvt').val(),
                sxchiphitienksl:  $('#edit_sxchiphitienksl').val(),
                sxchiphitienkdg:  $('#edit_sxchiphitienkdg').val(),

                sxchiphibhdvt:  $('#edit_sxchiphibhdvt').val(),
                sxchiphibhsl:  $('#edit_sxchiphibhsl').val(),
                sxchiphibhdg:  $('#edit_sxchiphibhdg').val(),

                sxchiphiqldndvt:  $('#edit_sxchiphiqldndvt').val(),
                sxchiphiqldnsl:  $('#edit_sxchiphiqldnsl').val(),
                sxchiphiqldndg:  $('#edit_sxchiphiqldndg').val(),

                sxchiphitcdvt:  $('#edit_sxchiphitcdvt').val(),
                sxchiphitcsl:  $('#edit_sxchiphitcsl').val(),
                sxchiphitcdg:  $('#edit_sxchiphitcdg').val(),

                sxloinhuandkdvt:  $('#edit_sxloinhuandkdvt').val(),
                sxloinhuandksl:  $('#edit_sxloinhuandksl').val(),
                sxloinhuandkdg:  $('#edit_sxloinhuandkdg').val(),

                sxgiabanctdvt:  $('#edit_sxgiabanctdvt').val(),
                sxgiabanctsl:  $('#edit_sxgiabanctsl').val(),
                sxgiabanctdg:  $('#edit_sxgiabanctdg').val(),

                sxthuettdbdvt:  $('#edit_sxthuettdbdvt').val(),
                sxthuettdbsl:  $('#edit_sxthuettdbsl').val(),
                sxthuettdbdg:  $('#edit_sxthuettdbdg').val(),

                sxthuegtgtdvt:  $('#edit_sxthuegtgtdvt').val(),
                sxthuegtgtsl:  $('#edit_sxthuegtgtsl').val(),
                sxthuegtgtdg:  $('#edit_sxthuegtgtdg').val(),

                sxgiabandvt:  $('#edit_sxgiabandvt').val(),
                sxgiabansl:  $('#edit_sxgiabansl').val(),
                sxgiabandg:  $('#edit_sxgiabandg').val(),

                sxgtchiphisx:  $('#edit_sxgtchiphisx').val(),
                sxgtchiphibh:  $('#edit_sxgtchiphibh').val(),
                sxgtchiphiqldn:  $('#edit_sxgtchiphiqldn').val(),
                sxgtchiphitc:  $('#edit_sxgtchiphitc').val(),
                sxgtloinhuandk:  $('#edit_sxgtloinhuandk').val(),
                sxgtthuettdb:  $('#edit_sxgtthuettdb').val(),
                sxgtthuegtgt:  $('#edit_sxgtthuegtgt').val(),
                sxgtgiaban:  $('#edit_sxgtgiaban').val(),


            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin kê khai giá", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-sanxuat').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function sxchiphinvl(){
        var sxchiphinvl = getdl($('#edit_sxchiphinvldg').val()) * getdl($('#edit_sxchiphinvlsl').val());

        document.getElementById("edit_sxchiphinvltt").value=sxchiphinvl;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphinc(){
        var sxchiphinc =  getdl($('#edit_sxchiphincdg').val()) * getdl($('#edit_sxchiphincsl').val());
        document.getElementById("edit_sxchiphinctt").value=sxchiphinc;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphinvpx(){
        var sxchiphinvpx =  getdl($('#edit_sxchiphinvpxdg').val()) * getdl($('#edit_sxchiphinvpxsl').val());
        document.getElementById("edit_sxchiphinvpxtt").value=sxchiphinvpx;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphivl(){
        var sxchiphivl =  getdl($('#edit_sxchiphivldg').val()) * getdl($('#edit_sxchiphivlsl').val());
        document.getElementById("edit_sxchiphivltt").value=sxchiphivl;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphidcsx(){
        var sxchiphidcsx =  getdl($('#edit_sxchiphidcsxdg').val()) * getdl($('#edit_sxchiphidcsxsl').val());
        document.getElementById("edit_sxchiphidcsxtt").value=sxchiphidcsx;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphikhtscd(){
        var sxchiphikhtscd =  getdl($('#edit_sxchiphikhtscddg').val()) * getdl($('#edit_sxchiphikhtscdsl').val());
        document.getElementById("edit_sxchiphikhtscdtt").value=sxchiphikhtscd;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphidvmn(){
        var sxchiphidvmn =  getdl($('#edit_sxchiphidvmndg').val()) * getdl($('#edit_sxchiphidvmnsl').val());
        document.getElementById("edit_sxchiphidvmntt").value=sxchiphidvmn;

        tongchiphisx();
        tonggiathanh();
    }
    function sxchiphitienk(){
        var sxchiphitienk =  getdl($('#edit_sxchiphitienkdg').val()) * getdl($('#edit_sxchiphitienksl').val());
        document.getElementById("edit_sxchiphitienktt").value=sxchiphitienk;

        tongchiphisx();
        tonggiathanh();
    }
    function tongchiphisx(){
        var tongchiphisx = getdl($('#edit_sxchiphinvldg').val()) * getdl($('#edit_sxchiphinvlsl').val())
            + getdl($('#edit_sxchiphincdg').val()) * getdl($('#edit_sxchiphincsl').val())
            + getdl($('#edit_sxchiphinvpxdg').val()) * getdl($('#edit_sxchiphinvpxsl').val())
            + getdl($('#edit_sxchiphivldg').val()) * getdl($('#edit_sxchiphivlsl').val())
            + getdl($('#edit_sxchiphidcsxdg').val()) * getdl($('#edit_sxchiphidcsxsl').val())
            + getdl($('#edit_sxchiphikhtscddg').val()) * getdl($('#edit_sxchiphikhtscdsl').val())
            + getdl($('#edit_sxchiphidvmndg').val()) * getdl($('#edit_sxchiphidvmnsl').val())
            + getdl($('#edit_sxchiphitienkdg').val()) * getdl($('#edit_sxchiphitienksl').val());

        document.getElementById("edit_sxtongchiphisx").value=tongchiphisx;
    }
    function sxchiphibh(){
        var sxchiphibh =  getdl($('#edit_sxchiphibhdg').val()) * getdl($('#edit_sxchiphibhsl').val());
        document.getElementById("edit_sxchiphibhtt").value=sxchiphibh;

        tonggiathanh();
    }
    function sxchiphiqldn(){
        var sxchiphiqldn =  getdl($('#edit_sxchiphiqldndg').val()) * getdl($('#edit_sxchiphiqldnsl').val());
        document.getElementById("edit_sxchiphiqldntt").value=sxchiphiqldn;

        tonggiathanh();
    }
    function sxchiphitc(){
        var sxchiphitc =  getdl($('#edit_sxchiphitcdg').val()) * getdl($('#edit_sxchiphitcsl').val());
        document.getElementById("edit_sxchiphitctt").value=sxchiphitc;

        tonggiathanh();
    }
    function tonggiathanh(){
        var tonggiathanh = getdl($('#edit_sxchiphinvldg').val()) * getdl($('#edit_sxchiphinvlsl').val())
                + getdl($('#edit_sxchiphincdg').val()) * getdl($('#edit_sxchiphincsl').val())
                + getdl($('#edit_sxchiphinvpxdg').val()) * getdl($('#edit_sxchiphinvpxsl').val())
                + getdl($('#edit_sxchiphivldg').val()) * getdl($('#edit_sxchiphivlsl').val())
                + getdl($('#edit_sxchiphidcsxdg').val()) * getdl($('#edit_sxchiphidcsxsl').val())
                + getdl($('#edit_sxchiphikhtscddg').val()) * getdl($('#edit_sxchiphikhtscdsl').val())
                + getdl($('#edit_sxchiphidvmndg').val()) * getdl($('#edit_sxchiphidvmnsl').val())
                + getdl($('#edit_sxchiphitienkdg').val()) * getdl($('#edit_sxchiphitienksl').val())

                + getdl($('#edit_sxchiphibhdg').val()) * getdl($('#edit_sxchiphibhsl').val())
                + getdl($('#edit_sxchiphiqldndg').val()) * getdl($('#edit_sxchiphiqldnsl').val())
                + getdl($('#edit_sxchiphitcdg').val()) * getdl($('#edit_sxchiphitcsl').val());


        document.getElementById("edit_tonggiathanh").value=tonggiathanh;
    }
</script>

<div class="modal fade in" id="modal-sanxuat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Thuyết minh cơ cấu tính giá hàng hóa dịch vụ đăng ký giá (đối với mặt hàng sản xuất trong nước)</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label">Tên hàng hóa dịch vụ:</label>
                            <div><input type="text" id="edit_sxtenhh" name="edit_sxtenhh" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label">Đơn vị sản xuất kinh doanh</label>
                            <div><input type="text" name="edit_sxdonvisxkd" id="edit_sxdonvisxkd" class="form-control" ></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">Quy cách phẩm chất; điều kiện bán hàng hoặc giao hàng; chính sách khuyến mại
                            , giảm giá, chiết kháu cho các đối tượng khách hàng (nếu có)</label>
                            <div><input type="text" id="edit_sxqcpc" name="edit_sxqcpc" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <p style="font-weight: bold"> I. BẢNG TỔNG HỢP TÍNH GÍ VỐN, GIÁ BÁN HÀNG HÓA NHẬP KHẨU CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
                <table class="table table-bordered table-hover">
                    <thead><tr>
                        <th width="5%">STT</th>
                        <th width="35%">Khoản mục chi phí</th>
                        <th width="10%">Đơn vị tính</th>
                        <th width="10%">Số lượng</th>
                        <th width="10%">Đơn giá</th>
                        <th width="10%">Thành tiền</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center;font-weight: bold">1</td>
                        <td style="font-weight: bold">Chi phí sản xuất</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">1.1</td>
                        <td>Chi phí nguyên liệu, vật liệu trực tiếp</td>
                        <td style="text-align: center">{!!Form::text('edit_sxchiphinvldvt',null, array('id' => 'edit_sxchiphinvldvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right">{!!Form::text('edit_sxchiphinvlsl',null, array('id' => 'edit_sxchiphinvlsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td>{!!Form::text('edit_sxchiphinvldg',null, array('id' => 'edit_sxchiphinvldg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphinvl()"))!!}</td>
                        <td>{!!Form::text('edit_sxchiphinvltt',null, array('id' => 'edit_sxchiphinvltt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center">1.2</td>
                        <td>Chi phí nhân công trực tiếp</td>
                        <td style="text-align: center">{!!Form::text('edit_sxchiphincdvt',null, array('id' => 'edit_sxchiphincdvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right">{!!Form::text('edit_sxchiphincsl',null, array('id' => 'edit_sxchiphincsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td>{!!Form::text('edit_sxchiphincdg',null, array('id' => 'edit_sxchiphincdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphinc()"))!!}</td>
                        <td>{!!Form::text('edit_sxchiphinctt',null, array('id' => 'edit_sxchiphinctt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center">1.3</td>
                        <td>Chi phí chung</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-style: italic">a</td>
                        <td style="font-style: italic">Chi phí nhân viên phân xưởng</td>
                        <td style="text-align: center;font-style: italic">{!!Form::text('edit_sxchiphinvpxdvt',null, array('id' => 'edit_sxchiphinvpxdvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right;font-style: italic">{!!Form::text('edit_sxchiphinvpxsl',null, array('id' => 'edit_sxchiphinvpxsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphinvpxdg',null, array('id' => 'edit_sxchiphinvpxdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphinvpx()"))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphinvpxtt',null, array('id' => 'edit_sxchiphinvpxtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-style: italic">b</td>
                        <td style="font-style: italic">Chi phí vật liệu</td>
                        <td style="text-align: center;font-style: italic">{!!Form::text('edit_sxchiphivldvt',null, array('id' => 'edit_sxchiphivldvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right;font-style: italic">{!!Form::text('edit_sxchiphivlsl',null, array('id' => 'edit_sxchiphivlsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphivldg',null, array('id' => 'edit_sxchiphivldg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphivl()"))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphivltt',null, array('id' => 'edit_sxchiphivltt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-style: italic">c</td>
                        <td style="font-style: italic">Chi phí dụng cụ sản xuất</td>
                        <td style="text-align: center;font-style: italic">{!!Form::text('edit_sxchiphidcsxdvt',null, array('id' => 'edit_sxchiphidcsxdvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right;font-style: italic">{!!Form::text('edit_sxchiphidcsxsl',null, array('id' => 'edit_sxchiphidcsxsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphidcsxdg',null, array('id' => 'edit_sxchiphidcsxdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphidcsx()"))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphidcsxtt',null, array('id' => 'edit_sxchiphidcsxtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-style: italic">d</td>
                        <td style="font-style: italic">Chi phí khấu hao TSCĐ</td>
                        <td style="text-align: center;font-style: italic">{!!Form::text('edit_sxchiphikhtscddvt',null, array('id' => 'edit_sxchiphikhtscddvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right;font-style: italic">{!!Form::text('edit_sxchiphikhtscdsl',null, array('id' => 'edit_sxchiphikhtscdsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphikhtscddg',null, array('id' => 'edit_sxchiphikhtscddg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphikhtscd()"))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphikhtscdtt',null, array('id' => 'edit_sxchiphikhtscdtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-style: italic">đ</td>
                        <td style="font-style: italic">Chi phí dịch vụ mua ngoài</td>
                        <td style="text-align: center;font-style: italic">{!!Form::text('edit_sxchiphidvmndvt',null, array('id' => 'edit_sxchiphidvmndvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right;font-style: italic">{!!Form::text('edit_sxchiphidvmnsl',null, array('id' => 'edit_sxchiphidvmnsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphidvmndg',null, array('id' => 'edit_sxchiphidvmndg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphidvmn()"))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphidvmntt',null, array('id' => 'edit_sxchiphidvmntt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-style: italic">e</td>
                        <td style="font-style: italic">Chi phí bằng tiền khác</td>
                        <td style="text-align: center;font-style: italic">{!!Form::text('edit_sxchiphitienkdvt',null, array('id' => 'edit_sxchiphitienkdvt','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="text-align: right;font-style: italic">{!!Form::text('edit_sxchiphitienksl',null, array('id' => 'edit_sxchiphitienksl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center'))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphitienkdg',null, array('id' => 'edit_sxchiphitienkdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','onchange'=>"sxchiphitienk()"))!!}</td>
                        <td style="font-style: italic">{!!Form::text('edit_sxchiphitienktt',null, array('id' => 'edit_sxchiphitienktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center"></td>
                        <td>Tổng chi phí sản xuất</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxtongchiphisx',null, array('id' => 'edit_sxtongchiphisx','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">2</td>
                        <td style="font-weight: bold">Chi phí bán hàng</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxchiphibhdvt',null, array('id' => 'edit_sxchiphibhdvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxchiphibhsl',null, array('id' => 'edit_sxchiphibhsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxchiphibhdg',null, array('id' => 'edit_sxchiphibhdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','onchange'=>"sxchiphibh()"))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxchiphibhtt',null, array('id' => 'edit_sxchiphibhtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">3</td>
                        <td style="font-weight: bold">Chi phí quản lý doanh nghiệp</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxchiphiqldndvt',null, array('id' => 'edit_sxchiphiqldndvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxchiphiqldnsl',null, array('id' => 'edit_sxchiphiqldnsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxchiphiqldndg',null, array('id' => 'edit_sxchiphiqldndg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','onchange'=>"sxchiphiqldn()"))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxchiphiqldntt',null, array('id' => 'edit_sxchiphiqldntt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">4</td>
                        <td style="font-weight: bold">Chi phí tài chính</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxchiphitcdvt',null, array('id' => 'edit_sxchiphitcdvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxchiphitcsl',null, array('id' => 'edit_sxchiphitcsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxchiphitcdg',null, array('id' => 'edit_sxchiphitcdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','onchange'=>"sxchiphitc()"))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxchiphitctt',null, array('id' => 'edit_sxchiphitctt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold"></td>
                        <td>Tổng giá thành toàn bộ</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold">{!!Form::text('edit_tonggiathanh',null, array('id' => 'edit_tonggiathanh','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">5</td>
                        <td style="font-weight: bold">Lợi nhuận dự kiến</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxloinhuandkdvt',null, array('id' => 'edit_sxloinhuandkdvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxloinhuandksl',null, array('id' => 'edit_sxloinhuandksl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxloinhuandkdg',null, array('id' => 'edit_sxloinhuandkdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxloinhuandktt',null, array('id' => 'edit_sxloinhuandktt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold"></td>
                        <td style="font-weight: bold">Giá bán chưa thuế</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxgiabanctdvt',null, array('id' => 'edit_sxgiabanctdvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxgiabanctsl',null, array('id' => 'edit_sxgiabanctsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxgiabanctdg',null, array('id' => 'edit_sxgiabanctdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxgiabancttt',null, array('id' => 'edit_sxgiabancttt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">6</td>
                        <td style="font-weight: bold">Thuế tiêu thụ đặc biệt (nếu có)</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxthuettdbdvt',null, array('id' => 'edit_sxthuettdbdvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxthuettdbsl',null, array('id' => 'edit_sxthuettdbsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxthuettdbdg',null, array('id' => 'edit_sxthuettdbdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxthuettdbtt',null, array('id' => 'edit_sxthuettdbtt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold">7</td>
                        <td style="font-weight: bold">Thuế tiêu giá trị gia tăng (nếu có)</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxthuegtgtdvt',null, array('id' => 'edit_sxthuegtgtdvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxthuegtgtsl',null, array('id' => 'edit_sxthuegtgtsl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxthuegtgtdg',null, array('id' => 'edit_sxthuegtgtdg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxthuegtgttt',null, array('id' => 'edit_sxthuegtgttt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;font-weight: bold"></td>
                        <td style="font-weight: bold">Giá bán (đã có thuế)</td>
                        <td style="text-align: center;font-weight: bold">{!!Form::text('edit_sxgiabandvt',null, array('id' => 'edit_sxgiabandvt','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="text-align: right;font-weight: bold">{!!Form::text('edit_sxgiabansl',null, array('id' => 'edit_sxgiabansl','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: center;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxgiabandg',null, array('id' => 'edit_sxgiabandg','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold'))!!}</td>
                        <td style="font-weight: bold">{!!Form::text('edit_sxgiabantt',null, array('id' => 'edit_sxgiabantt','data-mask'=>'fdecimal','class' => 'form-control','style'=>'text-align: right;font-weight: bold','disabled'))!!}</td>
                    </tr>
                    </tbody>
                </table>
                <p style="font-weight: bold">II. GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN MỤC CHI PHÍ CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">1. Chi phí sản xuất</label>
                            <div><input type="text" id="edit_sxgtchiphisx" name="edit_sxgtchiphisx" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">2. Chi phí bán hàng</label>
                            <div><input type="text" id="edit_sxgtchiphibh" name="edit_sxgtchiphibh" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">3. Chi phí quản lý doanh nghiệp</label>
                            <div><input type="text" id="edit_sxgtchiphiqldn" name="edit_sxgtchiphiqldn" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">4. Chi phí tài chính</label>
                            <div><input type="text" id="edit_sxgtchiphitc" name="edit_sxgtchiphitc" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">5. Lợi nhuận dự kiến</label>
                            <div><input type="text" id="edit_sxgtloinhuandk" name="edit_sxgtloinhuandk" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">6. Thuế tiêu thụ đặc biệt (nếu có)</label>
                            <div><input type="text" id="edit_sxgtthuettdb" name="edit_sxgtthuettdb" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">7. Thuế giá trị gia tăng (nếu có)</label>
                            <div><input type="text" id="edit_sxgtthuegtgt" name="edit_sxgtthuegtgt" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label">8. Giá bán (đã có thuế)</label>
                            <div><input type="text" id="edit_sxgtgiaban" name="edit_sxgtgiaban" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_sxid" id="edit_sxid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn blue" onclick="ClickUpSanXuat()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>