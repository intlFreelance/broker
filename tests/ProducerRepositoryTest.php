<?php

use App\Models\Producer;
use App\Repositories\ProducerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProducerRepositoryTest extends TestCase
{
    use MakeProducerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProducerRepository
     */
    protected $producerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->producerRepo = App::make(ProducerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProducer()
    {
        $producer = $this->fakeProducerData();
        $createdProducer = $this->producerRepo->create($producer);
        $createdProducer = $createdProducer->toArray();
        $this->assertArrayHasKey('id', $createdProducer);
        $this->assertNotNull($createdProducer['id'], 'Created Producer must have id specified');
        $this->assertNotNull(Producer::find($createdProducer['id']), 'Producer with given id must be in DB');
        $this->assertModelData($producer, $createdProducer);
    }

    /**
     * @test read
     */
    public function testReadProducer()
    {
        $producer = $this->makeProducer();
        $dbProducer = $this->producerRepo->find($producer->id);
        $dbProducer = $dbProducer->toArray();
        $this->assertModelData($producer->toArray(), $dbProducer);
    }

    /**
     * @test update
     */
    public function testUpdateProducer()
    {
        $producer = $this->makeProducer();
        $fakeProducer = $this->fakeProducerData();
        $updatedProducer = $this->producerRepo->update($fakeProducer, $producer->id);
        $this->assertModelData($fakeProducer, $updatedProducer->toArray());
        $dbProducer = $this->producerRepo->find($producer->id);
        $this->assertModelData($fakeProducer, $dbProducer->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProducer()
    {
        $producer = $this->makeProducer();
        $resp = $this->producerRepo->delete($producer->id);
        $this->assertTrue($resp);
        $this->assertNull(Producer::find($producer->id), 'Producer should not exist in DB');
    }
}
