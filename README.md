# SDK MySweezi

This package allows integration of clients applications with the MySweezi API.

## Install

```
composer install sweezi/sdk
```

## Getting started

```
use Sweezy\SDK\SDK;

SDK::setInstance($url, $clientId, $secret);
```

The `clientId` and `secret` are the credentials used to authenticated the application using a token registered.

## Examples

- Request all stores

```php
$resource = new StoreResource();
$stores = $resource->getAll();
```

- Creating an order

```php
use Sweezy\SDK\Order\OrderResource;
use Sweezy\SDK\Entity\Address;
use Sweezy\SDK\Entity\CreateCustomerOrder;
use Sweezy\SDK\Entity\Item;

$planResource = new PlanResource();
$services = $planResource->getServices($store->plan->id);

$orderResource = new OrderResource($storeId);
$shippingAddress = $stores[0]->address;
$receiverAddress = new Address("Valdecaballeros", "210", "06689", "Badajoz", "Av. Madrid");

$items = [];
$items[] = new Item(4, 10, 16, "SKU234", 10, 5);

$orderDTO = new CreateCustomerOrder("Afonso Alves", "test@mail.com", $services[0]->id, $receiverAddress, $shippingAddress, $items);

$order = $orderResource->create($orderDTO);
```

## All methods

### Stores

- Get all user stores

  ```php
  $resource = new StoreResource();
  $stores = $resource->getAll();
  ```

* Get a store address

  `$store->address`

### Orders

- Request all store orders

  ```php
  $orderResource = new OrderResource($storeId);
  $orders = $orderResource->getAllPaginated(new PaginationParams());
  ```

  The values of `search`, `sort`, `order`, `startIndex` and `maxResults` are opcional.

- Request a store order

  `$order = $orderResource->getOne($orderId);`

- Create an order
  ```php
  $orderDTO = new CreateCustomerOrder($contactName, $email, $serviceId, $receiverAddress, $shippingAddress, $items);
  $order = $resource->create($orderDTO);
  ```

* Update an order

  ```php
  $orderDTO = new CreateCustomerOrder($contactName, $email, $serviceId, $receiverAddress, $shippingAddress, $items);
  $order = $resource->update($order->id, $orderDTO);
  ```

* GET Order tracking

  ```php
  $tracking = $resource->getTracking($order->id);
  ```

### Others

- Get all countries

  ```php
  $resource = new CountryResource();
  $countries = $resource->getAll();
  ```

- Get all plans

  ```php
  $resource = new PlanResource();
  $plans = $resource->getAll();
  ```

- Get all services of a plan

  `$services = $resource->getServices($plan->id);`

* Get tracking information

  ```php
  $resource = new TrackingResource();
  $trackingData = $resource->getTracking($trackingNumber);
  ```

* Get Sweezi Spots

  ```php
  $resource = new SweeziSpotResource();
  $spots = $resource->getSweeziSpots($countryCode, $postalCode);
  ```
