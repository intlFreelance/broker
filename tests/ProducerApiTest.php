<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProducerApiTest extends TestCase
{
    use MakeProducerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProducer()
    {
        $producer = $this->fakeProducerData();
        $this->json('POST', '/api/v1/producers', $producer);

        $this->assertApiResponse($producer);
    }

    /**
     * @test
     */
    public function testReadProducer()
    {
        $producer = $this->makeProducer();
        $this->json('GET', '/api/v1/producers/'.$producer->id);

        $this->assertApiResponse($producer->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProducer()
    {
        $producer = $this->makeProducer();
        $editedProducer = $this->fakeProducerData();

        $this->json('PUT', '/api/v1/producers/'.$producer->id, $editedProducer);

        $this->assertApiResponse($editedProducer);
    }

    /**
     * @test
     */
    public function testDeleteProducer()
    {
        $producer = $this->makeProducer();
        $this->json('DELETE', '/api/v1/producers/'.$producer->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/producers/'.$producer->id);

        $this->assertResponseStatus(404);
    }
}
