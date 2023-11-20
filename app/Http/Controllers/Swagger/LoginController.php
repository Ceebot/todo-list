<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="api/login",
 *     summary="Аутентификация",
 *     tags={"Login"},
 *     @OA\MediaType(mediaType="application/json"),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="email", type="string", example="Some email"),
 *                    @OA\Property(property="password", type="string", example="Some password"),
 *                )
 *            }
 *        )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="username", type="string", example="Some username"),
 *             @OA\Property(property="token", type="string", example="Some token"),
 *         )
 *      ),
 * ),
 *
 * @OA\Get(
 *     path="api/user",
 *     summary="Текущий user",
 *     tags={"Login"},
 *     @OA\MediaType(mediaType="application/json"),
 *
 *     @OA\RequestBody(),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="is_admin", type="integer", example=0),
 *                 @OA\Property(property="name", type="string", example="Some name"),
 *                 @OA\Property(property="email", type="string", example="Some email"),
 *             )
 *         )
 *      ),
 * ),
 *
 * @OA\Get(
 *      path="api/logout",
 *      summary="Выйти из аккаунта",
 *      tags={"Login"},
 *      @OA\MediaType(mediaType="application/json"),
 *
 *      @OA\RequestBody(),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Some message"),
 *          )
 *       ),
 *  ),
 */

class LoginController extends Controller
{
    //
}
