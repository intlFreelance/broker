<?php

namespace App\Repositories;

use App\Models\ContractPayment;
use InfyOm\Generator\Common\BaseRepository;

class ContractPaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contract_id',
        'start_date',
        'end_date',
        'amount',
        'frequency'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ContractPayment::class;
    }
}
