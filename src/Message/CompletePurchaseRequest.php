<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/28 9:20
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay\Message;


use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Yijipay\Helper;

class CompletePurchaseRequest extends BaseAbstractRequest
{

    public function setRequestParams($requestParams)
    {
        $this->setParameter('request_params', $requestParams);
    }


    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     *
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $data = $this->getData();
        $responseData = $data;
        if ($data['sign'] == Helper::sign($data, 'MD5', $this->getKey())) {
            return $this->response = new CompletePurchaseResponse($this, $responseData);

        } else {
            return $this->response = new CompletePurchaseResponse($this, []);
        }

    }


    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $data = $this->getRequestParams();
        return $data;
    }


    public function getRequestParams()
    {
        return $this->getParameter('request_params');
    }

}