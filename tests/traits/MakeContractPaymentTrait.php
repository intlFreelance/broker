<?php

use Faker\Factory as Faker;
use App\Models\ContractPayment;
use App\Repositories\ContractPaymentRepository;

trait MakeContractPaymentTrait
{
    /**
     * Create fake instance of ContractPayment and save it in database
     *
     * @param array $contractPaymentFields
     * @return ContractPayment
     */
    public function makeContractPayment($contractPaymentFields = [])
    {
        /** @var ContractPaymentRepository $contractPaymentRepo */
        $contractPaymentRepo = App::make(ContractPaymentRepository::class);
        $theme = $this->fakeContractPaymentData($contractPaymentFields);
        return $contractPaymentRepo->create($theme);
    }

    /**
     * Get fake instance of ContractPayment
     *
     * @param array $contractPaymentFields
     * @return ContractPayment
     */
    public function fakeContractPayment($contractPaymentFields = [])
    {
        return new ContractPayment($this->fakeContractPaymentData($contractPaymentFields));
    }

    /**
     * Get fake data of ContractPayment
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContractPaymentData($contractPaymentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'contract_id' => $fake->randomDigitNotNull,
            'start_date' => $fake->word,
            'end_date' => $fake->word,
            'amount' => $fake->randomDigitNotNull,
            'frequency' => $fake->word
        ], $contractPaymentFields);
    }
}
