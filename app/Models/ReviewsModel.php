<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{
    protected $table = "reviews";


    protected $fillable = ["user_id", "product_id", "rating", "comment"];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
