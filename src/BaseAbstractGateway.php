<?php

namespace Omnipay\Yijipay;

use Omnipay\Common\AbstractGateway;

abstract class BaseAbstractGateway extends AbstractGateway
{


    public function setKey($key)
    {
        return $this->setParameter('key', $key);
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setPartnerId($partner_id)
    {
        return $this->setParameter('partner_id', $partner_id);
    }

    public function getPartnerId()
    {
        return $this->getParameter('partner_id');
    }


    public function setNotifyUrl($url)
    {
        $this->setParameter('notify_url', $url);
    }


    public function getNotifyUrl()
    {
        return $this->getParameter('notify_url');
    }

    //服务代码
    public function setService($service)
    {
        $this->setParameter('service', $service);
    }


    public function getService()
    {
        return $this->getParameter('service');
    }

    //加密方式
    public function setSignType($signType)
    {
        $this->setParameter('signType', $signType);
    }


    public function getSignType()
    {
        return $this->getParameter('signType');
    }

    //协议
    public function setProtocol($protocol)
    {
        $this->setParameter('protocol', $protocol);
    }


    public function getProtocol()
    {
        return $this->getParameter('protocol');
    }

    //版本
    public function setVersion($version)
    {
        $this->setParameter('version', $version);
    }


    public function getVersion()
    {
        return $this->getParameter('version');
    }

    //商品名称
    public function setGoodsName($goodsName)
    {
        $this->setParameter('goodsName', $goodsName);
    }


    public function getGoodsName()
    {
        return $this->getParameter('goodsName');
    }

    // memberType 会员类型

    public function setMemberType($memberType)
    {
        $this->setParameter('memberType', $memberType);
    }


    public function getMemberType()
    {
        return $this->getParameter('memberType');
    }

    //orderNo 请求单号


    public function setOrderNo($orderNo)
    {
        $this->setParameter('orderNo', $orderNo);
    }


    public function getOrderNo()
    {
        return $this->getParameter('orderNo');
    }

    //前端回调地址
    public function setReturnUrl($returnUrl)
    {
        $this->setParameter('returnUrl', $returnUrl);
    }


    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }

    //终端类型
    public function setUserTerminalType($userTerminalType)
    {
        $this->setParameter('userTerminalType', $userTerminalType);
    }


    public function getUserTerminalType()
    {
        return $this->getParameter('userTerminalType');
    }

    //交易号
    public function setTradeNo($tradeNo)
    {
        $this->setParameter('tradeNo', $tradeNo);
    }


    public function getTradeNo()
    {
        return $this->getParameter('tradeNo');
    }

    //外部订单号
    public function setMerchOrderNo($merchOrderNo)
    {
        $this->setParameter('merchOrderNo', $merchOrderNo);
    }


    public function getMerchOrderNo()
    {
        return $this->getParameter('merchOrderNo');
    }

    //交易金额
    public function setTradeAmount($tradeAmount)
    {
        $this->setParameter('tradeAmount', $tradeAmount);
    }


    public function getTradeAmount()
    {
        return $this->getParameter('tradeAmount');
    }

    //支付类型
    public function setPaymentType($paymentType)
    {
        $this->setParameter('paymentType', $paymentType);
    }


    public function getPaymentType()
    {
        return $this->getParameter('paymentType');
    }

    //open_id
    public function setOpenId($open_id)
    {
        $this->setParameter('open_id', $open_id);
    }


    public function getOpenId()
    {
        return $this->getParameter('opend_id');
    }

    //sellerUserId
    public function setSellerUserId($sellerUserId)
    {
        $this->setParameter('sellerUserId', $sellerUserId);
    }


    public function getSellerUserId()
    {
        return $this->getParameter('sellerUserId');
    }


    /**
     * @return mixed
     */
    public function getCertPath()
    {
        return $this->getParameter('cert_path');
    }


    /**
     * @param mixed $certPath
     */
    public function setCertPath($certPath)
    {
        $this->setParameter('cert_path', $certPath);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CreateOrderRequest
     */
    public function purchase($parameters = array())
    {
        $parameters['version'] = $this->getVersion();
        $parameters['signType'] = $this->getSignType();
        $parameters['paymentType'] = $this->getPaymentType();
        $parameters['memberType'] = $this->getMemberType();
        $parameters['protocol'] = $this->getProtocol();
        $parameters['userTerminalType'] = $this->getUserTerminalType();
        $parameters['service'] = $this->getService();
        return $this->createRequest('\Omnipay\Yijipay\Message\CreateOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CompletePurchaseRequest
     */
    public function completePurchase($parameters = array())
    {
        return $this->createRequest('\Omnipay\Yijipay\Message\CompletePurchaseRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\QueryOrderRequest
     */
    public function query($parameters = array())
    {
//        return $this->createRequest('\Omnipay\WechatPay\Message\QueryOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\CloseOrderRequest
     */
    public function close($parameters = array())
    {
//        return $this->createRequest('\Omnipay\WechatPay\Message\CloseOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\RefundOrderRequest
     */
    public function refund($parameters = array())
    {
//        return $this->createRequest('\Omnipay\WechatPay\Message\RefundOrderRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\QueryOrderRequest
     */
    public function queryRefund($parameters = array())
    {
//        return $this->createRequest('\Omnipay\WechatPay\Message\QueryRefundRequest', $parameters);
    }


    /**
     * @param array $parameters
     *
     * @return \Omnipay\WechatPay\Message\DownloadBillRequest
     */
    public function downloadBill($parameters = array())
    {
//        return $this->createRequest('\Omnipay\WechatPay\Message\DownloadBillRequest', $parameters);
    }
}
