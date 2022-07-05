<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::insert(['name' => 'Javascript']);
        Skill::insert(['name' => 'Laravel']);
        Skill::insert(['name' => 'Node']);
        Skill::insert(['name' => 'PHP']);
        Skill::insert(['name' => 'Graphic Design']);
        Skill::insert(['name' => 'UI/UX']);
        Skill::insert(['name' => 'QA']);
    }
}
