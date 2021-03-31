<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Author",
 *     description="Author model",
 *     @OA\Xml(
 *         name="Author"
 *     )
 * )
 */

class Author
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="first_name",
     *      description="Author`s name",
     *      example="Bob"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="last_name",
     *      description="Author`s surname",
     *      example="Marley"
     * )
     *
     * @var string
     */
    public $last_name;
}
