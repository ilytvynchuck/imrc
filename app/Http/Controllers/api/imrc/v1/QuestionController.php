<?php

namespace App\Http\Controllers\api\imrc\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $repository;

    /**
     * ClientController constructor.
     *
     * @param QuestionRepository $repository
     */
    public function __construct(QuestionRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return QuestionResource::collection($this->repository->getAll());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $this->repository->create($request->all());
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()]);
        }

        return response()->json();
    }

    /**
     * @param $slug
     * @return QuestionResource
     */
    public function showBySlug($slug)
    {
        return (new QuestionResource($this->repository->getBySlug($slug)));
    }

    /**
     * @param $id
     * @return QuestionResource
     */
    public function show($id)
    {
        return (new QuestionResource($this->repository->getById($id)));
    }

    /**
     * @param $id
     * @return QuestionResource
     */
    public function edit($id)
    {
        return (new QuestionResource($this->repository->getById($id)));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $this->repository->update($request->all(), $id);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()]);
        }

        return response()->json();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->repository->remove($id);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()]);
        }

        return response()->json();
    }
}
