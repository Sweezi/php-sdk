<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

abstract class BaseRequest
{
  /**
   * @var SDK
   */
  protected $sdk;

  protected $requireAuth = true;


  /**
   * BaseRequest constructor.
   */
  public function __construct()
  {
    $this->sdk = SDK::getInstance();
  }

  protected abstract function getURL();

  protected abstract function isAuthRequired();


  /**
   * @param $method
   * @param string $uri
   * @param array $params
   * @param null $body
   * @return array
   */
  public function preformRequest($method, $uri = "", $params = [], $body = null)
  {
    $uriToUse = $this->getURL();
    if (!empty($uri))
      $uriToUse = $uriToUse . "/" . $uri;
    $data = ['body' => $body, 'query' => $params];
    if ($this->isAuthRequired()) {
      $data = array_merge($data, ["headers" => ["Authorization" => 'Bearer ' . $this->sdk->getToken(), "content-type" => "application/json"]]);
    }
    $response = $this->sdk->getClient()->request($method, $uriToUse, $data);

    return json_decode($response->getBody());
  }
}
