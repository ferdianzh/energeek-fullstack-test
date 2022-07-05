<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Job",
 *     description="Job model",
 *     @OA\Xml(
 *         name="Job"
 *     )
 * )
 */
class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @OA\Property(
     *     title="Name",
     *     example="Backend Developer"
     * )
     *
     * @var string
     */
    protected $name;
}
