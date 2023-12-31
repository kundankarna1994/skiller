<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Question $question
 */
class QuestionUpdateRequest extends FormRequest
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
            'title' => "string|required|max:255",
            'category_id' => "required|exists:question_categories,id",
            'slug' => "string|required|max:255|unique:questions,slug," . $this->question->id,
            'description' => "string|nullable|max:5000",
            'options' => "array|required",
            'answer' => "string|required|max:255|in_array:options.*",
            "weightage" => "required|integer|min:10",
            "status" => "boolean|nullable"
        ];
    }
}
