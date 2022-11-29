<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => 'required|string',
            'content' =>'required|string',
            'preview_image' =>'nullable|file',
            'main_image' =>'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'Title wasnt provided',
    //         'title.string' => 'Data was not empty',
    //         'preview_image.required' => 'This image was not provided',
    //         'preview_image.file' => 'Empty image was provided',
    //         'main_image.required' => 'This image was not provided',
    //         'main_image.file' => 'Empty image was provided',
    //         'category_id.required' => 'This category was not provided',
    //         'category_id.integer' => 'Category was not provided',
    //         'category_id.exists' => 'Category ID was not in db',
    //         'tag_ids.array' => 'Wrong number of tags id array was provided',
    //     ];
    // }
}
