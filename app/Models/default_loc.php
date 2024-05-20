<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class default_loc extends Model
{
    use HasFactory;
    protected $table = 'default_loc';
    protected $fillable = [
        'id',
        'userid',
        'location',
        'updated_at',
        'created_at'
    ];
}

