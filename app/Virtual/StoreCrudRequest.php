<?php

/**
 * @OA\Schema(
 *      title="Store Crud request",
 *      description="Store Crud request body data",
 *      type="object",
 *      required={"status"}
 * )
 */

class StoreCrudRequest
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="Status of the new Crud",
     *      example="active"
     * )
     *
     * @var string
     */
    public $status;
    /**
     * @OA\Property(
     *      title="position",
     *      description="Position of the new Crud",
     *      example="Staff"
     * )
     *
     * @var string
     */
    public $position;

}