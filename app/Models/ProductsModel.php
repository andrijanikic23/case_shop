<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";



    protected $fillable = ["name", "description", "price", "image_url", "category_id", "stock"];
}
