<?php

namespace App\Services;

use App\Models\Job;

class JobService
{
  public function createJob($request)
  {
    return Job::create([
      'name' => $request->name,
    ]);
  }

  public function getJobs()
  {
    return Job::get();
  }
}