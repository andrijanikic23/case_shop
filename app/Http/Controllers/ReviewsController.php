<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsRequest;
use App\Models\ReviewsModel;
use App\Repositories\ReviewsRepository;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    private $reviewsRepo;

    public function __construct()
    {
        $this->reviewsRepo = new ReviewsRepository();
    }


    public function rate(ReviewsRequest $request)
    {
        $this->reviewsRepo->newReview($request);

        return redirect()->back();
    }

    public function reviews($productId)
    {
        $reviews = ReviewsModel::where("product_id", $productId)->get();

        return $reviews;
    }

}
