<?php

namespace App\Repositories;

use App\Models\Index;
use InfyOm\Generator\Common\BaseRepository;

class IndexRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Index::class;
    }
}
