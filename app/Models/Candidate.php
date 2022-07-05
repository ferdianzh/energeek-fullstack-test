<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Candidate",
 *     description="Candidate model",
 *     @OA\Xml(
 *         name="Candidate"
 *     )
 * )
 */
class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
    ];

    /**
     * @OA\Property(
     *     title="Job ID",
     *     example=1
     * )
     *
     * @var integer
     */
    protected $job_id;

    /**
     * @OA\Property(
     *     title="Name",
     *     example="Joko"
     * )
     *
     * @var string
     */
    protected $name;

    /**
     * @OA\Property(
     *     title="Email",
     *     example="joko@gmail.com"
     * )
     *
     * @var string
     */
    protected $email;

    /**
     * @OA\Property(
     *     title="Phone",
     *     example="081234567890"
     * )
     *
     * @var string
     */
    protected $phone;
}
