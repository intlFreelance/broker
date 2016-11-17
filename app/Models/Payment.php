<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'contract_id',
        'client_id',
        'producer_id',
        'payment_date',
        'amount'
    ];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function producer()
    {
        return $this->belongsTo('App\Models\Producer');
    }
}
