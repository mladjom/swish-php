<?php
/**
 * Created by PhpStorm.
 * User: Johan
 * Date: 2016-01-23
 * Time: 18:46
 */

namespace HelmutSchneider\Swish;


use Psr\Http\Message\ResponseInterface;

class Util
{

    /**
     * @param ResponseInterface $response
     * @return string
     */
    public static function getPaymentRequestIdFromResponse(ResponseInterface $response)
    {
        $header = $response->getHeaderLine('Location');
        preg_match('/\/paymentrequests\/(\w+)$/', $header, $matches);
        return $matches[1];
    }

    /**
     * @param ResponseInterface $response
     * @return string
     */
    public static function getRefundIdFromResponse(ResponseInterface $response)
    {
        $header = $response->getHeaderLine('Location');
        preg_match('/\/refunds\/(\w+)$/', $header, $matches);
        return $matches[1];
    }

    /**
     * @param ResponseInterface $response
     * @param bool $assoc decode into an associative array
     * @return array|\stdClass
     */
    public static function decodeResponse(ResponseInterface $response, $assoc = true)
    {
        $body = (string) $response->getBody();
        return json_decode($body, $assoc);
    }

}
