<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizCategoryStoreRequest;
use App\Http\Requests\QuizCategoryUpdateRequest;
use App\Http\Resources\QuizCategoryResource;
use App\Models\QuizCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class QuizCategoryController extends Controller
{

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $questionCategories = QuizCategory::paginate(10);
        return QuizCategoryResource::collection($questionCategories);
    }


    /**
     * @param QuizCategoryStoreRequest $request
     * @return QuizCategoryResource
     */
    public function store(QuizCategoryStoreRequest $request): QuizCategoryResource
    {
        $data = $request->validated();
        $quizCategory = QuizCategory::create($data);
        return new QuizCategoryResource($quizCategory);
    }


    /**
     * @param QuizCategory $quizCategory
     * @return QuizCategoryResource
     */
    public function show(QuizCategory $quizCategory): QuizCategoryResource
    {
        return new QuizCategoryResource($quizCategory);
    }


    /**
     * @param QuizCategoryUpdateRequest $request
     * @param QuizCategory $quizCategory
     * @return QuizCategoryResource
     */
    public function update(QuizCategoryUpdateRequest $request, QuizCategory $quizCategory): QuizCategoryResource
    {
        $data = $request->validated();
        $quizCategory->update($data);
        return new QuizCategoryResource($quizCategory);
    }


    /**
     * @param QuizCategory $quizCategory
     * @return Response
     */
    public function destroy(QuizCategory $quizCategory): Response
    {
        $quizCategory->delete();
        return response()->noContent();
    }
}
