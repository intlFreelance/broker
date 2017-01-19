<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    public $table = 'providers';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];
}
