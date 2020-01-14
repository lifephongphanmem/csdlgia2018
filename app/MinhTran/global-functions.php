<?php
function getPermissionDefault($level) {
    $roles = array();
//Quyền tỉnh
    $roles['T'] = array(
        //CSDL về mức giá hàng hóa dịch vụ
        'csdlmucgiahhdv'=>array(
            'index'=>1,
        ),
            'dinhgia'=>array(
                'index'=>1,
            ),
                'giacldat'=>array(
                    'index'=>1,
                ),
                    'dmgiacldat'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
                    ),
                    'kkgiacldat'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
                    ),
                    'thgiacldat'=>array(
                        'baocao'=>1,
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giadaugiadat'=>array(
                    'index'=>1,
                ),
                    'dmgiadaugiadat'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giathuedatnuoc'=>array(
                    'index'=>1,
                ),
                    'dmgiathuedatnuoc'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giarung'=>array(
                    'index'=>1,
                ),
                    'dmgiarung'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giathuemuanhaxh'=>array(
                    'index'=>1,
                ),
                    'dmgiathuemuanhaxh'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'gianuocsh'=>array(
                    'index'=>1,
                ),
                    'dmgianuocsh'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giathuetscong'=>array(
                    'index'=>1,
                ),
                    'dmgiathuetscong'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giadvgddt'=>array(
                    'index'=>1,
                ),
                    'dmgiadvgddt'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'giadvkcb'=>array(
                    'index'=>1,
                ),
                    'dmgiadvkcb'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
            'giahhdvk'=>array(
                'index'=>1,
            ),
                'dmgiahhdvk'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
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
                    'timkiem'=>1,
                    'congbo'=>1,
                ),
            'giathuetn'=>array(
                'index'=>1,
            ),
                'dmgiathuetn'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
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
                    'timkiem'=>1,
                    'congbo'=>1,
                ),
            'gialephitruocba'=>array(
                'index'=>1,
            ),
                'dmgialephitruocba'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
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
                    'timkiem'=>1,
                    'congbo'=>1,
                ),
            'giaphilephi'=>array(
                'index'=>1,
            ),
                'dmgiaphilephi'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
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
                    'timkiem'=>1,
                    'congbo'=>1,
                ),
            'bog'=>array(
                'index'=>1,
            ),
                'dmbog'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
                ),
                'bpbog'=>array(
                    'index'=>1,
                ),
                    'kkbpbog'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
                    ),
                    'thbpbog'=>array(
                        'baocao'=>1,
                        'timkiem'=>1,
                        'congbo'=>1,
                    ),
                'dangkygia'=>array(
                    'index'=>1,
                ),
                    'dkgxangdau'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgxangdau'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgxangdau'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgxangdau'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgdien'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgdien'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgdien'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgdien'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgkhidau'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgkhidau'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgkhidau'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgkhidau'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgphan'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgphan'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgphan'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgphan'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgthuocbvtv'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgthuocbvtv'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgthuocbvtv'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgthuocbvtv'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgvacxingsgc'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgvacxingsgc'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgvacxingsgc'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgvacxingsgc'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgmuoi'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgmuoi'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgmuoi'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgmuoi'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgsuate6t'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgsuate6t'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgsuate6t'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgsuate6t'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgduong'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgduong'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgduong'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgduong'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgthocgao'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgthocgao'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgthocgao'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgthocgao'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                    'dkgthuocpcb'=>array(
                        'index'=>1,
                    ),
                        'ttdndkgthuocpcb'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                        ),
                        'thdkgthuocpcb'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                        ),
                        'kkdkgthuocpcb'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),

            'kknygia'=>array(
                'index'=>1,
            ),
                'ttdn'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
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
                        'baocao'=>1,
                        'timkiem'=>1,
                        'congbo'=>1,
                        'xdttdn'=>1,
                    ),
                'dvlt'=>array(
                    'index'=>1,
                ),
                    'dmdvlt'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
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
                        'timkiem'=>1,
                        'congbo'=>1,
                        'xdttdn'=>1,
                    ),
                'dvvt'=>array(
                    'index'=>1,
                    'xdttdn'=>1,
                ),
                    'vtxk'=>array(
                        'index'=>1,
                    ),
                        'dmvtxk'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                        'kkvtxk'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                        'thvtxk'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                            'xdttdn'=>1,
                        ),
                    'vtxtx'=>array(
                        'index'=>1,
                    ),
                        'dmvtxtx'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                        'kkvtxtx'=>array(
                            'index'=>1,
                            'create'=>1,
                            'edit'=>1,
                            'delete'=>1,
                            'approve'=>1,
                        ),
                        'thvtxtx'=>array(
                            'baocao'=>1,
                            'timkiem'=>1,
                            'congbo'=>1,
                            'xdttdn'=>1,
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
                        'baocao'=>1,
                        'timkiem'=>1,
                        'congbo'=>1,
                        'xdttdn'=>1,
                    ),
                'vlxd'=>array(
                    'index'=>1,
                ),
                    'dmvlxd'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                    ),
                    'kkvlxd'=>array(
                        'index'=>1,
                        'create'=>1,
                        'edit'=>1,
                        'delete'=>1,
                        'approve'=>1,
                    ),
                    'thvlxd'=>array(
                        'baocao'=>1,
                        'congbo'=>1,
                        'timkiem'=>1,
                        'xdttdn'=>1,
                    ),
        //End CSDL mức giá hàng hóa dịch vụ
        //CSDL thẩm định giá
        'csdlthamdinhgia'=>array(
            'index'=>1,
        ),
        'thamdinhgia'=>array(
            'index'=>1,
        ),
            'dmthamdinhgia'=>array(
                'index'=>1,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'approve'=>1,
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
                'timkiem'=>1,
                'congbo'=>1,
            ),
        'thamdinhgiahh'=>array(
            'index'=>1,
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
                'timkiem'=>1,
                'congbo'=>1,
            ),
        //End CSDL thẩm định giá
        //CSDL Văn bản quản lý nhà nước
        'csdlvbqlnn'=>array(
            'index'=>1,
        ),
            'vbqlnn'=>array(
                'index'=>1
            ),
            'vbgia'=>array(
                'index'=>1,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'approve'=>1,
            ),
            'giacpi'=>array(
                'index'=>1,
            ),
                'dmgiacpi'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
                ),
                'kkgiacpi'=>array(
                    'index'=>1,
                    'create'=>1,
                    'edit'=>1,
                    'delete'=>1,
                    'approve'=>1,
                ),
                'thgiacpi'=>array(
                    'congbo'=>1,
                    'baocao'=>1,
                    'timkiem'=>1,
                ),
        //End CSDL Văn bản quản lý nhà nước
        //CSDL thông tin phục vụ công tác quản lý nhà nước về giá
        'csdlttpvctqlnn'=>array(
            'index'=>1,
        ),

        //End CSDL thông tin phục vụ công tác quản lý nhà nước về giá
        //System
        'system'=>array(
            'index'=>1,
        ),
        'ngaynghile'=> array(
            'index'=>1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ),
        'dmdiadanh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'districts'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'towns'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'companies'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'users'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'copy'=>1,
            'per'=>1
        ),
        'register'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        //End System
    );

