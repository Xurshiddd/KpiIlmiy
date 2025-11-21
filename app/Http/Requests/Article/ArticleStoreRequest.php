<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'quarter' => 'required|integer|min:1|max:4',
            'filesDoc' => 'required|file|mimes:pdf|max:102428',
            'filesImg' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10024',
            'task_id' => 'required|exists:tasks,id',
        ];
    }
}
