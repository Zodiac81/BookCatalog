<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="StoreBookRequest",
 *      description="Store Book request body data",
 *      type="object",
 *      required={"title"},
 *      required={"authors"},
 *      required={"rubrics"}
 * )
 */

class StoreBookRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Title of the new project",
     *      example="A nice new book"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="authors",
     *      description="Author(s) of the new book",
     *      example="[1,4]",
     *      type="array",
     *      @OA\Items(
     *          type="array",
     *          @OA\Items()
     *      ),
     * )
     *
     * @var array
     */
    public $authors;

    /**
     * @OA\Property(
     *      title="rubrics",
     *      description="Rubric(s) of the new book",
     *      example="[2]",
     *      type="array",
     *      @OA\Items(
     *          type="array",
     *          @OA\Items()
     *      ),
     * )
     *
     * @var array
     */
    public $rubrics;
}
