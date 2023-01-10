<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class M_SectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            //部門マスタのバリデーション
            'category_code' => 'required | numeric | max:1000',
            'category_name' => 'required | max:20',
            'category_ab_name' => 'required | max:5',
            'PayFor' => 'required |  max:5',
            'Hidden' => 'max:10',
            'DisplayOrder' => 'required | max:100',
            
        ];
    }
}
