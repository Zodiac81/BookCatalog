<?php


namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="SingleBookResource",
 *     description="Single book resource",
 *     @OA\Xml(
 *         name="SingleBookResource"
 *     )
 * )
 */

class SingleBookResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Book[]
     */
    private $data;
}
