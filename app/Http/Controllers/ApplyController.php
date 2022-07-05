<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyPostRequest;
use App\Services\CandidateService;
use App\Services\JobService;
use App\Services\SkillService;
use App\Services\SkillSetService;
use Exception;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    protected $jobService;
    protected $skillService;
    protected $skillSetService;
    protected $candidateService;

    public function __construct(
        JobService $jobService,
        SkillService $skillService,
        SkillSetService $skillSetService,
        CandidateService $candidateService,
    ) {
        $this->jobService = $jobService;
        $this->skillService = $skillService;
        $this->skillSetService = $skillSetService;
        $this->candidateService = $candidateService;
    }

    public function index()
    {
        $jobs = $this->jobService->getJobs();
        $skills = $this->skillService->getSkills();

        $data = [
            'jobs' => $jobs,
            'skills' => $skills,
        ];

        return view('apply', $data);
    }

    /**
     * @OA\Post(
     *      path="/api/apply/submit",
     *      operationId="postApply",
     *      tags={"Applies"},
     *      summary="Create new apply",
     *      description="Returns status message",
     *      @OA\Response(
     *          response=200,
     *          description="application added",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="status",
     *                  example="success"
     *              )
     *          )
     *      )
     * )
     */
    public function store(ApplyPostRequest $request)
    {
        try {
            $candidateId = $this->candidateService->createCandidate($request);
            $this->skillSetService->crateSkillSets($candidateId, $request->skill_sets);
        } catch (Exception $e) {
            return response([
                'status' => 'fail',
                'message' => $e->getMessage(),
            ], 500);
        }

        return response([
            'status' => 'success',
            'message' => 'application added',
        ], 200);
    }
}
