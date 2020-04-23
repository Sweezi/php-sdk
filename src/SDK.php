<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Lcobucci\JWT\Parser;
use Monolog\Logger;

class SDK
{

  /**
   * @var SDK
   */
  private static $instance;

  private $token;
  /**
   * @var Client
   */
  private $client;
  /**
   * @var bool
   */
  private $appLogin;
  /**
   * @var bool
   */
  private $log;

  public static function getInstance()
  {
    return self::$instance;
  }

  /**
   * @param string $url
   * @param string $clientId
   * @param string $secret
   * @param bool $appLogin
   * @param bool $log
   */
  public static function setInstance(string $url, string $clientId, string $secret, $appLogin = true, $log = false)
  {
    if (self::$instance == null) {
      self::$instance = new SDK($url, $clientId, $secret, $appLogin, $log);
    }
  }


  /**
   * @return string
   * @throws RequestException
   */
  public function login()
  {
    $url = $this->url . "/authentication/login";
    $credentials = [
      "email" => $this->clientId,
      "password" => $this->secret
    ];

    $response = $this->client->request('POST', $url, ['json' => $credentials]);
    return $response->getHeader('Authorization')[0];
  }

  /**
   * @return string
   * @throws RequestException
   */
  public function systemLogin()
  {
    $url = $this->url . "/authentication/request-token";
    $credentials = [
      "clientId" => $this->clientId,
      "secret" => $this->secret
    ];

    $response = $this->client->request('POST', $url, ['json' => $credentials]);
    $obj = json_decode($response->getBody()->getContents());
    return $obj->token;
  }

  public function getToken()
  {

    if (!$this->token || !$this->tokenIsValid()) {
      if ($this->appLogin) {
        $this->token = $this->systemLogin();
      } else
        $this->token = $this->login();
    }
    return $this->token;
  }

  public function tokenIsValid()
  {
    $token = (new Parser())->parse((string)$this->token);
    $exp = $token->getClaim("exp");
    return $exp > time();
  }

  public $url = "";

  public $clientId = "";

  public $secret = "";

  /**
   * SweeziConnection constructor.
   * @param string $url
   * @param string $clientId
   * @param string $secret
   */
  public function __construct(string $url, string $clientId, string $secret, $appLogin = false, $log = false)
  {
    $this->url = $url;
    $this->clientId = $clientId;
    $this->secret = $secret;
    $this->appLogin = $appLogin;
    $this->log = $log;


    $data = [
      'base_uri' => $url,
      'timeout' => 5.0
    ];
    if ($log) {
      $stack = HandlerStack::create();
      $stack->push(
        Middleware::log(
          new Logger("http-request"),
          new MessageFormatter(MessageFormatter::DEBUG)
        )
      );
      $data['handler'] = $stack;
    }

    $this->client = new Client($data);

  }

  /**
   * @return Client
   */
  public function getClient()
  {
    return $this->client;
  }
}
