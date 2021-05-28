<?php

namespace App\Repositories;

use App\Models\FormQuestionAnswer;
use Illuminate\Support\Facades\Artisan;

/**
 * Class FormQuestionAnswerRepository
 *
 * @package App\Repositories
 */
class FormQuestionAnswerRepository
{

    /**
     * @var FormQuestionAnswer
     */
    protected $model;

    /**
     * ClientRepository constructor.
     *
     * @param FormQuestionAnswer $model
     */
    public function __construct(FormQuestionAnswer $model)
    {
        $this->model = $model;
    }

    /**
     * @param $datas
     * @return bool
     */
    public function create($datas): bool
    {
        foreach ($datas as $data) {
            $model = new $this->model();
            $model->fill($data);
            $model->save();
        }

        return true;
    }
}
