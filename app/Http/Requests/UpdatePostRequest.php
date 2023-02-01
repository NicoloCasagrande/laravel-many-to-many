<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('posts')->ignore($this->post),'string','max:150'],
            'content' => 'required|string', 
            'cover_image' => 'nullable|image|max:2048',
            'no_image' => 'nullable',
            'category_id' => 'nullable|exists:categories,id', 
            'tags' => 'nullable|exists:tags,id'
        ];
    }
}
