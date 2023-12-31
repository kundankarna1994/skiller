<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuestionCategory extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var string
     */
    protected $table = "question_categories";

    /**
     * @var string[]
     */
    protected $fillable = [
        'title','slug'
    ];

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class,'category_id');
    }
}
