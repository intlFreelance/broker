<?php

use App\Models\ContractPayment;
use App\Repositories\ContractPaymentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractPaymentRepositoryTest extends TestCase
{
    use MakeContractPaymentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContractPaymentRepository
     */
    protected $contractPaymentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contractPaymentRepo = App::make(ContractPaymentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContractPayment()
    {
        $contractPayment = $this->fakeContractPaymentData();
        $createdContractPayment = $this->contractPaymentRepo->create($contractPayment);
        $createdContractPayment = $createdContractPayment->toArray();
        $this->assertArrayHasKey('id', $createdContractPayment);
        $this->assertNotNull($createdContractPayment['id'], 'Created ContractPayment must have id specified');
        $this->assertNotNull(ContractPayment::find($createdContractPayment['id']), 'ContractPayment with given id must be in DB');
        $this->assertModelData($contractPayment, $createdContractPayment);
    }

    /**
     * @test read
     */
    public function testReadContractPayment()
    {
        $contractPayment = $this->makeContractPayment();
        $dbContractPayment = $this->contractPaymentRepo->find($contractPayment->id);
        $dbContractPayment = $dbContractPayment->toArray();
        $this->assertModelData($contractPayment->toArray(), $dbContractPayment);
    }

    /**
     * @test update
     */
    public function testUpdateContractPayment()
    {
        $contractPayment = $this->makeContractPayment();
        $fakeContractPayment = $this->fakeContractPaymentData();
        $updatedContractPayment = $this->contractPaymentRepo->update($fakeContractPayment, $contractPayment->id);
        $this->assertModelData($fakeContractPayment, $updatedContractPayment->toArray());
        $dbContractPayment = $this->contractPaymentRepo->find($contractPayment->id);
        $this->assertModelData($fakeContractPayment, $dbContractPayment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContractPayment()
    {
        $contractPayment = $this->makeContractPayment();
        $resp = $this->contractPaymentRepo->delete($contractPayment->id);
        $this->assertTrue($resp);
        $this->assertNull(ContractPayment::find($contractPayment->id), 'ContractPayment should not exist in DB');
    }
}
