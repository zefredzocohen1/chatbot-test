<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Cần 1 cái
     * bên nội: anh toàn 2 bác lên 2, bác gì 3, 7x20k
     * anh hưng 2, anh Hau 1, Lan 1, Long 1, anh tuy 3, anh tân 1, bác kháng 3, bác thắng 1, chú vĩnh 2 : 15x50k
     * anh
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        Log::info('requetst user');
        //update
        if(Request::isMethod('put') && Request::is('user/*') ){
            $userId = Request::route()->parameter('user');
            $validation = [
                'name'                 => 'required|max:50',
                'email'                => "required|email|max:50|min:6|unique:users,email,$userId,id,deleted_at,NULL",
                'password'             => 'max:25|min:6|confirmed',
                'password_confirmation'=> 'required_if:password,!=null ',
                'company_name'         => 'required|max:255',
                'url'                  => 'url|max:255',
            ];
            if(Auth::user()->id != $userId){
                $validation['authority'] = 'required|numeric';
            }
            return $validation;
        } elseif(Request::is('account/*') ){
            //update my account with link is account/edit
            return [
                'name'                 => 'required|max:50',
                'password'             => 'max:25|min:6|confirmed',
                'password_confirmation'=> 'required_if:password,!=null ',
                'company_name'         => 'required|max:255',
                'url'                  => 'url|max:255',
            ];
        } else {
            //create  new user
            return [
                'name'                 => 'required|max:50',
                'email'                => 'required|email|max:50|min:6|unique:users,email,NULL,id,deleted_at,NULL',
                'password'             => 'required|max:25|min:6|confirmed',
                'password_confirmation'=> 'required',
                'company_name'         => 'required|max:255',
                'authority'            => 'required|numeric',
                'url'                  => 'url|max:255',
            ];
        }
    }
}