//End Quyền tỉnh

//Quyền huyện
    $roles['H'] = array(
        //CSDL về mức giá hàng hóa dịch vụ
        'csdlmucgiahhdv'=>array(
            'index'=>1,
        ),
        'dinhgia'=>array(
            'index'=>1,
        ),
        'giacldat'=>array(
            'index'=>1,
        ),
        'dmgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiacldat'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giadaugiadat'=>array(
            'index'=>1,
        ),
        'dmgiadaugiadat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giathuedatnuoc'=>array(
            'index'=>1,
        ),
        'dmgiathuedatnuoc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giarung'=>array(
            'index'=>1,
        ),
        'dmgiarung'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giathuemuanhaxh'=>array(
            'index'=>1,
        ),
        'dmgiathuemuanhaxh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'gianuocsh'=>array(
            'index'=>1,
        ),
        'dmgianuocsh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giathuetscong'=>array(
            'index'=>1,
        ),
        'dmgiathuetscong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giadvgddt'=>array(
            'index'=>1,
        ),
        'dmgiadvgddt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giadvkcb'=>array(
            'index'=>1,
        ),
        'dmgiadvkcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giahhdvk'=>array(
            'index'=>1,
        ),
        'dmgiahhdvk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giathuetn'=>array(
            'index'=>1,
        ),
        'dmgiathuetn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'gialephitruocba'=>array(
            'index'=>1,
        ),
        'dmgialephitruocba'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giaphilephi'=>array(
            'index'=>1,
        ),
        'dmgiaphilephi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'bog'=>array(
            'index'=>1,
        ),
        'dmbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'bpbog'=>array(
            'index'=>1,
        ),
        'kkbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thbpbog'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'dangkygia'=>array(
            'index'=>1,
        ),
        'dkgxangdau'=>array(
            'index'=>1,
        ),
        'ttdndkgxangdau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgxangdau'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgxangdau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgdien'=>array(
            'index'=>1,
        ),
        'ttdndkgdien'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgdien'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgdien'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgkhidau'=>array(
            'index'=>1,
        ),
        'ttdndkgkhidau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgkhidau'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgkhidau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgphan'=>array(
            'index'=>1,
        ),
        'ttdndkgphan'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgphan'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgphan'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgthuocbvtv'=>array(
            'index'=>1,
        ),
        'ttdndkgthuocbvtv'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgthuocbvtv'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgthuocbvtv'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgvacxingsgc'=>array(
            'index'=>1,
        ),
        'ttdndkgvacxingsgc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgvacxingsgc'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgvacxingsgc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgmuoi'=>array(
            'index'=>1,
        ),
        'ttdndkgmuoi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgmuoi'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgmuoi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgsuate6t'=>array(
            'index'=>1,
        ),
        'ttdndkgsuate6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgsuate6t'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgsuate6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgduong'=>array(
            'index'=>1,
        ),
        'ttdndkgduong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgduong'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgduong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgthocgao'=>array(
            'index'=>1,
        ),
        'ttdndkgthocgao'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgthocgao'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgthocgao'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgthuocpcb'=>array(
            'index'=>1,
        ),
        'ttdndkgthuocpcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgthuocpcb'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgthuocpcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),

        'kknygia'=>array(
            'index'=>1,
        ),
        'ttdn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'dvlt'=>array(
            'index'=>1,
        ),
        'dmdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'dvvt'=>array(
            'index'=>1,
            'xdttdn'=>1,
        ),
        'vtxk'=>array(
            'index'=>1,
        ),
        'dmvtxk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkvtxk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thvtxk'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'vtxtx'=>array(
            'index'=>1,
        ),
        'dmvtxtx'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkvtxtx'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thvtxtx'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
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
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'vlxd'=>array(
            'index'=>1,
        ),
        'dmvlxd'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkvlxd'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thvlxd'=>array(
            'baocao'=>1,
            'congbo'=>1,
            'timkiem'=>1,
            'xdttdn'=>1,
        ),
        //End CSDL mức giá hàng hóa dịch vụ
        //CSDL thẩm định giá
        'csdlthamdinhgia'=>array(
            'index'=>1,
        ),
        'thamdinhgia'=>array(
            'index'=>1,
        ),
        'dmthamdinhgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'thamdinhgiahh'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        //End CSDL thẩm định giá
        //CSDL Văn bản quản lý nhà nước
        'csdlvbqlnn'=>array(
            'index'=>1,
        ),
        'vbqlnn'=>array(
            'index'=>1
        ),
        'vbgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'giacpi'=>array(
            'index'=>1,
        ),
        'dmgiacpi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkgiacpi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiacpi'=>array(
            'congbo'=>1,
            'baocao'=>1,
            'timkiem'=>1,
        ),
        //End CSDL Văn bản quản lý nhà nước
        //CSDL thông tin phục vụ công tác quản lý nhà nước về giá
        'csdlttpvctqlnn'=>array(
            'index'=>1,
        ),

        //End CSDL thông tin phục vụ công tác quản lý nhà nước về giá
        //System
        'system'=>array(
            'index'=>1,
        ),
        'ngaynghile'=> array(
            'index'=>1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ),
        'dmdiadanh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'districts'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'towns'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'companies'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'users'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'copy'=>1,
            'per'=>1
        ),
        'register'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        //End System
    );
