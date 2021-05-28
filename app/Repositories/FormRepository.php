<?php

namespace App\Repositories;

use App\Models\Form;
use Illuminate\Support\Facades\Artisan;

/**
 * Class ClientRepository
 *
 * @package App\Repositories
 */
class FormRepository
{

    /**
     * @var Form
     */
    protected $model;

    /**
     * ClientRepository constructor.
     *
     * @param Form $model
     */
    public function __construct(Form $model)
    {
        $this->model = $model;
    }

    /**
     * @return Form[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * @param $slug
     * @return Form|null
     */
    public function getBySlug($slug): ?Form
    {
        return $this->model::where('slug', $slug)->firstOrFail();
    }

    /**
     * @param $id
     * @return Form|null
     */
    public function getById($id): ?Form
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param $data
     * @return Form
     */
    public function create($data): Form
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();

        Artisan::call('prefill:questions', [
            'form_id' => $model->id
        ]);

        return $model;

    }

    /**
     * @param $data
     * @param $id
     * @return Form
     */
    public function update($data, $id): Form
    {
        $model = $this->model::findOrFail($id);
        $model->fill($data);
        $model->save();

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
