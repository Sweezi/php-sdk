<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */

namespace Sweezy\SDK;

use PHPUnit\Framework\TestCase;
use Sweezy\SDK\Common\PaginationParams;
use Sweezy\SDK\Entity\Address;
use Sweezy\SDK\Entity\CreateCustomerOrder;
use Sweezy\SDK\Entity\Item;
use Sweezy\SDK\Order\OrderResource;
use Sweezy\SDK\Plan\PlanResource;
use Sweezy\SDK\Store\StoreResource;
use Sweezy\SDK\SweeziOrder\SweeziOrderPaginationParams;
use Sweezy\SDK\SweeziOrder\SweeziOrderResource;

class OrderTest extends TestCase
{


  public function testOrder()
  {

    SDK::setInstance("https://my.sweezi.pt/api", "1234", "mysecret");

    $resource = new StoreResource();
    $stores = $resource->getAll();
    $this->assertNotEmpty($stores);

    $resource = new PlanResource();
    $services = $resource->getServices($stores[0]->plan->id);
    $this->assertNotEmpty($services);

    $resource = new OrderResource($stores[0]->id);
    $shippingAddress = $stores[0]->address;
    $receiverAddress = new Address("Lisboa", "1", "1000-100", "Lisboa", "Rua xpto 2");

    $items = [];
    $items[] = new Item(4, 10, 16, "SKU234", 10, 5);

    $orderDTO = new CreateCustomerOrder("Afonso Alves", "test@mail.com", $services[0]->id, $receiverAddress, $shippingAddress, $items);

    $order = $resource->create($orderDTO);

    $orders = $resource->getAllPaginated(new PaginationParams());
    $this->assertIsArray($orders);
    $this->assertNotEmpty($orders);

    $order = $resource->getOne($orders[0]->id);
    $this->assertNotNull($order);

    $resource->update($orders[0]->id, $orderDTO);

    $resource = new SweeziOrderResource($stores[0]->id);
    $sweeziOrders = $resource->getAllPaginated(new SweeziOrderPaginationParams());
    $this->assertIsArray($sweeziOrders);
  }
}
