<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $label
 * @property string $field_name
 * @property int    $form_id
 * @property int    $is_require
 * @property Form   $form
 */
class Question extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['label', 'is_require', 'field_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function form()
    {
        return $this->hasOneThrough(Form::class, FormQuestion::class, 'question_id', 'id', 'id', 'form_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formQuestions()
    {
        return $this->hasOne(FormQuestion::class, 'question_id', 'id');
    }


}
