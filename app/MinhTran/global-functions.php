<?php
function getPermissionDefault($level) {
    $roles = array();

    $roles['T'] = array(
        //Bình ổn giá
        'bog' => array(
            'index' => 1,
        ),
        'bpbog'=>array(
            'index'=>1,
        ),
        'dmbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),

        'thbpbog'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Bình ổn giá
        //Định giá
        'dinhgia' => array(
            'index' => 1,
        ),
        //Giá các loại đất
        'giacldat'=>array(
            'index'=>1,
        ),
        'dmgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thgiacldat'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá đấu giá đất
        'giadaugiadat'=>array(
            'index'=>1,
        ),
        'kkgiadaugiadat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadaugiadat'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuê mặt đất, nước
        'giathuedatnuoc'=>array(
            'index'=>1,
        ),
        'kkgiathuedatnuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuedatnuoc'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá rừng
        'giarung'=>array(
            'index'=>1,
        ),
        'dmgiarung'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiarung'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiarung'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuê mua nhà XH
        'giathuemuanhaxh'=>array(
            'index'=>1,
        ),
        'dmgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuemuanhaxh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá nước sạch sinh hoạt
        'gianuocsh'=>array(
            'index'=>1,
        ),
        'kkgianuocsh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgianuocsh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuê tài sản công
        'giathuetscong'=>array(
            'index'=>1,
        ),
        'kkgiathuetscong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuetscong'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá DV GD-DT
        'giadvgddt'=>array(
            'index'=>1,
        ),
        'dmgiadvgddt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiadvgddt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadvgddt'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá DV KCB
        'giadvkcb'=>array(
            'index'=>1,
        ),
        'dmgiadvkcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiadvkcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadvkcb'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Mức trợ giá, trợ cước
        'trogiatrocuoc'=>array(
            'index'=>1,
        ),
        'dmtrogiatrocuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kktrogiatrocuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtrogiatrocuoc'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá HH-DV khác
        'giahhdvk'=>array(
            'index'=>1,
        ),
        'dmgiahhdvk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiahhdvk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiahhdvk'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuế tài nguyên
        'giathuetn'=>array(
            'index'=>1,
        ),
        'dmgiathuetn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiathuetn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuetn'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá lệ phí trước bạ
        'gialephitruocba'=>array(
            'index'=>1,
        ),
        'dmgialephitruocba'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgialephitruocba'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgialephitruocba'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá phí lệ phí
        'giaphilephi'=>array(
            'index'=>1,
        ),
        'dmgiaphilephi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiaphilephi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiaphilephi'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá sản phẩm dịch vụ công ích
        'giaspdvci'=>array(
            'index'=>1,
        ),
        'dmgiaspdvci'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiaspdvci'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiaspdvci'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),

        //End Định Giá
        //Thẩm định giá
        'thamdinhgia' => array(
            'index' => 1,
        ),
        'kkthamdinhgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'ththamdinhgia'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Thẩm định giá
        //Thẩm định giá hh
        'thamdinhgiahh' => array(
            'index' => 1,
        ),
        'dmthamdinhgiahh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkthamdinhgiahh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'ththamdinhgiahh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Thẩm định giáhh
        //Kê khai giá
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia'=>array(
            'index'=>1,
        ),
        //Dịch vụ lưu trú
        'ttdn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dvlt'=>array(
            'index'=>1,
        ),
        'dmdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thdvlt'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //TPCNTE6T
        'tpcnte6t'=>array(
            'index'=>1,
        ),
        'kktpcnte6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtpcnte6t'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //TACN
        'tacn'=>array(
            'index'=>1,
        ),
        'kktacn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtacn'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //DVVT
        'dvvt'=>array(
            'index'=>1,
            'xdttdn'=>1
        ),
        'vtxk' => array(
            'index' => 1,
        ),
        'dmvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxk' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtxb' => array(
            'index' => 1,
        ),
        'dmvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxb' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtxtx' => array(
            'index' => 1,
        ),
        'dmvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxtx' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtch' => array(
            'index' => 1,
        ),
        'dmvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtch' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),

        //End Kê khai giá
        //Văn bản QLNN
        'vbqlnn'=>array(
            'index'=>1,
        ),
        'vbgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        //End Văn bản QLNN
    );
    $roles['H'] = array(
        //Bình ổn giá
        'bog' => array(
            'index' => 1,
        ),
        'bpbog'=>array(
            'index'=>1,
        ),
        'dmbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),

        'thbpbog'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Bình ổn giá
        //Định giá
        'dinhgia' => array(
            'index' => 1,
        ),
        //Giá các loại đất
        'giacldat'=>array(
            'index'=>1,
        ),
        'dmgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thgiacldat'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá đấu giá đất
        'giadaugiadat'=>array(
            'index'=>1,
        ),
        'kkgiadaugiadat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadaugiadat'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuê mặt đất, nước
        'giathuedatnuoc'=>array(
            'index'=>1,
        ),
        'kkgiathuedatnuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuedatnuoc'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá rừng
        'giarung'=>array(
            'index'=>1,
        ),
        'dmgiarung'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiarung'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiarung'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuê mua nhà XH
        'giathuemuanhaxh'=>array(
            'index'=>1,
        ),
        'dmgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuemuanhaxh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá nước sạch sinh hoạt
        'gianuocsh'=>array(
            'index'=>1,
        ),
        'kkgianuocsh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgianuocsh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuê tài sản công
        'giathuetscong'=>array(
            'index'=>1,
        ),
        'kkgiathuetscong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuetscong'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá DV GD-DT
        'giadvgddt'=>array(
            'index'=>1,
        ),
        'dmgiadvgddt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiadvgddt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadvgddt'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá DV KCB
        'giadvkcb'=>array(
            'index'=>1,
        ),
        'dmgiadvkcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiadvkcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadvkcb'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Mức trợ giá, trợ cước
        'trogiatrocuoc'=>array(
            'index'=>1,
        ),
        'dmtrogiatrocuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kktrogiatrocuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtrogiatrocuoc'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá HH-DV khác
        'giahhdvk'=>array(
            'index'=>1,
        ),
        'dmgiahhdvk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiahhdvk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiahhdvk'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá thuế tài nguyên
        'giathuetn'=>array(
            'index'=>1,
        ),
        'dmgiathuetn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiathuetn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuetn'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá lệ phí trước bạ
        'gialephitruocba'=>array(
            'index'=>1,
        ),
        'dmgialephitruocba'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgialephitruocba'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgialephitruocba'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá phí lệ phí
        'giaphilephi'=>array(
            'index'=>1,
        ),
        'dmgiaphilephi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiaphilephi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiaphilephi'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //Giá sản phẩm dịch vụ công ích
        'giaspdvci'=>array(
            'index'=>1,
        ),
        'dmgiaspdvci'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiaspdvci'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiaspdvci'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),

        //End Định Giá
        //Thẩm định giá
        'thamdinhgia' => array(
            'index' => 1,
        ),
        'kkthamdinhgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'ththamdinhgia'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Thẩm định giá
        //Thẩm định giá hh
        'thamdinhgiahh' => array(
            'index' => 1,
        ),
        'dmthamdinhgiahh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkthamdinhgiahh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'ththamdinhgiahh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Thẩm định giáhh
        //Kê khai giá
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia'=>array(
            'index'=>1,
        ),
        //Dịch vụ lưu trú
        'ttdn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dvlt'=>array(
            'index'=>1,
        ),
        'dmdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thdvlt'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //TPCNTE6T
        'tpcnte6t'=>array(
            'index'=>1,
        ),
        'kktpcnte6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtpcnte6t'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //TACN
        'tacn'=>array(
            'index'=>1,
        ),
        'kktacn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtacn'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //DVVT
        'dvvt'=>array(
            'index'=>1,
            'xdttdn'=>1,
        ),
        'vtxk' => array(
            'index' => 1,
        ),
        'dmvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxk' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtxb' => array(
            'index' => 1,
        ),
        'dmvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxb' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtxtx' => array(
            'index' => 1,
        ),
        'dmvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxtx' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtch' => array(
            'index' => 1,
        ),
        'dmvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtch' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //End Kê khai giá
        //Văn bản QLNN
        'vbqlnn'=>array(
            'index'=>1,
        ),
        'vbgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        //End Văn bản QLNN
    );
    $roles['X'] = array(
    //Bình ổn giá
        'bog' => array(
            'index' => 1,
        ),
        'bpbog'=>array(
            'index'=>1,
        ),
        'dmbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),

        'thbpbog'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
    //End Bình ổn giá
    //Định giá
        'dinhgia' => array(
            'index' => 1,
        ),
        //Giá các loại đất
        'giacldat'=>array(
            'index'=>1,
        ),
        'dmgiacldat'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiacldat'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'thgiacldat'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá đấu giá đất
        'giadaugiadat'=>array(
            'index'=>1,
        ),
        'kkgiadaugiadat'=>array(
            'index'=>0,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
            'approve'=>0,
        ),
        'thgiadaugiadat'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá thuê mặt đất, nước
        'giathuedatnuoc'=>array(
            'index'=>1,
        ),
        'kkgiathuedatnuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuedatnuoc'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá rừng
        'giarung'=>array(
            'index'=>1,
        ),
        'dmgiarung'=>array(
            'index'=>0,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiarung'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiarung'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá thuê mua nhà XH
        'giathuemuanhaxh'=>array(
            'index'=>1,
        ),
        'dmgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuemuanhaxh'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá nước sạch sinh hoạt
        'gianuocsh'=>array(
            'index'=>1,
        ),
        'kkgianuocsh'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
            'approve'=>0,
        ),
        'thgianuocsh'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá thuê tài sản công
        'giathuetscong'=>array(
            'index'=>1,
        ),
        'kkgiathuetscong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuetscong'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá DV GD-DT
        'giadvgddt'=>array(
            'index'=>1,
        ),
        'dmgiadvgddt'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiadvgddt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadvgddt'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá DV KCB
        'giadvkcb'=>array(
            'index'=>1,
        ),
        'dmgiadvkcb'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiadvkcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiadvkcb'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Mức trợ giá, trợ cước
        'trogiatrocuoc'=>array(
            'index'=>1,
        ),
        'dmtrogiatrocuoc'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kktrogiatrocuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtrogiatrocuoc'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá HH-DV khác
        'giahhdvk'=>array(
            'index'=>1,
        ),
        'dmgiahhdvk'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiahhdvk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiahhdvk'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá thuế tài nguyên
        'giathuetn'=>array(
            'index'=>1,
        ),
        'dmgiathuetn'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiathuetn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiathuetn'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá lệ phí trước bạ
        'gialephitruocba'=>array(
            'index'=>1,
        ),
        'dmgialephitruocba'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgialephitruocba'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgialephitruocba'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá phí lệ phí
        'giaphilephi'=>array(
            'index'=>1,
        ),
        'dmgiaphilephi'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiaphilephi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiaphilephi'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
        //Giá sản phẩm dịch vụ công ích
        'giaspdvci'=>array(
            'index'=>1,
        ),
        'dmgiaspdvci'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkgiaspdvci'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiaspdvci'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),

    //End Định Giá
    //Thẩm định giá
        'thamdinhgia' => array(
            'index' => 1,
        ),
        'kkthamdinhgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'ththamdinhgia'=>array(
            'baocao'=>1,
            'congbo'=>0,
            'timkiem'=>1,
        ),
    //End Thẩm định giá
        //Thẩm định giá hh
        'thamdinhgiahh' => array(
            'index' => 1,
        ),
        'dmthamdinhgiahh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkthamdinhgiahh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'ththamdinhgiahh'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
        ),
        //End Thẩm định giáhh
    //Kê khai giá
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia'=>array(
            'index'=>1,
        ),
        //Dịch vụ lưu trú
        'ttdn'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>1,
            'delete'=>0,
            'approve'=>1,
        ),
        'dvlt'=>array(
            'index'=>1,
        ),
        'dmdvlt'=>array(
            'index'=>0,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
        'kkdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thdvlt'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //TPCNTE6T
        'tpcnte6t'=>array(
            'index'=>1,
        ),
        'kktpcnte6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtpcnte6t'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //TACN
        'tacn'=>array(
            'index'=>1,
        ),
        'kktacn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtacn'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //DVVT
        'dvvt'=>array(
            'index'=>1,
            'xdttdn'=>1,
        ),
        'vtxk' => array(
            'index' => 1,
        ),
        'dmvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxk' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtxb' => array(
            'index' => 1,
        ),
        'dmvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxb' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtxtx' => array(
            'index' => 1,
        ),
        'dmvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxtx' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        'vtch' => array(
            'index' => 1,
        ),
        'dmvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtch' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),

    //End Kê khai giá
    //Văn bản QLNN
        'vbqlnn'=>array(
            'index'=>1,
        ),
        'vbgia'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>0,
            'delete'=>0,
        ),
    //End Văn bản QLNN
    );
    $roles['DVLT'] = array(
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia'=>array(
            'index'=>1,
        ),
        //Dịch vụ lưu trú
        'ttdn'=>array(
            'index'=>1,
            'create'=>0,
            'edit'=>1,
            'delete'=>0,
            'approve'=>1,
        ),
        'dvlt'=>array(
            'index'=>1,
        ),
        'dmdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thdvlt'=>array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
    );
    $roles['TPCNTE6T'] = array(
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia' => array(
            'index' => 1,
        ),
        'ttdn' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'tpcnte6t'=>array(
            'index'=>1,
        ),
        'kktpcnte6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtpcnte6t'=>array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
    );
    $roles['TACN'] = array(
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia'=>array(
            'index'=>1,
        ),
        'ttdn'=> array(
            'index'=>1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'tacn'=>array(
            'index'=>1,
        ),
        'kktacn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thtacn'=>array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
    );
    $roles['DVVT'] = array(
        'kknydkgia'=>array(
            'index'=>1
        ),
        'kkgia'=>array(
            'index'=>1,
        ),
        'ttdn'=> array(
            'index'=>1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'dvvt'=>array(
            'index'=>1,
        ),
        'vtxk' => array(
            'index' => 1,
        ),
        'dmvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxk' => array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
        'vtxb' => array(
            'index' => 1,
        ),
        'dmvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxb' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxb' => array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
        'vtxtx' => array(
            'index' => 1,
        ),
        'dmvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtxtx' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtxtx' => array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
        'vtch' => array(
            'index' => 1,
        ),
        'dmvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkvtch' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'thvtch' => array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
    );
    $roles['DKG'] = array(
        'bog'=>array(
            'index'=>1
        ),
        'dangkygia'=>array(
            'index'=>1,
        ),

    );
    $roles['HT'] = array(
        'ngaynghile'=> array(
            'index'=>1,
            'create' => 1,
            'edit' => 1,
            'delete' => 0,
        ),
        'dmdiadanh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>0,
        ),
        'districts'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>0,
            'approve'=>1
        ),
        'towns'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>0,
            'approve'=>1
        ),
        'companys'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>0,
            'approve'=>1
        ),
        'dndvlt'=>array(
            'index'=>1,
            'approve'=>1
        ),
        'dndvvt'=>array(
            'index'=>1,
            'approve'=>1
        ),
        'dntacn'=>array(
            'index'=>1,
            'approve'=>1
        ),
        'dntpcnte6t'=>array(
            'index'=>1,
            'approve'=>1
        ),
        'users'=>array(
            'index'=>1,
            'approve'=>1
        ),
        'register'=>array(
            'index'=>1,
        ),
    );
    return json_encode($roles[$level]);
}

