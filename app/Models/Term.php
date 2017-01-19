<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use SoftDeletes;

    public $table = 'terms';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'contract_id',
        'provider_id',
        'service_id',
        'start_date',
        'end_date',
        'amount',
        'frequency',
        'producer1_id',
        'producer1_split',
        'producer2_id',
        'producer2_split',
    ];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract');
    }
}
