<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationsRequest;
use App\Repositories\ApplicationsRepository;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{

    private $applicationsRepo;

    public function __construct()
    {
        $this->applicationsRepo = new ApplicationsRepository();
    }

    public function applied(ApplicationsRequest $request)
    {
        $this->applicationsRepo->enterApplication($request);

        return redirect()->back()->with("success", "Your application has been submitted");
    }
}
