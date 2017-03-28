<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/27 15:39
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay\Message;


use Omnipay\Common\Message\RedirectResponseInterface;

class CreateOrderResponse extends BaseAbstractResponse implements RedirectResponseInterface
{

    public function getCodeUrl()
    {
        return $this->request->getEndpoint() . '?' . http_build_query($this->getRedirectData());
    }

    /**
     * @var LegacyExpressPurchaseRequest
     */
    protected $request;


    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return true;
    }


    public function isRedirect()
    {
        return true;
    }


    public function getRedirectUrl()
    {

        return $this->request->getEndpoint() . '?' . http_build_query($this->getRedirectData());
    }


    /**
     * Gets the redirect form data array, if the redirect method is POST.
     */
    public function getRedirectData()
    {
        return $this->data;
    }


    /**
     * Get the required redirect method (either GET or POST).
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }


    public function getAppOrderData()
    {
        return $this->data;
    }


}