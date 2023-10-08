<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable  = ['name', 'email'];


    public function jobTitleMapping(){
        return $this->hasMany(CompanyJobTitleMapping::class, 'contact_id', 'id')->with('jobTitle');
    }

}
