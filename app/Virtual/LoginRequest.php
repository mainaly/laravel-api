<?php

/**
 * @OA\Schema(
 *     description="Login",
 *     type="object",
 *     required={"email", "password"},
 *     title="Login",
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *     title="Email",
     *     description="Some name",
     *     format="string",
     *     example="email"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="password",
     *     description="Some detail password",
     *     format="string",
     *     example="password"
     * )
     *
     * @var string
     */
    public $password;
}
