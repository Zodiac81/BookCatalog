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
     *
     * @OA\Get(
     *      path="/rubrics",
     *      operationId="getRubricsList",
     *      tags={"Rubrics"},
     *      summary="Get list of rubrics",
     *      description="Returns list of rubrics",
     *      security={{}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *     )
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
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Post(
     *      path="/rubrics",
     *      operationId="storeRubric",
     *      tags={"Rubrics"},
     *      summary="Store new rubric",
     *      description="Returns rubric data",
     *      security={{"api_key_security":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreRubricRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *         @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent()
     *      )
     * )
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
     *
     * @OA\Get(
     *      path="/rubrics/{id}",
     *      operationId="getRubricById",
     *      tags={"Rubrics"},
     *      summary="Get rubric information",
     *      description="Returns rubric data",
     *      security={{}},
     * @OA\Parameter(
     *          name="id",
     *          description="Rubric id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
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
     *
     *  @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Patch(
     *      path="/rubrics/{id}",
     *      operationId="editRubric",
     *      tags={"Rubrics"},
     *      summary="Edit rubric",
     *      description="Returns edited rubric data",
     *      security={{"api_key_security":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Rubric id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreRubricRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Accepted",
     *         @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent()
     *      )
     * )
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
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Delete(
     *      path="/rubrics/{id}",
     *      operationId="deleteRubric",
     *      tags={"Rubrics"},
     *      summary="Delete rubric",
     *      description="Delete rubric",
     *      security={{"api_key_security":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Rubric id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="No Content",
     *         @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent()
     *      )
     * )
     */
    public function destroy(Rubric $rubric): JsonResponse
    {
        $this->rubricService->delete($rubric);
        return $this->success(null, Response::HTTP_NO_CONTENT);
    }
}
