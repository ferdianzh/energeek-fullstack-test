<?php

namespace App\Services;

use App\Models\SkillSet;

class SkillSetService
{
  public function crateSkillSets($id, $sets)
  {
    foreach ($sets as $set) {
      SkillSet::create([
        'candidate_id' => $id,
        'skill_id' => $set,
      ]);
    }
  }

  public function getSkillSet()
  {
    return SkillSet::get();
  }
}