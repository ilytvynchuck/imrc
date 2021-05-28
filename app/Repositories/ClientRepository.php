<?php

namespace App\Repositories;

use App\Models\Client;

/**
 * Class ClientRepository
 *
 * @package App\Repositories
 */
class ClientRepository
{

    /**
     * @var Client
     */
    protected $model;

    /**
     * ClientRepository constructor.
     *
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    /**
     * @return Client[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * @param $id
     * @return Client|null
     */
    public function getById($id): ?Client
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param $data
     * @return Client
     */
    public function create($data): Client
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();

        return $model;

    }

    /**
     * @param $data
     * @param $id
     * @return Client
     */
    public function update($data, $id): Client
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
