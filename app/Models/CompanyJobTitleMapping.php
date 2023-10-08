<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJobTitleMapping extends Model
{
    use HasFactory;
    protected $table = 'company_job_title_mapping';
    protected $hidden  = ['created_at', 'updated_at'];

    protected $fillable  = ['contact_id', 'title_id'];


    public function jobTitle() {
        return $this->hasMany(JobTitle::class, 'id', 'title_id');
    }

}

