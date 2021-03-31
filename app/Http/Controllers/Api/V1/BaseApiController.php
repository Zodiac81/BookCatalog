<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;

class BaseApiController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel Book Catalog API Documentation",
     *      description="Laravel Book Catalog API Documentation",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )
     *
     *
     * @OA\Tag(
     *     name="Books",
     *     description="API Endpoints of Books"
     * )
     *
     * @OA\Tag(
     *     name="Authors",
     *     description="API Endpoints of Authors"
     * )
     *
     * @OA\Tag(
     *     name="Rubrics",
     *     description="API Endpoints of Rubrics"
     * )
     */
}
