<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexApiTest extends TestCase
{
    use MakeIndexTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIndex()
    {
        $index = $this->fakeIndexData();
        $this->json('POST', '/api/v1/index', $index);

        $this->assertApiResponse($index);
    }

    /**
     * @test
     */
    public function testReadIndex()
    {
        $index = $this->makeIndex();
        $this->json('GET', '/api/v1/index/'.$index->id);

        $this->assertApiResponse($index->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIndex()
    {
        $index = $this->makeIndex();
        $editedIndex = $this->fakeIndexData();

        $this->json('PUT', '/api/v1/index/'.$index->id, $editedIndex);

        $this->assertApiResponse($editedIndex);
    }

    /**
     * @test
     */
    public function testDeleteIndex()
    {
        $index = $this->makeIndex();
        $this->json('DELETE', '/api/v1/index/'.$index->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/index/'.$index->id);

        $this->assertResponseStatus(404);
    }
}
