<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $table = 'job_titles';
    protected $hidden = ['created_at', 'updated_at'];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

}
