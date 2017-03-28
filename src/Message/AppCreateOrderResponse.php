<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/28 11:47
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay\Message;


class AppCreateOrderResponse extends BaseAbstractResponse
{
    protected $request;


    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        $data = $this->getData();
        if (isset($data['success']) && $data['success'] == 'true') {
            return true;
        } else {
            return false;
        }
    }

    public function getAppOrderData()
    {
        $data = $this->getData();
        $responseData['orderNo'] = $data['orderNo'];
        $responseData['partnerId'] = $data['partnerId'];
        $responseData['tradeNo'] = $data['creatTradeResult'][0]['tradeNo'];
        $responseData['merchOrderNo'] = $data['creatTradeResult'][0]['merchOrderNo'];
        $responseData['tradeAmount'] = $data['creatTradeResult'][0]['tradeAmount'];
        return $responseData;
    }


}