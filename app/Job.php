<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'job_title',
        'job_description',
        'job_salary',
        'package_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsToMany('App\Company', 'company_job', 'job_id', 'company_id');
    }
}
