<?php

namespace App\Services;

use App\Models\Candidate;

class CandidateService
{
  public function createCandidate($request)
  {
    return Candidate::create([
      'job_id' => $request->job_id,
      'name' => $request->name,
      'phone' => $request->phone,
      'email' => $request->email,
    ])->id;
  }

  public function getCandidates()
  {
    return Candidate::get();
  }
}