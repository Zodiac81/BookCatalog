<?php


namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="StoreAuthorRequest",
 *      description="Store author request body data",
 *      type="object",
 *      required={"first_name"},
 *      required={"last_name"}
 * )
 */

class StoreAuthorRequest
{

    /**
     * @OA\Property(
     *      title="first_name",
     *      description="Author`s name",
     *      example="Bob",
     *      type="string",
     *      @OA\Items(
     *          type="string",
     *          @OA\Items()
     *      ),
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="last_name",
     *      description="Author`s surname",
     *      example="Marley",
     *      type="string",
     *      @OA\Items(
     *          type="string",
     *          @OA\Items()
     *      ),
     * )
     *
     * @var string
     */
    public $last_name;
}
