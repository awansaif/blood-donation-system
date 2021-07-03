<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationOffice extends Model
{
    use HasFactory;


    protected $fillable = [
        'organization_id',
        'address',
        'head',
        'mobile',
        'city',
        'email',
    ];
}
