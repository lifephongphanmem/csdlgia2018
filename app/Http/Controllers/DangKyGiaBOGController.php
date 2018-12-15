<?php

namespace App\Http\Controllers;

use App\DkgDoanhnghiep;
use App\dkghoso;
use App\dkghosoct;
use App\dkghosoctdf;
use App\DmMhBinhOnGia;
use App\Town;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DangKyGiaBOGController extends Controller
{
    //Doanh nghiệp
    public function indexdnbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DkgDoanhnghiep::where('phanloai',$inputs['ma'])->get();
            return view('manage.bog.dangky.thongtindn.index')
                ->with('model', $model)
                ->with('ma', $inputs['ma'])
                ->with('pageTitle', 'Danh sách doanh nghiệp đăng ký giá');
        }else
            return view('errors.notlogin');
    }
    public function creatednbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = Town::all();
            return view('manage.bog.dangky.thongtindn.create')
                ->with('ma', $inputs['ma'])
                ->with('model', $model)
                ->with('pageTitle', 'Tạo mới doanh nghiệp đăng ký giá');
        }else
            return view('errors.notlogin');
    }
    public function storednbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new DkgDoanhnghiep();
            $model->create($inputs);
            return redirect('indexdn?ma='.$inputs['phanloai']);
        }else
            return view('errors.notlogin');
    }
    public function updatednbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DkgDoanhnghiep::findOrFail($inputs['id']);
            $model->update($inputs);
            return redirect('indexdn?ma='.$inputs['phanloai']);
        }else
            return view('errors.notlogin');
    }
    public function showdnbog($id){
        if (Session::has('admin')) {
            $model = Town::all();
            $modeldn = DkgDoanhnghiep::findOrFail($id);
            $ma = DkgDoanhnghiep::where('id',$id)->first()->phanloai;
            return view('manage.bog.dangky.thongtindn.edit')
                ->with('model',$model)
                ->with('modeldn',$modeldn)
                ->with('ma',$ma)
                ->with('pageTitle','Thông tin doanh nghiệp đăng ký giá');
        }else
            return view('errors.notlogin');
    }
    public function destroydnbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $phanloai = DkgDoanhnghiep::where('id',$id)->first()->phanloai;
            $model = DkgDoanhnghiep::findOrFail($id);
            $model->delete();
            return redirect('indexdn?ma='.$phanloai);
        }else
            return view('errors.notlogin');
    }

    //Đăng ký giá
    public function indexdkgbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if(session('admin')->maxa != '')
                $model = dkghoso::join('dkgdoanhnghiep','dkgdoanhnghiep.maxa','dkghoso.maxa')
                    ->select('dkghoso.*','dkgdoanhnghiep.tendn')
                    ->where('dkghoso.phanloai',$inputs['ma'])
                    ->where('dkghoso.maxa',session('admin')->maxa)
                    ->get();
            else
                $model = dkghoso::join('dkgdoanhnghiep','dkgdoanhnghiep.maxa','dkghoso.maxa')
                    ->select('dkghoso.*','dkgdoanhnghiep.tendn')
                ->where('dkghoso.phanloai',$inputs['ma'])->get();
            $tenmh = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            return view('manage.bog.dangky.dangkygia.index')
                ->with('model', $model)
                ->with('tenmh', $tenmh)
                ->with('ma', $inputs['ma'])
                ->with('pageTitle', 'Danh sách hồ sơ đăng ký giá');
        }else
            return view('errors.notlogin');
    }
    public function createdkgbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_dn = DkgDoanhnghiep::where('phanloai',$inputs['ma'])->get();
            $tenmh = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            $hoso =  dkghoso::whereRaw("id = (select max(`id`) from dkghoso where phanloai = '".$inputs['ma']."')")->first();
            $m_hosoct = new dkghosoct();
            if(count($hoso) > 0)
            {
                $m_hosoct = dkghosoct::where('mahs',$hoso->mahs);
            }
            return view('manage.bog.dangky.dangkygia.create')
                ->with('m_hosoct',$m_hosoct)
                ->with('m_dn', $m_dn)
                ->with('tenmh',$tenmh)
                ->with('ma',$inputs['ma'])
                ->with('pageTitle','Thêm mới thông tin mặt hàng bình ổn giá');
        }else
            return view('errors.notlogin');
    }
    public function storedkgbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayquyetdinh'] = getDateToDb($inputs['ngayquyetdinh']);
            $inputs['ngaythuchien'] = getDateToDb($inputs['ngaythuchien']);
            $inputs['maxa'] = session('admin')->maxa != '' ? session('admin')->maxa : $inputs['madn'] ;
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $inputs['trangthai'] = 'CC';
            $model = new dkghoso();
            if($model->create($inputs)){
                $modelctdf = dkghosoctdf::where('mahs','123456')->get();
                foreach($modelctdf as $ctdf){
                    $modelct = new dkghosoct();
                    $modelct->tenhhdv = $ctdf->tenhhdv;
                    $modelct->quycach = $ctdf->quycach;
                    $modelct->mucgiahienhanh = getDouble($ctdf->mucgiahienhanh);
                    $modelct->mucgiamoi = getDouble($ctdf->mucgiamoi);
                    $modelct->donvitinh = $ctdf->donvitinh;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
            }
            $m_deldf = dkghosoctdf::where('mahs','123456')->delete();
            return redirect('indexdkg?ma='.$inputs['phanloai']);
        }else
            return view('errors.notlogin');
    }
    public function updatedkgbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayquyetdinh'] = getDateToDb($inputs['ngayquyetdinh']);
            $inputs['ngaythuchien'] = getDateToDb($inputs['ngaythuchien']);
            $inputs['maxa'] = session('admin')->maxa != '' ? session('admin')->maxa : $inputs['madn'] ;
            $inputs['trangthai'] = 'CC';
            $model = dkghoso::findOrFail($inputs['id']);
            $model->update($inputs);
            return redirect('indexdkg?ma='.$inputs['phanloai']);
        }else
            return view('errors.notlogin');
    }
    public function showdkgbog($id){
        if (Session::has('admin')) {
            $model = dkghoso::where('id',$id)->first();
            $m_dn = DkgDoanhnghiep::where('phanloai',$model->phanloai)->get();
            $m_hosoct = dkghosoct::where('mahs',$model->mahs)->get();
            $tenmh = DmMhBinhOnGia::where('phanloai',$model->phanloai)->first()->hienthi;
            return view('manage.bog.dangky.dangkygia.edit')
                ->with('model',$model)
                ->with('m_dn',$m_dn)
                ->with('m_hosoct',$m_hosoct)
                ->with('tenmh',$tenmh)
                ->with('ma',$model->phanloai)
                ->with('pageTitle','Thông tin mặt hàng đăng ký giá');
        }else
            return view('errors.notlogin');
    }
    public function destroydkgbog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $phanloai = dkghoso::where('id',$id)->first()->phanloai;
            $model = dkghoso::findOrFail($id);
            $model->delete();
            return redirect('indexdkg?ma='.$phanloai);
        }else
            return view('errors.notlogin');
    }
    public function chuyen(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = dkghoso::where('id',$inputs['idchuyen'])
                ->first();
            $inputs['trangthai'] = 'DC';
            $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
            $model->update($inputs);
            return redirect('indexdkg?ma='.$model->phanloai);
        }else
            return view('errors.notlogin');
    }
    //Tìm kiếm
    public function indexdkgtk(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['madn'] = isset($inputs['madn']) ? $inputs['madn'] : '';
            $model = dkghoso::join('dkgdoanhnghiep','dkgdoanhnghiep.maxa','dkghoso.maxa')
                ->select('dkghoso.*','dkgdoanhnghiep.tendn')
                ->where('dkghoso.phanloai',$inputs['ma'])
                ->whereYear('dkghoso.ngayquyetdinh',$inputs['nam'])
                ->get();
            if($inputs['madn'] != '')
                $model = $model->where('maxa',$inputs['madn']);
            $tenmh = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            $m_dn = DkgDoanhnghiep::where('phanloai',$inputs['ma'])->get();
            return view('manage.bog.dangky.timkiem.index')
                ->with('model', $model)
                ->with('tenmh', $tenmh)
                ->with('m_dn', $m_dn)
                ->with('ma', $inputs['ma'])
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Danh sách hồ sơ đăng ký giá');
        }else
            return view('errors.notlogin');
    }
}
