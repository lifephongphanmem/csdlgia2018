<?php

namespace App\Http\Requests\system;

use App\Model\system\company\Company;
use App\Users;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class RegisterRequest extends FormRequest
{
    public function __construct()
    {
        Validator::extend('test', function ($attribute, $value, $parameters) {
        }, 'my custom validation rule message');
        return false;
    }
    public function authorize()
    {
        return true;
    }

    public function rules()
    {


        switch($this->method())
        {
            case 'PATCH':
            {
                //$company = Company::where('maxa',$this->maxa)->first();
                //$user = Users::where('username',$this->username)->first();
                return [
                    'tendn'=>'required',
                    //'maxa'=>'required|unique:company,maxa,'.$company->id.',id',
                    //'username'=>'required|unique:users,username,'.$user->id.',id',
//                    'password' => 'required|min:6',
//                    'rpassword' => 'required_with:password|same:password|min:6|required',

                    'diachi'=>'required',
                    'noidknopthue'=>'required',
//                    'giayphepkd'=>'required',
                    'email'=>'required|email',
//                    'chucdanh'=>'required',
//                    'nguoiky'=>'required',
//                    'diadanh'=>'required',
                ];
            }
            case 'POST':
            {
                return [
                    'tendn'=>'required',
                    'maxa'=>'required|unique:company,maxa',
                    'username'=>'required|unique:users,username',
                    'diachi'=>'required',
                    'password' => 'required|min:6',
                    'rpassword' => 'required_with:password|same:password|min:6|required',

//                    'noidknopthue'=>'required',
//                    'giayphepkd'=>'required',
                    'email'=>'required|email',
                    'tailieu'=>'required',
//                    'chucdanh'=>'required',
//                    'nguoiky'=>'required',
                    'diadanh'=>'required',
                ];
            }
                break; // change here
            default:break;
        }
    }

    public function messages()
    {
        return [
            'tendn.required'=>'Tên doanh nghiệp không được để trống',
            'maxa.required'=>'Mã số thuế của doanh nghiệp không được để trống',
            'maxa.unique'=>'Mã số thuế này đã tồn tại',
            'username.unique'=>'Tên tài khoản truy cập này đã tồn tại',
            'username.required'=>'Username của doanh nghiệp không được để trống',
            'diachi.required'=>'Địa chỉ của doanh nghiệp không được để trống',
            'password.required'=>'Mật khẩu của doanh nghiệp không được để trống',
            'password.min'=>'Mật khẩu ít nhất phải 6 ký tự',
            'rpassword.required'=>'Mật khẩu nhập lại không được để trống',
            'rpassword.required_with'=>'Mật khẩu nhập lại không chính xác',

//            'noidknopthue.required'=>'Mật khẩu của doanh nghiệp không được để trống',
//            'giayphepkd.required'=>'Thông tin giấy đăng ký kinh doanh không được để trống',
            'tailieu.required'=>'File giấy đăng ký kinh doanh không được để trống',
//            'chucdanh.required'=>'Chức danh người ký kinh doanh không được để trống',
//            'nguoiky.required'=>'Họ và tên người ký không được để trống',
            'diadanh.required'=>'Địa danh không được để trống',
            'email.required'=>'Email quản lý không được để trống',
            'email.email'=>'Không đúng email',
        ];
    }
}
