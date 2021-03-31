<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="StoreRubricRequest",
 *      description="Store rubric request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreRubricRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Rubric`s name",
     *      example="Rubric 5",
     *      type="string",
     *      @OA\Items(
     *          type="string",
     *          @OA\Items()
     *      ),
     * )
     *
     * @var string
     */
    public $name;
}
