<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\SingleBookResource;
use App\Models\Book;
use App\Services\Book\IBook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BookController extends BaseApiController
{

    protected $bookService;

    public function __construct(IBook $bookService)
    {
        $this->bookService = $bookService;
        $this->middleware( 'auth:api')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success(BookResource::collection(Book::getAllWithPaginate()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookRequest $request
     * @return JsonResponse
     */
    public function store(StoreBookRequest $request): JsonResponse
    {
        $data = $request->only(['title', 'authors', 'rubrics']);
        $newBook = $this->bookService->store($data);
        if ($newBook) {
            return $this->success($newBook, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return JsonResponse
     * @throws \Exception
     */
    public function show(Book $book): JsonResponse
    {
        return $this->success(new SingleBookResource($book), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBookRequest $request
     * @param Book $book
     * @return JsonResponse
     */
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $data = $request->only(['title', 'authors', 'rubrics']);
        $updateBook = $this->bookService->update($data, $book);
        if ($updateBook) {
            return $this->success($updateBook, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Book $book): JsonResponse
    {
        $this->bookService->delete($book);
        return $this->success(null, Response::HTTP_NO_CONTENT);
    }

}
