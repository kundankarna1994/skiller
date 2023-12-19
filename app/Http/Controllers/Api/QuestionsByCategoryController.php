<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCategoryResource;
use App\Models\QuestionCategory;


class QuestionsByCategoryController extends Controller
{
    /**
     * @param QuestionCategory $questionCategory
     * @return QuestionCategoryResource
     */
    public function __invoke(QuestionCategory $questionCategory): QuestionCategoryResource
    {
        $questionCategory->load('questions');
        return new QuestionCategoryResource($questionCategory);
    }
}
