<?php

namespace App\Repositories;

use App\Models\FormQuestion;

class FormResultRepository
{

    /**
     * @var FormQuestion
     */
    protected $model;

    /**
     * ClientRepository constructor.
     *
     * @param FormQuestion $model
     */
    public function __construct(FormQuestion $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showResults($id)
    {
        return $this->model::where('form_id', $id)->whereHas('answer')->get();
    }
}
