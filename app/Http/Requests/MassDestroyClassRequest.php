<?php

namespace App\Http\Requests;
use App\Classes;
use Gate;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return abort_if(Gate::denies('class_delete'), 403, '403 Forbidden') ?? true;
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
            'ids.*' => 'exists:classes,id',
        ];
    }
}
