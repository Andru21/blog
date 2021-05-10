<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestRange extends FormRequest
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
            'id_request_range' => 'required',
            'id_request' => 'required',
            'id_user' => 'required',
            'initial_date' => 'required',
            'end_date' => 'required',
   /*          'work_time' => 'required', */
            'is_close' => 'required',
            'in_site' => 'required',
            /* 'id_support_activity' => 'required' */
        ];
    }
    public function messages(){
        return[
            'id_request_range.required' => 'Este Campo es Obligatorio',
            'id_request.required' => 'Este Campo es Obligatorio',
            'id_user.required' => 'Este Campo es Obligatorio',
            'initial_date.required' => 'Este Campo es Obligatorio',
            'end_date.required' => 'Este Campo es Obligatorio',
            /* 'work_time.required' => 'Este Campo es Obligatorio', */
            'is_close.required' => 'Este Campo es Obligatorio',
            'in_site.required' => 'Este Campo es Obligatorio',
            /* 'id_support_activity.required' => 'Este Campo es Obligatorio', */
        ];
    }
}
