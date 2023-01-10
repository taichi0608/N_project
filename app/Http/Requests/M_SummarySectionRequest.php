<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class M_SummarySectionRequest extends FormRequest
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
            'category_id' => 'required | numeric | max:10000',
            'SummarySectionCode' => 'required | numeric | max:10000',
            'SummarySectionName' =>'required | max:20',
            'product_ab_name' => 'required |  max:100',
        ];
    }
}
