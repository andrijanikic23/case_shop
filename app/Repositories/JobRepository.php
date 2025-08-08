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
}
