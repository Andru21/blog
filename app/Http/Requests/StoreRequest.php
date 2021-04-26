<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'id_request' => 'required',
            'id_company' => 'required',
            'id_external_request_type' => 'required',
            'id_external_request' => 'required',
            'reprocess' => 'required',
            'id_reprocess_causal' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'id_request_type' => 'required',
            'id_user' => 'required',
            'time_estimate' => 'required',
            'time_real' => 'required',
            'request_date' => 'required',
            'start_estimate_date' => 'required',
            'end_estimate_date' => 'required',
            'request_status' => 'required',
            'id_project' => 'required',
            'id_subproject' => 'required',
            'id_app_module' => 'required',
            /* 'start_real_date' => 'required',
            'end_real_date' => 'required',
            'time_work' => 'required',
            'agreement_date' => 'required',
            'id_father_request' => 'required',
            'id_foldercloud' => 'required',
            'start_time_distributed' => 'required',
            'id_request_class' => 'required',
            'time_distributed' => 'required',
            'id_user_reg' => 'required',
            'id_criticality' => 'required',
            'initial_time_estimate' => 'required' */
        ];
    }
    public function messages(){
        return[
        'id_request.required' => 'Este campo es obligatorio',
        'id_company.required' => 'Este campo es obligatorio',
        'id_external_request_type.required' => 'Este campo es obligatorio',
        'id_external_request.required' => 'Este campo es obligatorio',
        'reprocess.required' => 'Este campo es obligatorio',
        'id_reprocess_causal.required' => 'Este campo es obligatorio',
        'description.required' => 'Este campo es obligatorio',
        'priority.required' => 'Este campo es obligatorio',
        'id_request_type.required' => 'Este campo es obligatorio',
        'id_user.required' => 'Este campo es obligatorio',
        'time_estimate.required' => 'Este campo es obligatorio',
        'time_real.required' => 'Este campo es obligatorio',
        'request_date.required' => 'Este campo es obligatorio',
        'start_estimate_date.required' => 'Este campo es obligatorio',
        'end_estimate_date.required' => 'Este campo es obligatorio',
        'request_status.required' => 'Este campo es obligatorio',
        'id_project.required' => 'Este campo es obligatorio',
        'id_subproject.required' => 'Este campo es obligatorio',
        'id_app_module.required' => 'Este campo es obligatorio'
    ];
        


    }
}
