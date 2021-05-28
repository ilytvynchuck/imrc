<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $form_id
 * @property int $question_id
 */
class FormQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'question_id'];
}
