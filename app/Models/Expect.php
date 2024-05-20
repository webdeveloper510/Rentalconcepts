<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expect extends Model
{
    use HasFactory;
    protected $table='Expectations';

    
    protected $fillable= 
    [
        'deliveries',
        'Customers',
        'Collected',
        'pastdue',
        'netincome', 'created_at' ,'updated_at'
    ];
}