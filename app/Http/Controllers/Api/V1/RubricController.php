<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreRubricRequest;
use App\Http\Requests\UpdateRubricrequest;
use App\Http\Resources\RubricResource;
use App\Http\Resources\SingleRubricResource;
use App\Models\Rubric;
use App\Services\Rubric\IRubric;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RubricController extends BaseApiController
{
    protected $rubricService;

    public function __construct(IRubric $rubricService)
    {
        $this->rubricService = $rubricService;
        $this->middleware( 'auth:api')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success(RubricResource::collection(Rubric::getAllWithPaginate()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRubricRequest $request
     * @return JsonResponse
     */
    public function store(StoreRubricRequest $request): JsonResponse
    {
        $data = $request->only('name');
        $newRubric = $this->rubricService->store($data);
        if ($newRubric) {
            return $this->success($newRubric, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Rubric $rubric
     * @return JsonResponse
     */
    public function show(Rubric $rubric): JsonResponse
    {
        return $this->success(new SingleRubricResource($rubric), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRubricrequest $request
     * @param Rubric $rubric
     * @return JsonResponse
     */
    public function update(UpdateRubricrequest $request, Rubric $rubric): JsonResponse
    {
        $data = $request->only('name');
        $updateRubric = $this->rubricService->update($data, $rubric);
        if ($updateRubric) {
            return $this->success($updateRubric, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rubric $rubric
     * @return JsonResponse
     */
    public function destroy(Rubric $rubric): JsonResponse
    {
        $this->rubricService->delete($rubric);
        return $this->success(null, Response::HTTP_NO_CONTENT);
    }
}
