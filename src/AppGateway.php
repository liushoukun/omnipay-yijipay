<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/27 16:49
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay;


class AppGateway extends Gateway
{

    public function getService()
    {
        return 'fastPayMergeCreateTrade';
    }

    public function getProtocol()
    {
        return 'https';
    }

    //sellerUserId
    public function setSellerOrgName($sellerOrgName)
    {
        $this->setParameter('sellerOrgName', $sellerOrgName);
    }


    public function getSellerOrgName()
    {
        return $this->getParameter('sellerOrgName');
    }

    public function getCurrency()
    {
        return 'CNY';
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
        return $this->createRequest('\Omnipay\Yijipay\Message\AppCreateOrderRequest', $parameters);
    }


}