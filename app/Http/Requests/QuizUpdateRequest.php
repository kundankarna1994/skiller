<?php

namespace App\Http\Requests;

use App\Models\QuestionCategory;
use App\Models\Quiz;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


/**
 * @property Quiz $quiz
 */
class QuizUpdateRequest extends FormRequest
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
            'title' => "string|required|max:255",
            'category_id' => "required|exists:question_categories,id",
            'slug' => "string|required|max:255|unique:quizzes,slug," . $this->quiz->id,
            'description' => "string|nullable|max:5000",
            'thumbnail' => "nullable|image|max:2046",
            'time' => "required|integer",
            'retry_after' => "required|integer",
            "status" => "boolean|nullable",
            "questions" => "array|required",
            "questions.*" => "required|exists:questions,id",
        ];
    }
}
