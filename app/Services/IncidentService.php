<?php
namespace App\Services;

use App\Interfaces\BaseServiceInterface;
use App\Incident;
use Exception;

class IncidentService implements BaseServiceInterface{
    
    public function getAll()
    {
        return Incident::all();
    }

    public function find(int $id)
    {
        $incident = Incident::find($id);
        if (is_null($incident)) {
            throw new Exception("Incident not found");
        }
        return $incident;
    }

    public function create(array $data)
    {
        $incident = new Incident;
        $incident->fill($data);
        $incident->save();
        return $this->find($incident->id);
    }

    public function update(array $data, int $id)
    {

    }

    public function delete(int $id){

    }
}