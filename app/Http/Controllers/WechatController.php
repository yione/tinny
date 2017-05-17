<?php

namespace App\Http\Controllers;

use App\Repositories\WechatRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use EasyWeChat\Foundation\Application;
use Flash;
use Response;


class WechatController extends InfyOmBaseController
{
    /** @var  WechatRepository */
    private $wechatRepository;

    public function __construct(WechatRepository $wechatRepo)
    {
        $this->wechatRepository = $wechatRepo;
    }
    public function index(){
        $config = [
            // ...
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/oauth_callback',
            ],
            // ..
        ];
        $app=new Application($config);
    }

}
