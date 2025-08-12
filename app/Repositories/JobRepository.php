<?php

namespace App\Repositories;


use App\Models\DepartmentsModel;
use App\Models\OccupationsModel;

class JobRepository
{
    private $occupationsModel;

    public function __construct()
    {
        $this->occupationsModel = new OccupationsModel();
    }

    public function newOccupationAd($request)
    {
        $title = $request->title;
        $description = $request->description;
        $location = $request->location;
        $type = $request->type;
        $department = $request->department;
        $departmentId = DepartmentsModel::where("name", $department)->firstOrFail()->id;
        $salary = $request->salary;
        $deadline = $request->deadline;

        $this->occupationsModel::create([
            "title" => $title,
            "description" => $description,
            "location" => $location,
            "type" => $type,
            "department_id" => $departmentId,
            "salary" => $salary,
            "deadline" => $deadline,
        ]);
    }

    public function searchResults($request)
    {
        $keyword = $request->keywords;
        $type = $request->type;
        $departmentId = $request->department;


        if(isset($type) && isset($departmentId))
        {
            return $this->occupationsModel::where("title", "LIKE", "%$keyword%")->where("department_id", $departmentId)->where("type", $type)->get();
        }
        else if(isset($type))
        {
            return $this->occupationsModel::where("title", "LIKE", "%$keyword%")->where("type", $type)->get();
        }
        else if(isset($departmentId))
        {
            return $this->occupationsModel::where("title", "LIKE", "%$keyword%")->where("department_id", $departmentId)->get();
        }
        else
        {
            return $this->occupationsModel::where("title", "LIKE", "%$keyword%")->get();
        }

    }
}
