<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/28 9:28
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay\Message;


use Omnipay\Yijipay\Helper;

class CompletePurchaseResponse extends BaseAbstractResponse
{

    public function isSuccessful()
    {
        return $this->isPaid();
    }


    public function isPaid()
    {
        $data = $this->getData();
        //验证签名
            if (isset($data['success']) && $data['success'] == 'true') {
                return $data;
            } else {
                return false;
            }


    }


    public function getRequestData()
    {
        return $this->request->getData();
    }

}