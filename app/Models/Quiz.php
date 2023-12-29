<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizzes";

    protected $fillable = [
      'title','category_id','slug','thumbnail','description','time','retry_after','status'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_questions', 'quiz_id', 'question_id');
    }
}
