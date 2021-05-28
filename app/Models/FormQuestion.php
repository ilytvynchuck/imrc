<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                $id
 * @property int                $form_id
 * @property int                $question_id
 * @property FormQuestionAnswer $answer
 * @property Question[]         $questions
 */
class FormQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'question_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function answer()
    {
        return $this->hasOne(FormQuestionAnswer::class, 'form_questions_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'id', 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne(Form::class, 'id', 'form_id');
    }
}
