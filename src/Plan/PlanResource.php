<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\Plan;


use Sweezy\SDK\BaseRequest;
use Sweezy\SDK\GetAllInterface;
use Sweezy\SDK\GetOneInterface;

class PlanResource extends BaseRequest implements GetAllInterface
{

  protected function getURL()
  {
    return "plans";
  }

  protected function isAuthRequired()
  {
    return true;
  }

  /**
   * @param array $params
   * @return array
   */
  public function getAll($params = [])
  {
    return $this->preformRequest("GET");
  }

  /**
   * @param $id
   * @param array $params
   * @return array
   */
  function getServices($id, $params = [])
  {
    return $this->preformRequest("GET", $id."/services");
  }
}
