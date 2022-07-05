<?php

namespace App\Services;

use App\Models\Skill;

class SkillService
{
  public function createSkill($request)
  {
    return Skill::create([
      'name' => $request->name,
    ]);
  }

  public function getSkills()
  {
    return Skill::get();
  }
}