<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Data extends Model

{

    use HasFactory;

    protected $table = 'data';

    protected $fillable = [

        'location',

        'accountant',

        'customers',

        'deliveries',

        'pickups',

        'payoffs',

        'skips',

        'idealcust',

        'idealagr',

        'bideal',

        'eideal',
        'file',

        'updated_at',

        'created_at'

    ];
}
