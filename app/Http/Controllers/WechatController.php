<?php

namespace App\Http\Controllers;

use App\Http\Requests\WechatRequest;
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

    public function index(WechatRequest $request)
    {
        $request=$request->indexReq();
        if(!$request['check']){
            exit("验证失败");
        }
        exit($request['echostr']);
    }


}
