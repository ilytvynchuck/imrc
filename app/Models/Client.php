<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int         $id
 * @property string      $name
 * @property string      $slug
 * @property Workspace[] $workspaces
 */
class Client extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'slug'];

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
    public function workspaces(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Workspace::class, 'client_id', 'id');
    }
}
