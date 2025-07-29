<?php

namespace App\Repositories;


use App\Models\ReviewsModel;

class ReviewsRepository
{
    private $reviewsModel;

    public function __construct()
    {
        $this->reviewsModel = new ReviewsModel();
    }

    public function newReview($request)
    {
        $this->reviewsModel::create([
            "user_id" => $request->userId,
            "product_id" => $request->productId,
            "rating" => $request->rating,
            "comment" => $request->comment
        ]);
    }


}
