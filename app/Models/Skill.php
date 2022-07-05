<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Skill",
 *     description="Skill model",
 *     @OA\Xml(
 *         name="Skill"
 *     )
 * )
 */
class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @OA\Property(
     *     title="Name",
     *     example="PHP"
     * )
     *
     * @var string
     */
    protected $name;
}