function getDayVn($date) {
    if($date != null || $date != '')
        $newday = date('d/m/Y',strtotime($date));
    else
        $newday='';
    return $newday;
}

function getDateTime($date) {
    if($date != null)
        $newday = date('d/m/Y H:i:s',strtotime($date));
    else
        $newday='';
    return $newday;
}

function getDbl($obj) {
    $obj=str_replace(',','',$obj);
    $obj=str_replace('.','',$obj);
    if(is_numeric($obj)){
        return $obj;
    }else
        return 0;
}

function can($module = null, $action = null)
{
    $permission = !empty(session('admin')->permission) ? session('admin')->permission : getPermissionDefault(session('admin')->level);
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1 || session('admin')->sadmin == 'ssa') {
        return true;
    }else
        return false;

}

function canEdit($trangthai){
    if(session('admin')->sadmin == 'ssa')
       return true;
    else{
        if ($trangthai == 'CC' || $trangthai == 'BTL') {
            return true;
        } else {
            return false;
        }
    }
}

function canChuyenXoa($trangthai){
    if($trangthai == 'CC' || $trangthai == 'BTL')
        return true;
    else
        return false;
}

function canShowLyDo($trangthai){
    if($trangthai == 'BTL')
        return true;
    else
        return false;
}

function canApprove($trangthai){
    if($trangthai == 'CD')
        return true;
    else
        return false;
}

