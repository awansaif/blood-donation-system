<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organization extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_number',
        'logo',
        'address',
        'email',
        'mobile',
        'password',
        'status'
    ];


    public function offices()
    {
        return $this->hasMany(OrganizationOffice::class);
    }
}
