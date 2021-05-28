<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int        $id
 * @property int        $workspace_id
 * @property string     $label
 * @property string     $slug
 * @property Question[] $questions
 */
class Form extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['label', 'workspace_id', 'slug'];

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function questions(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Question::class, FormQuestion::class, 'form_id', 'id', 'id', 'question_id');
    }
}
