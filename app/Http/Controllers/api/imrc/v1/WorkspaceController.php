<?php

namespace App\Http\Controllers\api\imrc\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkspaceResource;
use App\Repositories\WorkspaceRepository;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    /**
     * @var WorkspaceRepository
     */
    protected $repository;

    /**
     * ClientController constructor.
     *
     * @param WorkspaceRepository $repository
     */
    public function __construct(WorkspaceRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return WorkspaceResource::collection($this->repository->getAll());
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
     * @param $id
     * @return WorkspaceResource
     */
    public function show($id)
    {
        return (new WorkspaceResource($this->repository->getById($id)));
    }

    /**
     * @param $id
     * @return WorkspaceResource
     */
    public function edit($id)
    {
        return (new WorkspaceResource($this->repository->getById($id)));
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