function canGeneral($module = null, $action =null)
{
    $model = \App\GeneralConfigs::first();
    if(count($model)> 0 && $model->setting != '')
        $setting = json_decode($model->setting, true);
    else {
        $per = '{
                {"bog":{"index":"1","congbo":"1"},
                "dangkygia":{"index":"1","congbo":"1"},
                    "dkgxangdau":{"index":"1","congbo":"1"},
                    "dkgdien":{"index":"1","congbo":"1"},
                    "dkgkhidau":{"index":"1","congbo":"1"},
                    "dkgphan":{"index":"1","congbo":"1"},
                    "dkgthuocbvtv":{"index":"1","congbo":"1"},
                    "dkgvacxingsgc":{"index":"1","congbo":"1"},
                    "dkgmuoi":{"index":"1","congbo":"1"},
                    "dkgsuate6t":{"index":"1","congbo":"1"},
                    "dkgduong":{"index":"1","congbo":"1"},
                    "dkgthocgao":{"index":"1","congbo":"1"},
                    "dkgthuocpcb":{"index":"1","congbo":"1"},

                "dinhgia":{"index":"1","congbo":"1"},
                    "giacldat":{"index":"1","congbo":"1"},
                    "giadaugiadat":{"index":"1","congbo":"1"},
                    "giathuedatnuoc":{"index":"1","congbo":"1"},
                    "giarung":{"index":"1","congbo":"1"},
                    "giathuemuanhaxh":{"index":"1","congbo":"1"},
                    "gianuocsh":{"index":"1","congbo":"1"},
                    "giathuetscong":{"index":"1","congbo":"1"},
                    "giadvgddt":{"index":"1","congbo":"1"},
                    "giadvkcb":{"index":"1","congbo":"1"},
                    "giahhdvk":{"index":"1","congbo":"1"},
                    "giathuetn":{"index":"1","congbo":"1"},
                    "gialephitruocba":{"index":"1","congbo":"1"},
                    "giaphilephi":{"index":"1","congbo":"1"},
                "thamdinhgia":{"index":"1","congbo":"1"},
                "kkgia":{"index":"1","congbo":"1"},
                    "dvlt":{"index":"1","congbo":"1"},
                    "tpcnte6t":{"index":"1","congbo":"1"},
                    "tacn":{"index":"1","congbo":"1"},
                    "dvvt":{"index":"1"},
                    "vtxk":{"index":"1","congbo":"1"},
                "vbqlnn":{"index":"1","congbo":"1"},
                    "vbgia":{"index":"1","congbo":"1"}}
                }';
        $setting = json_decode($per, true);
    }

    if (isset($setting[$module][$action]) && $setting[$module][$action] == 1)
        return true;
    else
        return false;
}

