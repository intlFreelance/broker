<?php

namespace App\Repositories;

use App\Models\Producer;
use InfyOm\Generator\Common\BaseRepository;

class ProducerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Producer::class;
    }
}
