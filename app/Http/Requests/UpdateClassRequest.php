<?php

namespace App\Http\Requests;
use App\Classes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('class_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class' => [
                'required',
            ],
        ];
    }
}
