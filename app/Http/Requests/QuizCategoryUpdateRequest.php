<?php

namespace App\Http\Requests;

use App\Models\QuestionCategory;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property QuestionCategory $quiz_category
 */
class QuizCategoryUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => "required|string|max:255",
            'slug' => "required|string|max:255|unique:question_categories,slug," . $this->quiz_category->id
        ];
    }
}
