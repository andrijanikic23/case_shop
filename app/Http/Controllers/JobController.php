<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Repositories\JobRepository;
use Illuminate\Http\Request;

class JobController extends Controller
{

    private $jobRepo;


    public function __construct()
    {
        $this->jobRepo = new JobRepository();
    }


    public function post(JobRequest $request)
    {
        $this->jobRepo->newOccupationAd($request);

        return redirect()->back();
    }
}
