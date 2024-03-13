<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use App\Controller\ProjectController;

//Models
use App\Models\Project;
use App\Models\Type;;
use App\Models\Technology;

//Helpers
use Illuminate\Support\Str;

//Helpers
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });
        
        for ($i=0; $i < 10 ; $i++) { 
            //$project = new Project();
            //$project->tile = fake()->sentence();
            //$project->content = fake()->paragraph();
            //$project->save();

            $tile = fake()->sentence();
            $slug = Str::slug($tile);

            $project = Project::create([
                'title' => $tile,
                'slug' => $slug,
                'content' => fake()->paragraph(),
                'type_id' => Type::inRandomOrder()->first()->id,
            ]);     
        }
    }
}
