<?php

use Faker\Factory as Faker;
use App\Models\Producer;
use App\Repositories\ProducerRepository;

trait MakeProducerTrait
{
    /**
     * Create fake instance of Producer and save it in database
     *
     * @param array $producerFields
     * @return Producer
     */
    public function makeProducer($producerFields = [])
    {
        /** @var ProducerRepository $producerRepo */
        $producerRepo = App::make(ProducerRepository::class);
        $theme = $this->fakeProducerData($producerFields);
        return $producerRepo->create($theme);
    }

    /**
     * Get fake instance of Producer
     *
     * @param array $producerFields
     * @return Producer
     */
    public function fakeProducer($producerFields = [])
    {
        return new Producer($this->fakeProducerData($producerFields));
    }

    /**
     * Get fake data of Producer
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProducerData($producerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->word,
            'last_name' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $producerFields);
    }
}
