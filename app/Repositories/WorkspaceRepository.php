<?php

namespace App\Repositories;

use App\Models\Workspace;

/**
 * Class WorkspaceRepository
 *
 * @package App\Repositories
 */
class WorkspaceRepository
{

    /**
     * @var Workspace
     */
    protected $model;

    /**
     * ClientRepository constructor.
     *
     * @param Workspace $model
     */
    public function __construct(Workspace $model)
    {
        $this->model = $model;
    }

    /**
     * @return Workspace[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * @param $id
     * @return Workspace|null
     */
    public function getById($id): ?Workspace
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param $data
     * @return Workspace
     */
    public function create($data): Workspace
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();

        return $model;

    }

    /**
     * @param $data
     * @param $id
     * @return Workspace
     */
    public function update($data, $id): Workspace
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
