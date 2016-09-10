<?php

use Faker\Factory as Faker;
use App\Models\Contract;
use App\Repositories\ContractRepository;

trait MakeContractTrait
{
    /**
     * Create fake instance of Contract and save it in database
     *
     * @param array $contractFields
     * @return Contract
     */
    public function makeContract($contractFields = [])
    {
        /** @var ContractRepository $contractRepo */
        $contractRepo = App::make(ContractRepository::class);
        $theme = $this->fakeContractData($contractFields);
        return $contractRepo->create($theme);
    }

    /**
     * Get fake instance of Contract
     *
     * @param array $contractFields
     * @return Contract
     */
    public function fakeContract($contractFields = [])
    {
        return new Contract($this->fakeContractData($contractFields));
    }

    /**
     * Get fake data of Contract
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContractData($contractFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'client_id' => $fake->randomDigitNotNull,
            'producer_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $contractFields);
    }
}
