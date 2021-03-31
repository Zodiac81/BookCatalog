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
     *
     * @OA\Get(
     *      path="/books",
     *      operationId="getBooksList",
     *      tags={"Books"},
     *      summary="Get list of books",
     *      description="Returns list of books",
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
        return $this->success(BookResource::collection(Book::getAllWithPaginate()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookRequest $request
     * @return JsonResponse
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Post(
     *      path="/books",
     *      operationId="storeBook",
     *      tags={"Books"},
     *      summary="Store new book",
     *      description="Returns book data",
     *      security={{"api_key_security":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
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
     *
     * @OA\Get(
     *      path="/books/{id}",
     *      operationId="getBookById",
     *      tags={"Books"},
     *      summary="Get book information",
     *      description="Returns book data",
     *      security={{}},
     * @OA\Parameter(
     *          name="id",
     *          description="Book id",
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
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Patch(
     *      path="/books/{id}",
     *      operationId="editBook",
     *      tags={"Books"},
     *      summary="Edit book",
     *      description="Returns edited book data",
     *      security={{"api_key_security":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
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
     *
     * @OAS\SecurityScheme(
     *      securityScheme="api_key_security",
     *      type="http",
     *      scheme="bearer"
     * )
     * @OA\Delete(
     *      path="/books/{id}",
     *      operationId="deleteBook",
     *      tags={"Books"},
     *      summary="Delete book",
     *      description="Delete book",
     *      security={{"api_key_security":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description = "Data packet for Test",
     *          @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
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
    public function destroy(Book $book): JsonResponse
    {
        $this->bookService->delete($book);
        return $this->success(null, Response::HTTP_NO_CONTENT);
    }

}