function canDvCc($module = null, $action = null)
{
    $permission = !empty(session('ttdnvt')->dvcc) ? session('ttdnvt')->dvcc : getDvCcDefault('T');
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function canDV($perm=null,$module = null, $action = null){
    if($perm == ''){
        return false;
    }else {
        $permission = json_decode($perm,true);
        if (isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
            return true;
        } else
            return false;
    }
}

function getGeneralConfigs() {
    $kq = \App\GeneralConfigs::all()->first();
    $kq = isset($kq) ? $kq->toArray(): array();
    return $kq;

}

function getDouble($str)
{
    $sKQ = 0;
    $str = str_replace(',','',$str);
    $str = str_replace('.','',$str);
    //if (is_double($str))
        $sKQ = $str;
    return floatval($sKQ);
}

function canDVVT($module = null, $action = null){
    if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
        return true;
    elseif(session('admin')->level == 'DVVT'){
        $modeldv = \App\Company::where('maxa',session('admin')->maxa)
            ->where('level','DVVT')
            ->first();
        $setting = json_decode($modeldv->settingdvvt, true);
        //check permission
        if(isset($setting[$module][$action]) && $setting[$module][$action] == 1) {
            return true;
        }else
            return false;
    }else
        return false;

}

function canshow($module = null, $action = null)
{
    $permission = !empty(session('admin')->dvvtcc) ? session('admin')->dvvtcc : '{"dvvt":{"vtxk":"1","vtxb":"1","vtxtx":"1","vtch":"1"}}';
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function chuyenkhongdau($str)
{
    if (!$str) return false;
    $utf8 = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($utf8 as $ascii => $uni) $str = preg_replace("/($uni)/i", $ascii, $str);
     return $str;
}

function chuanhoachuoi($text)
{
    $text = strtolower(chuyenkhongdau($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----", "-", $text);
    $text = str_replace("---", "-", $text);
    $text = str_replace("--", "-", $text);
    return $text;
}

function chuanhoatruong($text)
{
    $text = strtolower(chuyenkhongdau($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '_', $text);
    $text = str_replace("----", "_", $text);
    $text = str_replace("---", "_", $text);
    $text = str_replace("--", "_", $text);
    return $text;
}

function getAddMap($diachi){
    $str = chuyenkhongdau($diachi);
    $str = str_replace(' ','+',$str);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$str.'&sensor=false');
    $output = json_decode($geocode);
    if($output->status == 'OK'){
        $kq = $output->results[0]->geometry->location->lat. ',' .$output->results[0]->geometry->location->lng;
    }else{
        $kq = '';
    }
    return $kq;
}

function getPhanTram1($giatri, $thaydoi){
    $kq=0;
    if($thaydoi==0||$giatri==0){
        return '';
    }
    if($giatri<$thaydoi){
        $kq=round((($thaydoi-$giatri)/$giatri)*100,2).'%';
    }else{
        $kq='-'.round((($giatri-$thaydoi)/$giatri)*100,2).'%';
    }
    return $kq;
}

function getPhanTram2($giatri, $thaydoi){
    if($thaydoi==0||$giatri==0){
        return '';
    }
    return round(($thaydoi/$giatri)*100,2).'%';
}

function getDateToDb($value){
    if($value==''){return null;}
    $str =  strtotime(str_replace('/', '-', $value));
    $kq = date('Y-m-d', $str);
    return $kq;
}

function getMoneyToDb ($value){
    if($value == ''){
        $kq = 0;
    }else {
        $kq = str_replace(',', '', $value);
        $kq = str_replace('.', '', $kq);
    }
    return $kq;
}

function getDecimalToDb($value){
    if($value == ''){
        $kq = 1;
    }else {
        $kq = str_replace(',', '.', $value);
    }
    return $kq;
}
function getRandomPassword(){
    $bytes = random_bytes(3); // length in bytes
    $kq = (bin2hex($bytes));
    return $kq;
}

function getSoNnSelectOptions() {

    $start = '1';
    $stop = '10';
    $options = array();

    for ($i = $start;  $i <= $stop; $i++) {

        $options[$i] = $i;
    }
    return $options;
}

/*function getNgayHieuLuc($ngaynhap){
    $dayngaynhap = date('D',strtotime($ngaynhap));
    if($dayngaynhap == 'Thu'){
        $ngayhieuluc  =  date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
    }elseif($dayngaynhap == 'Fri') {
        $ngayhieuluc  =  date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
    }elseif( $dayngaynhap == 'Sat'){
        $ngayhieuluc  =  date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")));
    }else {
        $ngayhieuluc  =  date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")));
    }
    return $ngayhieuluc;

}*/

function getTtPhong($str)
{
    $str = str_replace(',',', ',$str);
    $str = str_replace('.','. ',$str);
    $str = str_replace(';','; ',$str);
    $str = str_replace('-','- ',$str);
    return $str;
}

function getNgayHieuLuc($ngaynhap,$pl){
    $dayngaynhap = date('D',strtotime($ngaynhap));
    if($pl == 'DVLT')
        $thoihan = isset(getGeneralConfigs()['thoihanlt']) ? getGeneralConfigs()['thoihanlt'] : 2;
    elseif($pl == 'DVVT')
        $thoihan = isset(getGeneralConfigs()['thoihanvt']) ? getGeneralConfigs()['thoihanvt'] : 2;
    elseif($pl == 'TPCNTE6T')
        $thoihan = isset(getGeneralConfigs()['thoihangs']) ? getGeneralConfigs()['thoihangs'] : 2;
    elseif($pl == 'TACN')
        $thoihan = isset(getGeneralConfigs()['thoihantacn']) ? getGeneralConfigs()['thoihantacn'] : 2;
    $ngaynghi = 0;

    if ($dayngaynhap == 'Thu') {
        $ngayhieuluc = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + 2 + $thoihan + $ngaynghi, date("Y")));
    } elseif ($dayngaynhap == 'Fri') {
        $ngayhieuluc = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + 2 + $thoihan + $ngaynghi, date("Y")));
    } elseif ($dayngaynhap == 'Sat') {
        $ngayhieuluc = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + 1 + $thoihan + $ngaynghi, date("Y")));
    } else {
        $ngayhieuluc = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + $thoihan + $ngaynghi, date("Y")));
    }
    return $ngayhieuluc;
}

