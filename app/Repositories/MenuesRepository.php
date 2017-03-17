<?php

namespace App\Repositories;

use App\Models\Menues;
use InfyOm\Generator\Common\BaseRepository;

class MenuesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Menues::class;
    }
}
