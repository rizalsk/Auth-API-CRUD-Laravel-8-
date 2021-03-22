<?php

/**
 * @OA\Schema(
 *      title="Update Crud request",
 *      description="Update Crud request body data",
 *      type="object",
 *      required={"status"}
 * )
 */

class UpdateCrudRequest
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