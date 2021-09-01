<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UpdatePostRequest extends FormRequest
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
            'title' => [
                'required',
                'max:255',
                Rule::unique('posts', 'title')->ignore($this->post->id),
            ],
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpg,jpeg,png|max:5120|size:5120',
            'content' => 'required',
            'published_at' => 'required',
            'category' => 'required'
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function formatErrors(Validator $validator)
    {

        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first()
        ]);
    }
}
