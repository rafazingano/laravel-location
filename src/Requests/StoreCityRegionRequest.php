<?php

namespace ConfrariaWeb\Location\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRegionRequest extends FormRequest
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
            'name' => 'required|max:255',
            'code_phone' => 'required|max:5',
            'lang' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'code_phone.required'  => 'O código de telefone é obrigatório',
            'lang.required'  => 'Lingua é obrigatório',
        ];
    }
}
