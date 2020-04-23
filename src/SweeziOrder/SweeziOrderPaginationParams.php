<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\SweeziOrder;


use Sweezy\SDK\Common\PaginationParams;

class SweeziOrderPaginationParams extends PaginationParams
{
  private $orderId;
  /**
   * @var null
   */
  private $paymentId;

  /**
   * SweeziOrderPaginationParams constructor.
   * @param int $startIndex
   * @param int $maxResults
   * @param string $search
   * @param string $sort
   * @param string $order
   * @param $orderId
   * @param null $paymentId
   */
  public function __construct($startIndex = 0, $maxResults = 20, $search = "", $sort = "store.name", $order = "asc", $orderId = null, $paymentId = null)
  {
    $this->orderId = $orderId;
    parent::__construct($startIndex, $maxResults, $search, $sort, $order);
    $this->paymentId = $paymentId;
  }

  public function toArray()
  {
    $data = parent::toArray();
    if (isset($this->orderId))
      $data["_corder"] = $this->orderId;
    if (isset($this->paymentId))
      $data["_paymentId"] = $this->paymentId;
    return $data;
  }
}
