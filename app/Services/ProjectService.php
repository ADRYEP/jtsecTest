<?php
namespace App\Services;

use App\Interfaces\BaseServiceInterface;
use App\Project;
use Illuminate\Support\Facades\DB;
use Exception;

class ProjectService implements BaseServiceInterface{
    
    public function getAll()
    {
        return Project::all();
    }

    public function find(int $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            throw new Exception("Project not found");            
        }
        return $project;
    }

    public function create(array $data)
    {
        $project = new Project();
        $project->fill($data);
        $project->save();
        return $this->find($project->id);
    }

    public function update(array $data, int $id)
    {

    }

    public function delete(int $id){

    }

    public function getParticipantsFromProject(int $id)
    {
        $project_participants = DB::table('users_projects')        
            ->join('users', 'users.id', '=', 'users_projects.user_id')
            ->join('projects', 'projects.id', '=', 'users_projects.project_id')
            ->select('users.name')
            ->where('projects.id', '=', $id)
            ->get();
        return $project_participants;
    }
    
    public function getActivitiesFromProject(int $id)
    {
        return $project_activities = Project::find($id)->activities()->get();
    }
}