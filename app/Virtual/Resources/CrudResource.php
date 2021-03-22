<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="CrudResource",
 *     description="Crud resource",
 *     @OA\Xml(
 *         name="CrudResource"
 *     )
 * )
 */
class CrudResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Crud[]
     */
    private $data;
}