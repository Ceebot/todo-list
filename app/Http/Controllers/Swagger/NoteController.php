<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *      path="api/notes",
 *      summary="Вывод заметок",
 *      tags={"Notes"},
 *      @OA\MediaType(mediaType="application/json"),
 *
 *      @OA\RequestBody(),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="notes", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                   @OA\Property(property="user_id", type="integer", example=1),
 *                   @OA\Property(property="title", type="string", example="Some title"),
 *                   @OA\Property(property="content", type="string", example="Some content"),
 *              )),
 *          )
 *       ),
 *  ),
 *
 * @OA\Post(
 *     path="api/notes",
 *     summary="Создание заметки",
 *     tags={"Notes"},
 *     @OA\MediaType(mediaType="application/json"),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="content", type="string", example="Some content"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="note", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="content", type="string", example="Some content"),
 *          ),
 *         )
 *      ),
 * ),
 *
 * @OA\Get(
 *      path="api/notes/{id}",
 *      summary="Вывод заметки",
 *      tags={"Notes"},
 *      @OA\MediaType(mediaType="application/json"),
 *
 *      @OA\RequestBody(),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="note", type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Some title"),
 *                  @OA\Property(property="content", type="string", example="Some content"),
 *           ),
 *          )
 *       ),
 *  ),
 *
 * @OA\Post(
 *      path="api/notes/{id}",
 *      summary="Обновление заметки",
 *      tags={"Notes"},
 *      @OA\MediaType(mediaType="application/json"),
 *
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Some title"),
 *                      @OA\Property(property="content", type="string", example="Some content"),
 *                      @OA\Property(property="_method", type="string", example="patch"),
 *                  )
 *              }
 *          )
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Some message"),
 *          )
 *       ),
 *  ),
 *
 * @OA\Delete(
 *       path="api/notes/{id}",
 *       summary="Удаление заметки",
 *       tags={"Notes"},
 *       @OA\MediaType(mediaType="application/json"),
 *
 *       @OA\RequestBody(),
 *
 *       @OA\Response(
 *           response=200,
 *           description="Ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="Some message"),
 *           )
 *        ),
 *   ),
 */
class NoteController extends Controller
{

}
