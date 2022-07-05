<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::insert(['name' => 'Backend Developer']);
        Job::insert(['name' => 'Frontend Developer']);
        Job::insert(['name' => 'QA Enginer']);
        Job::insert(['name' => 'UX Designer']);
    }
}
