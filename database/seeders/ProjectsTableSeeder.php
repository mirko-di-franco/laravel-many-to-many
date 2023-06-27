<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $projects = config("repo_github");

      foreach ($projects as $project){
        $new_project = new Project();
        $new_project->type_id = Type::inRandomOrder()->first()->id;
        $new_project->title = $project["title"];
        $new_project->description = $project["description"];
        $new_project->slug = Project::generateSlug($new_project->title);
        $new_project->end_date = $project["end_date"];
        $new_project->save();
      }
    }
}
