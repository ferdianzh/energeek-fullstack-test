<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    protected $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }
    
    /**
     * @OA\Get(
     *      path="/api/candidates",
     *      operationId="getCandidates",
     *      tags={"Candidates"},
     *      summary="Get list of candidates",
     *      description="Returns list of candidates",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Candidate")
     *      )
     * )
     */
    public function show()
    {
        return response([
            'data' => $this->candidateService->getCandidates(),
        ]);
    }
}