//End QUyền Huyện

//Quyền xã
    $roles['X'] = array(
        //CSDL về mức giá hàng hóa dịch vụ
        'csdlmucgiahhdv'=>array(
            'index'=>1,
        ),
        'dinhgia'=>array(
            'index'=>1,
        ),
        'giacldat'=>array(
            'index'=>1,
        ),

        'kkgiacldat'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiacldat'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giarung'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giathuemuanhaxh'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giadvgddt'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giadvkcb'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giahhdvk'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giathuetn'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'gialephitruocba'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'giaphilephi'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'bog'=>array(
            'index'=>1,
        ),

        'bpbog'=>array(
            'index'=>1,
        ),
        'kkbpbog'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thbpbog'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'dangkygia'=>array(
            'index'=>1,
        ),
        'dkgxangdau'=>array(
            'index'=>1,
        ),
        'ttdndkgxangdau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgxangdau'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgxangdau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgdien'=>array(
            'index'=>1,
        ),
        'ttdndkgdien'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgdien'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgdien'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgkhidau'=>array(
            'index'=>1,
        ),
        'ttdndkgkhidau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgkhidau'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgkhidau'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgphan'=>array(
            'index'=>1,
        ),
        'ttdndkgphan'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgphan'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgphan'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgthuocbvtv'=>array(
            'index'=>1,
        ),
        'ttdndkgthuocbvtv'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgthuocbvtv'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgthuocbvtv'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgvacxingsgc'=>array(
            'index'=>1,
        ),
        'ttdndkgvacxingsgc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgvacxingsgc'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgvacxingsgc'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgmuoi'=>array(
            'index'=>1,
        ),
        'ttdndkgmuoi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgmuoi'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgmuoi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgsuate6t'=>array(
            'index'=>1,
        ),
        'ttdndkgsuate6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgsuate6t'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgsuate6t'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgduong'=>array(
            'index'=>1,
        ),
        'ttdndkgduong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgduong'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgduong'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgthocgao'=>array(
            'index'=>1,
        ),
        'ttdndkgthocgao'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgthocgao'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgthocgao'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'dkgthuocpcb'=>array(
            'index'=>1,
        ),
        'ttdndkgthuocpcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'thdkgthuocpcb'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'kkdkgthuocpcb'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),

        'kknygia'=>array(
            'index'=>1,
        ),
        'ttdn'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'dvlt'=>array(
            'index'=>1,
        ),
        'dmdvlt'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'dvvt'=>array(
            'index'=>1,
            'xdttdn'=>1,
        ),
        'vtxk'=>array(
            'index'=>1,
        ),
        'dmvtxk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkvtxk'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thvtxk'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'vtxtx'=>array(
            'index'=>1,
        ),
        'dmvtxtx'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'kkvtxtx'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thvtxtx'=>array(
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
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
            'baocao'=>1,
            'timkiem'=>1,
            'congbo'=>1,
            'xdttdn'=>1,
        ),
        'vlxd'=>array(
            'index'=>1,
        ),
        'dmvlxd'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'kkvlxd'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thvlxd'=>array(
            'baocao'=>0,
            'congbo'=>0,
            'timkiem'=>0,
            'xdttdn'=>0,
        ),
        //End CSDL mức giá hàng hóa dịch vụ
        //CSDL thẩm định giá
        'csdlthamdinhgia'=>array(
            'index'=>1,
        ),
        'thamdinhgia'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        'thamdinhgiahh'=>array(
            'index'=>1,
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
            'timkiem'=>1,
            'congbo'=>1,
        ),
        //End CSDL thẩm định giá
        //CSDL Văn bản quản lý nhà nước
        'csdlvbqlnn'=>array(
            'index'=>1,
        ),
        'vbqlnn'=>array(
            'index'=>1
        ),
        'vbgia'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'giacpi'=>array(
            'index'=>1,
        ),

        'kkgiacpi'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        'thgiacpi'=>array(
            'congbo'=>1,
            'baocao'=>1,
            'timkiem'=>1,
        ),
        //End CSDL Văn bản quản lý nhà nước
        //CSDL thông tin phục vụ công tác quản lý nhà nước về giá
        'csdlttpvctqlnn'=>array(
            'index'=>1,
        ),

        //End CSDL thông tin phục vụ công tác quản lý nhà nước về giá
        //System
        'system'=>array(
            'index'=>1,
        ),
        'ngaynghile'=> array(
            'index'=>1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ),
        'dmdiadanh'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'districts'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'towns'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'companies'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
        ),
        'users'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'copy'=>1,
            'per'=>1
        ),
        'register'=>array(
            'index'=>1,
            'create'=>1,
            'edit'=>1,
            'delete'=>1,
            'approve'=>1,
        ),
        //End System
    );
