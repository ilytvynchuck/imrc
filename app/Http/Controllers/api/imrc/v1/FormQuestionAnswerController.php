<?php

namespace App\Http\Controllers\api\imrc\v1;

use App\Repositories\FormQuestionAnswerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormQuestionAnswerController extends Controller
{

    /**
     * @var FormQuestionAnswerRepository
     */
    protected $repository;

    /**
     * ClientController constructor.
     *
     * @param FormQuestionAnswerRepository $repository
     */
    public function __construct(FormQuestionAnswerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        return $this->repository->create($request->all());
    }

}
