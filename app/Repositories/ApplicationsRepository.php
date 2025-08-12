<?php

namespace App\Repositories;

use App\Models\ApplicationsModel;

class ApplicationsRepository
{
    private $applicationsModel;

    public function __construct()
    {
        $this->applicationsModel = new ApplicationsModel();
    }

    public function enterApplication($request)
    {
        $jobId = $request->jobId;
        $fullName = $request->fullName;
        $email = $request->email;
        $cvPath = $request->cvPath;
        $message = $request->message;

        $this->applicationsModel::create([
            "job_id" => $jobId,
            "full_name" => $fullName,
            "email" => $email,
            "cv_path" => $cvPath,
            "message" => $message,
        ]);
    }
}
