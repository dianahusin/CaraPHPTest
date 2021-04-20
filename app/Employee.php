<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'company',
        'email',
        'phone'
    ];

    public function company_name()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }

}
