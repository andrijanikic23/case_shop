<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobMoreInfoRequest;
use App\Http\Requests\JobRequest;
use App\Http\Requests\SearchJobRequest;
use App\Models\OccupationsModel;
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

    public function careers()
    {
        $careers = OccupationsModel::all();

        return view("jobOpenings", compact("careers"));
    }

    public function search(SearchJobRequest $request)
    {
        $careers = $this->jobRepo->searchResults($request);

        return view("jobOpenings" , compact("careers"));
    }

    public function moreInfo(JobMoreInfoRequest $request)
    {
        $careerId = $request->careerId;
        $career = OccupationsModel::whereId($careerId)->first();

        return view("jobInfo", compact("career"));
    }

}
