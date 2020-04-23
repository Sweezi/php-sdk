<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK\Order;


use Sweezy\SDK\BaseRequest;
use Sweezy\SDK\Common\PaginationParams;
use Sweezy\SDK\Entity\CreateCustomerOrder;
use Sweezy\SDK\GetAllPageInterface;
use Sweezy\SDK\GetOneInterface;

class OrderResource extends BaseRequest implements GetAllPageInterface, GetOneInterface
{

  /**
   * @var int
   */
  private $storeId;

  public function __construct(int $storeId)
  {
    parent::__construct();
    $this->storeId = $storeId;

  }

  protected function getURL()
  {
    return "stores/" . $this->storeId . "/orders";
  }

  protected function isAuthRequired()
  {
    return true;
  }

  function create(CreateCustomerOrder $createCustomerOrder)
  {
    $object = (object) array_filter((array) $createCustomerOrder);
    return $this->preformRequest("POST", "", [], json_encode($object));
  }

  function update($id, CreateCustomerOrder $createCustomerOrder)
  {
    $object = (object) array_filter((array) $createCustomerOrder);
    return $this->preformRequest("PUT", $id, [], json_encode($object, true));
  }

  function getAllPaginated(PaginationParams $paginationParams)
  {
    return $this->preformRequest("GET", "", $paginationParams->toArray());
  }

  function getOne($id, $params = [])
  {
    return $this->preformRequest("GET", $id);
  }
}
