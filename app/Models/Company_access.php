<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_access extends Model
{
    use HasFactory;
    protected $table='company_access';
    protected $fillable = ['director_id','company'];
}