function Thang2Quy($thang){
    if($thang == 1 || $thang == 2 || $thang == 3)
        return 1;
    elseif($thang == 4 || $thang == 5 || $thang == 6)
        return 2;
    elseif($thang == 7 || $thang == 8 || $thang == 9)
        return 3;
    else
        return 4;
}

function dinhdangso ($number , $decimals = 0, $unit = '1' , $dec_point = ',' , $thousands_sep = '.' ) {
    if(!is_numeric($number) || $number == 0){return '';}
    $r = $unit;

    switch ($unit) {
        case 2:{
            $decimals = 3;
            $r = 1000;
            break;
        }
        case 3:{
            $decimals = 5;
            $r = 1000000;
            break;
        }
    }

    $number = round($number / $r , $decimals);
    return number_format($number, $decimals ,$dec_point, $thousands_sep);
}

function getMonth($date){
    $month = date_format(date_create($date),'m');
    return $month;
}

function IntToRoman($number)
{
    $roman = '';
    while ($number >= 1000) {
        $roman .= "M";
        $number -= 1000;
    }
    if ($number >= 900) {
        $roman .= "CM";
        $number -= 900;
    }
    if ($number >= 500) {
        $roman .= "D";
        $number -= 500;
    }
    if ($number >= 400) {
        $roman .= "CD";
        $number -= 400;
    }
    while ($number >= 100) {
        $roman .= "C";
        $number -= 100;
    }
    if ($number >= 90) {
        $roman .= "XC";
        $number -= 90;
    }
    if ($number >= 50) {
        $roman .= "L";
        $number -= 50;
    }
    if ($number >= 40) {
        $roman .= "XL";
        $number -= 40;
    }
    while ($number >= 10) {
        $roman .= "X";
        $number -= 10;
    }
    if ($number >= 9) {
        $roman .= "IX";
        $number -= 9;
    }
    if ($number >= 5) {
        $roman .= "V";
        $number -= 5;
    }
    if ($number >= 4) {
        $roman .= "IV";
        $number -= 4;
    }
    while ($number >= 1) {
        $roman .= "I";
        $number -= 1;
    }
    return $roman;
}

