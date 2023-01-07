<?php

namespace App\Http\Requests\Admin\Movies;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'title' => 'required|string|unique:movies,title,'.$this->movie->id,
            'description' => 'required|string',
            'rate' => 'required|numeric',
            'category_id' => 'required|string|exists:categories,id',
            'image' => 'required|image',
        ];
    }
}
