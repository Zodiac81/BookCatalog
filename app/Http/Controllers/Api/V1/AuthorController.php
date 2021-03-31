<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\SingleAuthorResource;
use App\Models\Author;
use App\Services\Author\IAuthor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends BaseApiController
{
    protected $authorService;

    public function __construct(IAuthor $authorService)
    {
        $this->authorService = $authorService;
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/authors",
     *      operationId="getAuthorsList",
     *      tags={"Authors"},
     *      summary="Get list of authors",
     *      description="Returns list of authors",
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
        return $this->success(AuthorResource::collection(Author::getAllWithPaginate()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAuthorRequest $request
     * @return JsonResponse
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Post(
     *      path="/authors",
     *      operationId="storeAuthor",
     *      tags={"Authors"},
     *      summary="Store new author",
     *      description="Returns author data",
     *      security={{"api_key_security":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreAuthorRequest")
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
    public function store(StoreAuthorRequest $request): JsonResponse
    {
        $data = $request->only(['first_name', 'last_name']);
        $newAuthor = $this->authorService->store($data);
        if ($newAuthor) {
            return $this->success($newAuthor, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/authors/{id}",
     *      operationId="getAuthorById",
     *      tags={"Authors"},
     *      summary="Get author information",
     *      description="Returns author data",
     *      security={{}},
     * @OA\Parameter(
     *          name="id",
     *          description="Author id",
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
    public function show(Author $author): JsonResponse
    {
        return $this->success(new SingleAuthorResource($author), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return JsonResponse
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Patch(
     *      path="/authors/{id}",
     *      operationId="editAuthor",
     *      tags={"Authors"},
     *      summary="Edit author",
     *      description="Returns edited author data",
     *      security={{"api_key_security":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Author id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreAuthorRequest")
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
    public function update(Request $request, Author $author): JsonResponse
    {
        $data = $request->only('first_name', 'last_name');
        $updateAuthor = $this->authorService->update($data, $author);
        if ($updateAuthor) {
            return $this->success($updateAuthor, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return JsonResponse
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Delete(
     *      path="/authors/{id}",
     *      operationId="deleteAuthor",
     *      tags={"Authors"},
     *      summary="Delete author",
     *      description="Delete author",
     *      security={{"api_key_security":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Author id",
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
    public function destroy(Author $author): JsonResponse
    {
        $this->authorService->delete($author);
        return $this->success(null, Response::HTTP_NO_CONTENT);
    }
}
