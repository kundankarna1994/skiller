<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCategoryStoreRequest;
use App\Http\Requests\QuestionCategoryUpdateRequest;
use App\Http\Resources\QuestionCategoryResource;
use App\Models\QuestionCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class QuestionCategoryController extends Controller
{

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $questionCategories = QuestionCategory::paginate(10);
        return QuestionCategoryResource::collection($questionCategories);
    }


    /**
     * @param QuestionCategoryStoreRequest $request
     * @return QuestionCategoryResource
     */
    public function store(QuestionCategoryStoreRequest $request): QuestionCategoryResource
    {
        $data = $request->validated();
        $questionCategory = QuestionCategory::create($data);
        return new QuestionCategoryResource($questionCategory);
    }


    /**
     * @param QuestionCategory $questionCategory
     * @return QuestionCategoryResource
     */
    public function show(QuestionCategory $questionCategory): QuestionCategoryResource
    {
        return new QuestionCategoryResource($questionCategory);
    }


    /**
     * @param QuestionCategoryUpdateRequest $request
     * @param QuestionCategory $questionCategory
     * @return QuestionCategoryResource
     */
    public function update(QuestionCategoryUpdateRequest $request, QuestionCategory $questionCategory): QuestionCategoryResource
    {
        $data = $request->validated();
        $questionCategory->update($data);
        return new QuestionCategoryResource($questionCategory);
    }


    /**
     * @param QuestionCategory $questionCategory
     * @return Response
     */
    public function destroy(QuestionCategory $questionCategory) : Response
    {
        $questionCategory->delete();
        return response()->noContent();
    }
}
