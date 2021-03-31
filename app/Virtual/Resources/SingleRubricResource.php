<?php


namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="SingleRubricResource",
 *     description="Single rubric resource",
 *     @OA\Xml(
 *         name="SingleRubricResource"
 *     )
 * )
 */

class SingleRubricResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Rubric[]
     */
    private $data;
}
