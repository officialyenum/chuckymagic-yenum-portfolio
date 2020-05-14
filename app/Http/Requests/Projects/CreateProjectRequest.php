<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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

            'title' => 'required|unique:projects',
            'description' => 'required|max:200',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2560',
            'content' => 'required',
            'category' => 'required',
        ];
    }
}