//End quyền xã

    $roles['DN'] = array(
        'csdlmucgiahhdv'=>array(
            'index'=>1,
        ),
        'kknygia'=>array(
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
    //dd($permission);
    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1 || session('admin')->sadmin == 'ssa') {
        return true;
    }else
        return false;

}

function canKkGiaGr($manganh){
    if(session('admin')->level == 'T') {
        $checkXH = \App\Model\system\dmnganhnghekd\DmNganhKd::where('manganh',$manganh)
            ->where('theodoi','TD')
            ->count();
        if($checkXH > 0)
            return true;
        else
            return false;
    }else{
        if(session('admin')->level == 'H' || session('admin')->level == 'X'){
            $checkXH = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh',$manganh)
                ->where('mahuyen',session('admin')->mahuyen)
                ->where('theodoi','TD')
                ->count();
            if($checkXH > 0)
                return true;
            else
                return false;
        }else{
            $checkdn = \App\Model\system\company\CompanyLvCc::where('manganh',$manganh)
                ->where('maxa',session('admin')->maxa)
                ->count();
            if($checkdn > 0)
                return true;
            else
                return false;
        }
    }

}

function canKkGiaCt($manganh = null, $manghe = null){
    if(session('admin')->level == 'T' || session('admin')->sadmin == 'ssa') {
        $modelnghe = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh',$manganh)
            ->where('manghe',$manghe)
            ->where('theodoi','TD');
        if($modelnghe->count() > 0)
            return true;
        else
            return false;
    }else{
        $modelnganh = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh',$manganh)
            ->where('theodoi','TD')
            ->count();
        if($modelnganh > 0){
            $modelnghe = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh',$manganh)
                ->where('manghe',$manghe)
                ->where('theodoi','TD');
            if($modelnghe->count() > 0){
                if(session('admin')->level == 'H' || session('admin')->level == 'X'){
                    $modelcheck = $modelnghe->where('mahuyen',session('admin')->mahuyen)
                        ->count();
                    if($modelcheck > 0)
                        return true;
                    else
                        return false;
                }else{
                    $dncheck = \App\Model\system\company\CompanyLvCc::where('maxa',session('admin')->maxa)
                        ->where('manganh',$manganh)
                        ->where('manghe',$manghe)
                        ->count();
                    if($dncheck > 0){
                        return true;
                    }else
                        return false;
                }
            }else
                return false;
        }else
            return false;
    }
}

