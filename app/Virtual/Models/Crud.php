<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Crud",
 *     description="Crud model",
 *     @OA\Xml(
 *         name="Crud"
 *     )
 * )
 */
class Crud
{

    /**
     * @OA\Property(
     *     title="USER_ID",
     *     description="USER_ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $user_id;

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status",
     *      example="active"
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *      title="Position",
     *      description="Position",
     *      example="Manager"
     * )
     *
     * @var string
     */

    public $position;
}