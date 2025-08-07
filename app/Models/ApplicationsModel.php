<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationsModel extends Model
{
    protected $table = "applications";


    protected $fillable = ["job_id", "full_name", "email", "cv_path", "message"];
}