function getThXdHsDvLt($ngaychuyen,$ngayduyet){
    //Kiểm tra giờ chuyển quá 16h thì sang ngày sau
    //if (date('H', strtotime($ngaychuyen)) > 16) {
    //Không tính ngày chuyển hs, ngày tiếp theo sẽ là ngày xét duyệt
    $date = date_create($ngaychuyen);
    $datenew = date_modify($date, "+1 days");
    $ngaychuyen = date_format($datenew, "Y-m-d");
    /*} else {
        $ngaychuyen = date("Y-m-d",strtotime($ngaychuyen));
    }*/
    $ngaylv = 0;
    while (strtotime($ngaychuyen) <= strtotime($ngayduyet)) {
        $checkngay = \App\TtNgayNghiLe::where('ngaytu', '<=', $ngaychuyen)
            ->where('ngayden', '>=', $ngaychuyen)->first();
        if (count($checkngay) > 0)
            $ngaylv = $ngaylv;
        elseif (date('D', strtotime($ngaychuyen)) == 'Sat')
            $ngaylv = $ngaylv;
        elseif (date('D', strtotime($ngaychuyen)) == 'Sun')
            $ngaylv = $ngaylv;
        else
            $ngaylv = $ngaylv + 1;
        $datestart = date_create($ngaychuyen);
        $datestartnew = date_modify($datestart, "+1 days");
        $ngaychuyen = date_format($datestartnew, "Y-m-d");

    }
    if ($ngaylv < (isset(getGeneralConfigs()['thoihan_lt']) ? getGeneralConfigs()['thoihan_lt'] : 2)) {
        $thoihan= 'Trước thời hạn';
    } elseif ($ngaylv == (isset(getGeneralConfigs()['thoihan_lt']) ? getGeneralConfigs()['thoihan_lt'] : 2)) {
        $thoihan = 'Đúng thời hạn';
    } else {
        $thoihan = 'Quá thời hạn';
    }
    return $thoihan;
}

