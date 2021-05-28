<?php

namespace App\Repositories;

use App\Models\Question;

/**
 * Class QuestionRepository
 *
 * @package App\Repositories
 */
class QuestionRepository
{

    /**
     * @var Question
     */
    protected $model;

    /**
     * ClientRepository constructor.
     *
     * @param Question $model
     */
    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    /**
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * @param $slug
     * @return Question|null
     */
    public function getBySlug($slug): ?Question
    {
        return $this->model::where('slug', $slug)->firstOrFail();
    }

    /**
     * @param $id
     * @return Question|null
     */
    public function getById($id): ?Question
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param $data
     * @return Question
     */
    public function create($data): Question
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();

        $model->formQuestions()->create($data);

        return $model;

    }

    /**
     * @param $data
     * @param $id
     * @return Question
     */
    public function update($data, $id): Question
    {
        $model = $this->model::findOrFail($id);
        $model->fill($data);
        $model->save();

        $model->formQuestions->update($data);

        return $model;
    }

    /**
     * @param $id
     * @return bool
     */
    public function remove($id): bool
    {
        $model = $this->model::find($id);
        if ($model)
            $model->delete();

        return true;
    }
}
