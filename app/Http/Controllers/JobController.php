<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Exception;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    /**
     * @OA\Post(
     *      path="/api/jobs",
     *      operationId="createJob",
     *      tags={"Jobs"},
     *      summary="Create new job",
     *      description="Returns status message",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Job"),
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
            $this->jobService->createJob($request);
        } catch (Exception $e) {
            return response([
                'status' => 'fail',
                'message' => $e->getMessage(),
            ], 500);
        }

        return response([
            'status' => 'success',
            'message' => 'job added',
        ], 200);
    }
}
