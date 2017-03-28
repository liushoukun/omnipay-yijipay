<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/27 15:32
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay\Message;


use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Yijipay\Helper;

class CreateOrderRequest extends BaseAbstractRequest
{

    protected $endpoint = 'https://api.yiji.com';

//'service' //服务代码
//'signType' //签名方式
//'protocol'//协议
//'version' //版本
//'goodsName' //商品名称
//'memberType'  //会员类型
//'orderNo' //请求订单号
//'returnUrl'  //前台通知地址
//'notifyUrl' // 异步通知地址
//'userTerminalType'  //终端类型
//'tradeNo'  ////交易号
//'merchOrderNo' //外部订单号
//'tradeAmount'//交易金额
//'paymentType' //支付类型
//'openid' //openid
//'sellerUserId' //卖家id
//'partnerId'=> //商户ID

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
        return $this->response = new CreateOrderResponse($this, $data);
    }


}