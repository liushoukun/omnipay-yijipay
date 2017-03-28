<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/28 10:58
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay\Message;


use Omnipay\Common\Message\ResponseInterface;

class AppCreateOrderRequest extends BaseAbstractRequest
{

    protected $endpoint = 'https://api.yiji.com/gateway';

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {


        $data = array(
            'service' => $this->getService(),
            'signType' => $this->getSignType(),
            'protocol' => $this->getProtocol(),
            'version' => $this->getVersion(),
            'goodsName' => $this->getGoodsName(),
            'memberType' => $this->getMemberType(),
            'orderNo' => $this->getOrderNo(),
            'returnUrl' => $this->getReturnUrl(),
            'notifyUrl' => $this->getNotifyUrl(),
            'userTerminalType' => $this->getUserTerminalType(),
            'tradeNo' => $this->getTradeNo(),
            'merchOrderNo' => $this->getMerchOrderNo(),
            'tradeAmount' => $this->getTradeAmount(),
            'paymentType' => $this->getPaymentType(),
            'openid' => $this->getOpenId(),
//            'sellerUserId' => $this->getSellerUserId(),
            'sellerUserId' => $this->getSellerUserId(),
            'partnerId' => $this->getPartnerId(),
        );
        $tradeInfo['merchOrderNo'] = $this->getMerchOrderNo();
        $tradeInfo['sellerUserId'] = $this->getSellerUserId();
        $tradeInfo['goodsName'] = $this->getGoodsName();
        $tradeInfo['sellerOrgName'] = $this->getGoodsName();
        $tradeInfo['tradeAmount'] = $this->getTradeAmount();
        $tradeInfo['currency'] = 'CNY';
        $tradeInfo['autoCloseDuration'] = '';

        $data['tradeInfo'] = '[' . json_encode($tradeInfo) . ']';

        ksort($data);
        //组装待签名字符串
        $signSrc = "";
        foreach ($data as $k => $v) {
            if (empty($v) || $v === "")
                unset($data[$k]);
            else
                $signSrc .= $k . '=' . $v . '&';
        }
        $signSrc = trim($signSrc, '&') . $this->getKey();
        //打印待签名字符串
        //签名
        $data['sign'] = md5($signSrc);
        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $request = $this->httpClient->createRequest('POST', $this->endpoint, [], $data);
        $response = $request->send();
        if ($response->getStatusCode() == 200) {
            return $this->response = new AppCreateOrderResponse($this, $response->json());
        } else {
            return $this->response = new AppCreateOrderResponse($this, []);
        }


    }


}