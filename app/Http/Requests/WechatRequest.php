<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WechatRequest extends FormRequest
{
    const BLOCK_SIZE=32;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    /*
     * 用SHA1算法生成安全签名
     *
     * @param string $timestamp 时间戳
     * @param string $nonce 随机字符串
     */
    public function getSHA1( $timestamp, $nonce)
    {
        $token=config('wechat')['token'];
        $array = array( $token, $timestamp, $nonce);
        sort($array, SORT_STRING);
        $str = implode($array);

        return sha1($str);

    }
    public function indexReq(){
        $input=$this->input();
        $field=['signature'=>'','timestamp'=>'','nonce'=>'','echostr'=>''];
        $request=array_replace_recursive($field,$input);
        $request['check']=$this->getSHA1($request['timestamp'],$request['nonce'])==$request['signature'];
        return $request;
    }

}
