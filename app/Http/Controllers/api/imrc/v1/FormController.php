<?php

namespace App\Http\Controllers\api\imrc\v1;

use App\Http\Resources\FormResource;
use App\Repositories\FormRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{

    /**
     * @var FormRepository
     */
    protected $repository;

    /**
     * ClientController constructor.
     *
     * @param FormRepository $repository
     */
    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FormResource::collection($this->repository->getAll());
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
     * @return FormResource
     */
    public function showBySlug($slug)
    {
        return (new FormResource($this->repository->getBySlug($slug)));
    }

    /**
     * @param $id
     * @return FormResource
     */
    public function show($id)
    {
        return (new FormResource($this->repository->getById($id)));
    }

    /**
     * @param $id
     * @return FormResource
     */
    public function edit($id)
    {
        return (new FormResource($this->repository->getById($id)));
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
