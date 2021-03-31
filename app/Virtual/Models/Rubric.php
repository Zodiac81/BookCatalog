<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Rubric",
 *     description="Rubric model",
 *     @OA\Xml(
 *         name="Rubric"
 *     )
 * )
 */

class Rubric
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
     *      title="name",
     *      description="Rubric`s name",
     *      example="Rubric 5"
     * )
     *
     * @var string
     */
    public $name;
}
