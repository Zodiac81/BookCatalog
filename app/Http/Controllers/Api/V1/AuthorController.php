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
     */
    public function destroy(Author $author): JsonResponse
    {
        $this->authorService->delete($author);
        return $this->success(null, Response::HTTP_NO_CONTENT);
    }
}
