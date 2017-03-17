<?php

use App\Models\Index;
use App\Repositories\IndexRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexRepositoryTest extends TestCase
{
    use MakeIndexTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IndexRepository
     */
    protected $indexRepo;

    public function setUp()
    {
        parent::setUp();
        $this->indexRepo = App::make(IndexRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIndex()
    {
        $index = $this->fakeIndexData();
        $createdIndex = $this->indexRepo->create($index);
        $createdIndex = $createdIndex->toArray();
        $this->assertArrayHasKey('id', $createdIndex);
        $this->assertNotNull($createdIndex['id'], 'Created Index must have id specified');
        $this->assertNotNull(Index::find($createdIndex['id']), 'Index with given id must be in DB');
        $this->assertModelData($index, $createdIndex);
    }

    /**
     * @test read
     */
    public function testReadIndex()
    {
        $index = $this->makeIndex();
        $dbIndex = $this->indexRepo->find($index->id);
        $dbIndex = $dbIndex->toArray();
        $this->assertModelData($index->toArray(), $dbIndex);
    }

    /**
     * @test update
     */
    public function testUpdateIndex()
    {
        $index = $this->makeIndex();
        $fakeIndex = $this->fakeIndexData();
        $updatedIndex = $this->indexRepo->update($fakeIndex, $index->id);
        $this->assertModelData($fakeIndex, $updatedIndex->toArray());
        $dbIndex = $this->indexRepo->find($index->id);
        $this->assertModelData($fakeIndex, $dbIndex->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIndex()
    {
        $index = $this->makeIndex();
        $resp = $this->indexRepo->delete($index->id);
        $this->assertTrue($resp);
        $this->assertNull(Index::find($index->id), 'Index should not exist in DB');
    }
}
