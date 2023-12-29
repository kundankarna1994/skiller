<?php

namespace App\Http\Repositories;


use App\Models\Quiz;

class QuizRepository
{

    public function store($data)
    {
        $data['thumbnail'] = $data['thumbnail']->store("quizzes");
        $quiz = Quiz::create($data);
        $quiz->questions()->sync($data['questions']);
        return $quiz;
    }

    public function update($data,$quiz)
    {
        if(isset($data['thumbnail'])){
            //delete file
            $data['thumbnail'] = $data['thumbnail']->store("quizzes");
        }
        $quiz->questions()->sync($data['questions']);
        return $quiz;
    }
}
