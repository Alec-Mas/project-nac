<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Job Model
    protected $fillable = [
        'company_name',
        'company_description',
        'company_address',
        'company_phone',
        'company_industry',
        'company_size',
        'abn_number',
    ];

    public function jobs()
    {
        return $this->belongsToMany('App\Job', 'company_job', 'company_id', 'job_id');
    }

}