function toAlpha($data){
    $alphabet =   array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    $alpha_flip = array_flip($alphabet);
    if($data <= 25){
        return $alphabet[$data];
    }
    elseif($data > 25){
        $dividend = ($data + 1);
        $alpha = '';
        $modulo;
        while ($dividend > 0){
            $modulo = ($dividend - 1) % 26;
            $alpha = $alphabet[$modulo] . $alpha;
            $dividend = floor((($dividend - $modulo) / 26));
        }
        return $alpha;
    }
}

function romanNumerals($num)
{
    $n = intval($num);
    $res = '';

    /*** roman_numerals array  ***/
    $roman_numerals = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1);

    foreach ($roman_numerals as $roman => $number)
    {
        /*** divide to get  matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    return $res;
}

function getLvUsers($level){
    if($level == 'T')
        $pltk = 'Tài khoản tổng hợp';
    elseif($level == 'H')
        $pltk = 'Tài khoản quản lý';
    elseif($level == 'X')
        $pltk = 'Tài khoản đơn vị';
    elseif($level == 'HT')
        $pltk = 'Tài khoản hệ thống';
    elseif($level = 'DVLT')
        $pltk = 'Tài khoản Doanh nghiệp dịch vụ lưu trú';
    elseif($level = 'DVVT')
        $pltk = 'Tài khoản Doanh nghiệp dịch vụ vận tải';
    elseif($level = 'TACN')
        $pltk = 'Tài khoản Doanh nghiệp thức ăn chăn nuôi';
    elseif($level = 'TPCNTE6T')
        $pltk = 'Tài khoản Doanh nghiệp thực phẩm chức năng dành cho trẻ em dưới 6 tuổi';
    else
        $pltk = 'Administrator';
    return $pltk;

}


?>