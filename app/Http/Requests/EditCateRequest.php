<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'unique:vp_categories,cate_name,'.$this->segment(5).',cate_id'
            //public/admin/category/edit/1 chỉ có 5 segment check xem id có trùng ko
        ];
    }

    public function messages()
    {
        return [
            //
            'name.unique'=>'Tên danh mục đã bị trùng!'
        ];
    }
}
