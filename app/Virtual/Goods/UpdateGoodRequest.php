<?php

/**
 * @OA\Schema(
 *     description="Some simple request create a Good",
 *     type="object",
 *     required={"name", "detail"},
 *     title="Example storring Goods Schema UpdateGoodRequest",
 * )
 */
class UpdateGoodRequest
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Some name",
     *     format="string",
     *     example="name"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Detail",
     *     description="Some detail",
     *     format="string",
     *     example="detail"
     * )
     *
     * @var int
     */
    public $detail;
}
