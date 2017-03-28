<?php
// +----------------------------------------------------------------------
// | When work is a pleasure, life is a joy!
// +----------------------------------------------------------------------
// | Company: YG | User: ShouKun Liu  |  Email:24147287@qq.com  | Time:2017/3/27 16:25
// +----------------------------------------------------------------------
// | TITLE: this to do?
// +----------------------------------------------------------------------


namespace Omnipay\Yijipay;


class Helper
{


    public static function sign($data, $signType = 'MD5', $privateKey)
    {
        if (isset($data['sign'])) unset($data['sign']);
        ksort($data);
        //组装待签名字符串
        $signSrc = "";
        foreach ($data as $k => $v) {
            if (empty($v) || $v === "")
                unset($data[$k]);
            else
                $signSrc .= $k . '=' . $v . '&';
        }
        $signSrc = trim($signSrc, '&') . $privateKey;
        return md5($signSrc);


    }

}