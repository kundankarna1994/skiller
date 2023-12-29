<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\QuizRepository;
use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $questions = Quiz::paginate(10);
        return QuizResource::collection($questions);
    }


    /**
     * @param QuizStoreRequest $request
     * @return QuizResource
     */
    public function store(QuizStoreRequest $request): QuizResource
    {
        $data = $request->validated();
        $quiz = $this->quizRepository->store($data);
        return new QuizResource($quiz);
    }


    /**
     * @param Quiz $quiz
     * @return QuizResource
     */
    public function show(Quiz $quiz): QuizResource
    {
        $quiz->load('questions');
        return new QuizResource($quiz);
    }


    /**
     * @param QuizUpdateRequest $request
     * @param Quiz $quiz
     * @return QuizResource
     */
    public function update(QuizUpdateRequest $request, Quiz $quiz): QuizResource
    {
        $data = $request->validated();
        $quiz = $this->quizRepository->update($data, $quiz);
        return new QuizResource($quiz);
    }


    /**
     * @param Quiz $question
     * @return Response
     */
    public function destroy(Quiz $question): Response
    {
        $question->delete();
        return response()->noContent();
    }
}
