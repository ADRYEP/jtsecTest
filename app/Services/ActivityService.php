<?php
namespace App\Services;

use App\Interfaces\BaseServiceInterface;
use App\Activity;
use Exception;

class ActivityService implements BaseServiceInterface{
    
    public function getAll()
    {
        return Activity::all();
    }

    public function find(int $id)
    {
        $activity = Activity::find($id);
        if (is_null($activity)) {
            throw new Exception("Activity not found");
        }
        return $activity;
    }

    public function create(array $data)
    {
        $activity = new Activity;
        $activity->fill($data);
        $activity->save();
        return $this->find($activity->id);
    }

    public function update(array $data, int $id)
    {

    }

    public function delete(int $id){

    }
}