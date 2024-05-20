<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Permission extends Model

{

    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [
        'userid',

        'locationid',

        'allowed',

        'updated_at',

        'created_at'

    ];
    // public function user() {
    //     return $this->belongsTo('App\Models\NXT', "uid");
    // }
    public function locations(){
        return $this->belongsTo("App\Models\Location",'locationid');
    }

}

