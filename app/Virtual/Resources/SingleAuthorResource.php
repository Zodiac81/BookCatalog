<?php


namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="SingleAuthorResource",
 *     description="Single author resource",
 *     @OA\Xml(
 *         name="SingleAuthorResource"
 *     )
 * )
 */

class SingleAuthorResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Author[]
     */
    private $data;
}
