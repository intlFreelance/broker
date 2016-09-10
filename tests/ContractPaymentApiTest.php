<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractPaymentApiTest extends TestCase
{
    use MakeContractPaymentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContractPayment()
    {
        $contractPayment = $this->fakeContractPaymentData();
        $this->json('POST', '/api/v1/contractPayments', $contractPayment);

        $this->assertApiResponse($contractPayment);
    }

    /**
     * @test
     */
    public function testReadContractPayment()
    {
        $contractPayment = $this->makeContractPayment();
        $this->json('GET', '/api/v1/contractPayments/'.$contractPayment->id);

        $this->assertApiResponse($contractPayment->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContractPayment()
    {
        $contractPayment = $this->makeContractPayment();
        $editedContractPayment = $this->fakeContractPaymentData();

        $this->json('PUT', '/api/v1/contractPayments/'.$contractPayment->id, $editedContractPayment);

        $this->assertApiResponse($editedContractPayment);
    }

    /**
     * @test
     */
    public function testDeleteContractPayment()
    {
        $contractPayment = $this->makeContractPayment();
        $this->json('DELETE', '/api/v1/contractPayments/'.$contractPayment->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contractPayments/'.$contractPayment->id);

        $this->assertResponseStatus(404);
    }
}
