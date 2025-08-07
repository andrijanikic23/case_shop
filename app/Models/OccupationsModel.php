<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OccupationsModel extends Model
{
    protected $table = "occupations";


    protected $fillable = ["title", "description", "location", "type", "department_id", "salary", "deadline"];
}
