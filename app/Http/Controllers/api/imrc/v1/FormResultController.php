<?php

namespace App\Http\Controllers\api\imrc\v1;

use App\Http\Resources\FormResultResource;
use App\Repositories\FormResultRepository;

/**
 * Class FormResultController
 *
 * @package App\Http\Controllers\api\imrc\v1
 */
class FormResultController
{

    /**
     * @var FormResultRepository
     */
    protected $repository;

    /**
     * ClientController constructor.
     *
     * @param FormResultRepository $repository
     */
    public function __construct(FormResultRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showResults($id)
    {
        return FormResultResource::collection($this->repository->showResults($id));
    }
}
