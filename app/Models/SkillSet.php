<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'skill_id',
    ];

    public $timestamps = false;

    protected $candidate_id;
    protected $skill_id;
}
