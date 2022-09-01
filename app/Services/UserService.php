<?php
namespace App\Services;

use App\Activity;
use App\Interfaces\BaseServiceInterface;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService implements BaseServiceInterface{
    
    public function getAll()
    {
        return User::all();
    }
    public function find(int $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            throw new Exception("User not found");
        }
        return $user;
    }

    public function create(array $data)
    {
        $user = new User();
        $user->fill($data);
        $user->save();
        return $this->find($user->id);
    }

    public function update(array $data, int $id)
    {

    }

    public function delete(int $id){

    }

    public function addUserToProject(array $data)
    {
        $user = User::find($data['user_id']);
        foreach ($data['projects'] as $project) {
            if (is_null($this->userHasProject($data['user_id'], $project['project_id']))) {
                $user->projects()->attach($project['project_id'], ['rol_id' => $project['rol_id']]);                
            } else {
                return response()->json([
                    'message' => 'User already assigned to Project'
                ], 422);             
            }
        }        
        return $this->userHasProject($data['user_id'], $project['project_id']);
    }

    public function addUserToActivity(array $data)
    {
        $user = User::find($data['user_id']);
        foreach ($data['activities'] as $activity) {
            $activityObject = Activity::find($activity['activity_id']);
            $user_rol = $this->verifyUserRol($user->id, $activityObject->project_id);
            if ($user_rol->id === 2) {
                if (is_null($this->userHasActivity($data['user_id'], $activity['activity_id']))) {
                    $user->activities()->attach($activity['activity_id'], ['rol_id' => $activity['rol_id']]);                
                } else {
                    return response()->json([
                        'message' => 'User already assigned to Activity'
                    ], 422);             
                }
            } else {
                return response()->json([
                    'message' => 'The user is not a participant of the project'
                ], 422);
            }
            if ($activity['rol_id'] === 3) {
                throw new Exception("This rol is not permitted for activities");                
            }
            
        }        
        return $this->userHasActivity($data['user_id'], $activity['activity_id']);
    }

    public function userHasProject(int $user_id, int $project_id)
    {
        $project_from_user = DB::table('users_projects')
            ->join('users', 'users.id', '=', 'users_projects.user_id')
            ->join('projects', 'projects.id', '=', 'users_projects.project_id')
            ->join('rols', 'rols.id', '=', 'users_projects.rol_id')
            ->select('users.name as userName', 'projects.name as projectName', 'rols.name as rol')
            ->where('users.id', '=', $user_id)
            ->where('projects.id', '=', $project_id)
            ->first();
        return $project_from_user;
    }

    public function userHasActivity(int $user_id, int $activity_id)
    {
        $activity_from_user = DB::table('users_activities')
            ->join('users', 'users.id', '=', 'users_activities.user_id')
            ->join('activities', 'activities.id', '=', 'users_activities.activity_id')
            ->join('rols', 'rols.id', '=', 'users_activities.rol_id')
            ->select('users.name as userName', 'activities.name as activityName', 'rols.name as rol')
            ->where('users.id', '=', $user_id)
            ->where('activities.id', '=', $activity_id)
            ->first();
        return $activity_from_user;
    }

    public function verifyUserRol(int $user_id, int $project_id)
    {
        $user_rol = DB::table('users_projects')
            ->join('users', 'users.id', '=', 'users_projects.user_id')
            ->join('projects', 'projects.id', '=', 'users_projects.project_id')
            ->join('rols', 'rols.id', '=', 'users_projects.rol_id')
            ->select('rols.id')
            ->where('users.id', '=', $user_id)
            ->where('projects.id', '=', $project_id)
            ->first();
        return $user_rol;
    }

    public function getActivitiesFromUserAsParticipant(int $id)
    {
        $user_activities = DB::table('users_activities')
            ->join('users', 'users.id', '=', 'users_activities.user_id')
            ->join('activities', 'activities.id', '=', 'users_activities.activity_id')
            ->select('activities.name as activityName')
            ->where('users.id', '=', $id)
            ->where('users_activities.rol_id', '=', 2)
            ->get();
        return $user_activities;
    }

    public function getIncidentFromUser(int $id)
    {
        $user_incidents = DB::table('users_activities')
            ->join('users', 'users.id', '=', 'users_activities.user_id')
            ->join('activities', 'activities.id', '=', 'users_activities.activity_id')
            ->join('incidents', 'incidents.activity_id', '=', 'activities.id')
            ->select('activities.name as activityName', 'incidents.name as incident')
            ->where('users.id', '=', $id)
            ->where('users_activities.rol_id', '=', 2)
            ->get();
        return $user_incidents;
    }
}