function canCbKkGiaGr($manganh){
    $checkXH = \App\Model\system\dmnganhnghekd\DmNganhKd::where('manganh',$manganh)
        ->where('theodoi','TD')
        ->where('congbo','CB')
        ->count();
    if($checkXH > 0)
        return true;
    else
        return false;

}


function canCbKkGiaCt($manganh = null, $manghe = null){
    $modelnghe = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh',$manganh)
        ->where('manghe',$manghe)
        ->where('theodoi','TD')
        ->where('congbo','CB');
    if($modelnghe->count() > 0)
        return true;
    else
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
    if(isset($model) && $model->setting != '')
        $setting = json_decode($model->setting, true);
    else {
        $per = '{

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

function getDoubleToDb ($value){
    if($value == ''){
        $kq = 0;
    }else {
        $kq = str_replace(',', '', $value);
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
        $thoihan = isset(getGeneralConfigs()['thoihanlt']) ? getGeneralConfigs()['thoihanlt'] : 5;
    elseif($pl == 'DVVT')
        $thoihan = isset(getGeneralConfigs()['thoihanvt']) ? getGeneralConfigs()['thoihanvt'] : 5;
    elseif($pl == 'TPCNTE6T')
        $thoihan = isset(getGeneralConfigs()['thoihangs']) ? getGeneralConfigs()['thoihangs'] : 5;
    elseif($pl == 'TACN')
        $thoihan = isset(getGeneralConfigs()['thoihantacn']) ? getGeneralConfigs()['thoihantacn'] : 5;
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
        $checkngay = \App\NgayNghiLe::where('tungay', '<=', $ngaychuyen)
            ->where('denngay', '>=', $ngaychuyen)->first();
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
    $alphabet =   array('','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
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

function getsadmin(){
    $sadmin = (object) [
        'username' => 'minhtran',
        'name' => 'Minh Trần',
        'level' => 'T',
        'sadmin'=>'ssa',
        'phanloai'=>'',
        'password'=>'107e8cf7f2b4531f6b2ff06dbcf94e10',
        'email'=>'minhtranlife@gmail.com',
        'maxa'=>'',
        'mahuyen'=>'',
        'district'=>'',
        'town'=>'',
    ];
    return $sadmin;
}

function getvbpl($str){
    $str = str_replace(',','',$str);
    $str = str_replace('.','',$str);
    $str = str_replace('/','',$str);
    $str = str_replace(' ','',$str);
    $str = chuyenkhongdau($str);
    return $str;
}

function VndText($amount)
{
    if($amount <=0)
    {
        return 0;
    }
    $Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
    $TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
    $textnumber = "";
    $length = strlen($amount);

    for ($i = 0; $i < $length; $i++)
        $unread[$i] = 0;

    for ($i = 0; $i < $length; $i++)
    {
        $so = substr($amount, $length - $i -1 , 1);

        if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
            for ($j = $i+1 ; $j < $length ; $j ++)
            {
                $so1 = substr($amount,$length - $j -1, 1);
                if ($so1 != 0)
                    break;
            }

            if (intval(($j - $i )/3) > 0){
                for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
                    $unread[$k] =1;
            }
        }
    }

    for ($i = 0; $i < $length; $i++)
    {
        $so = substr($amount,$length - $i -1, 1);
        if ($unread[$i] ==1)
            continue;

        if ( ($i% 3 == 0) && ($i > 0))
            $textnumber = $TextLuythua[$i/3] ." ". $textnumber;

        if ($i % 3 == 2 )
            $textnumber = 'trăm ' . $textnumber;

        if ($i % 3 == 1)
            $textnumber = 'mươi ' . $textnumber;


        $textnumber = $Text[$so] ." ". $textnumber;
    }

    //Phai de cac ham replace theo dung thu tu nhu the nay
    $textnumber = str_replace("không mươi", "lẻ", $textnumber);
    $textnumber = str_replace("lẻ không", "", $textnumber);
    $textnumber = str_replace("mươi không", "mươi", $textnumber);
    $textnumber = str_replace("một mươi", "mười", $textnumber);
    $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
    $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
    $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

    return ucfirst($textnumber." đồng chẵn.");
}

function getNgayLamViec($maxa){
    $model = \App\Town::where('maxa',$maxa)
        ->first();
    if(isset($model)){
        $songaylv = $model->songaylv != 0 ? $model->songaylv : 2;
    }else
        $songaylv = 2;
    return $songaylv;
}

function SelectedQuy($quy){
    if(date('m') == 1 || date('m') == 2 || date('m') == 3 )
        $value = 1;
    elseif(date('m') == 4 || date('m') == 5 || date('m') == 6 )
        $value = 2;
    elseif(date('m') == 7 || date('m') == 8 || date('m') == 9 )
        $value = 3;
    else
        $value = 4;
    if($quy == $value)
        return 'selected';
    else
        return '';
}

function quy(){
    if(date('m') == 1 || date('m') == 2 || date('m') == 3 )
        $value = 1;
    elseif(date('m') == 4 || date('m') == 5 || date('m') == 6 )
        $value = 2;
    elseif(date('m') == 7 || date('m') == 8 || date('m') == 9 )
        $value = 3;
    else
        $value = 4;
    return $value;
}

function getNgayApDung($ngaynhap,$mahuyen){
    $dayngaynhap = date('D',strtotime($ngaynhap));
    $ngaynghi = 0;
    $model = \App\Town::where('maxa',$mahuyen)->first();
    $thoihan = $model->songaylv;

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

function trim_zeros($str) {
    if(!is_string($str)) return $str;
    return preg_replace(array('`\.0+$`','`(\.\d+?)0+$`'),array('','$1'),$str);
}

function dinhdangsothapphan ($number , $decimals = 0) {
    if(!is_numeric($number) || $number == 0){return '';}
    $number = round($number , $decimals);
    $str_kq = trim_zeros(number_format($number, $decimals ));
    /*for ($i = 0; $i < strlen($str_kq); $i++){
        if($str_kq[$i]== '.'){
            $str_kq[$i]= ',';
        }elseif($str_kq[$i]== ','){
            $str_kq[$i]= '.';
        }
    }*/
    //$a_so = str_split($str_kq);

    //$str_kq = str_replace(",", ".", $str_kq);
    //$str_kq = str_replace(".", ",", $str_kq);
    return $str_kq;
    //return number_format($number, $decimals ,$dec_point, $thousands_sep);
    //làm lại hàm chú ý đo khi các số thập phân nếu làm tròn thi ko bỏ dc số 0 đằng sau dấu ,
    // round(5.4,4) = 5,4000
}

function chkDbl($obj) {
    $obj=str_replace(',','',$obj);
    $obj=str_replace('%','',$obj);
    if(is_numeric($obj)){
        return $obj;
    }else {
        return 0;
    }
}

function emailValid($email)
{
    $pattern = '#^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#';
    if(preg_match($pattern, $email))
        return true;
    else
        return false;
}

?>