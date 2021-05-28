<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int     $id
 * @property int     $client_id
 * @property string  $name
 * @property string  $slug
 * @property forms[] $forms
 */
class Workspace extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'slug', 'client_id'];

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Form::class, 'workspace_id', 'id');
    }
}
