<?php

namespace App\Repositories;

use App\Models\Wechat;
use InfyOm\Generator\Common\BaseRepository;

class WechatRepository extends BaseRepository
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
        return Wechat::class;
    }
}
