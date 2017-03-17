<?php

use Faker\Factory as Faker;
use App\Models\Index;
use App\Repositories\IndexRepository;

trait MakeIndexTrait
{
    /**
     * Create fake instance of Index and save it in database
     *
     * @param array $indexFields
     * @return Index
     */
    public function makeIndex($indexFields = [])
    {
        /** @var IndexRepository $indexRepo */
        $indexRepo = App::make(IndexRepository::class);
        $theme = $this->fakeIndexData($indexFields);
        return $indexRepo->create($theme);
    }

    /**
     * Get fake instance of Index
     *
     * @param array $indexFields
     * @return Index
     */
    public function fakeIndex($indexFields = [])
    {
        return new Index($this->fakeIndexData($indexFields));
    }

    /**
     * Get fake data of Index
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIndexData($indexFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $indexFields);
    }
}
