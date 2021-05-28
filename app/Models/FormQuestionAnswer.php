<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $form_questions_id
 * @property string $value
 */
class FormQuestionAnswer extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['form_questions_id', 'value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formQuestion()
    {
        return $this->hasOne(FormQuestion::class, 'id', 'form_questions_id');
    }
}
