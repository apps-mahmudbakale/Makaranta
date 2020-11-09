<?php

namespace App\Http\Requests;
use Gate;
use App\Section;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroySectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
       {
         return abort_if(Gate::denies('section_delete'), 403, '403 Forbidden') ?? true;
       }

       /**
        * Get the validation rules that apply to the request.
        *
        * @return array
        */
       public function rules()
       {
           return [
               'ids'   => 'required|array',
               'ids.*' => 'exists:sections,id',
           ];
       }
}
