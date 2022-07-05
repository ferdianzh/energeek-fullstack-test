<?php

namespace App\Http\Controllers;

use App\Services\SkillService;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $skillService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }
    
    /**
     * @OA\Post(
     *      path="/api/skills",
     *      operationId="createSkill",
     *      tags={"Skills"},
     *      summary="Create new skill",
     *      description="Returns status message",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Skill"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  example="success"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="operation success"
     *              )
     *          )
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Failed operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  example="fail"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="operation failed"
     *              )
     *          )
     *      ),
     * )
     */
    public function store(Request $request)
    {
        try {
            $this->skillService->createSkill($request);
        } catch (Exception $e) {
            return response([
                'status' => 'fail',
                'message' => $e->getMessage(),
            ], 500);
        }

        return response([
            'status' => 'success',
            'message' => 'skill added',
        ]);
    }
}
