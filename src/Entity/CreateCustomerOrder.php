<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */


namespace Sweezy\SDK\Entity;


class CreateCustomerOrder implements \JsonSerializable
{
  public $contactName;
  public $email;
  public $serviceId;
  public $receiverAddress;
  public $shipperAddress;
  public $items;

  /**
   * CreateCustomerOrder constructor.
   * @param $contactName string
   * @param $email string
   * @param $serviceId int
   * @param $receiverAddress Address
   * @param $shipperAddress Address
   * @param $items Item[]
   */
  public function __construct($contactName, $email, $serviceId, $receiverAddress, $shipperAddress, $items)
  {
    $this->contactName = $contactName;
    $this->email = $email;
    $this->serviceId = $serviceId;
    $this->receiverAddress = $receiverAddress;
    $this->shipperAddress = $shipperAddress;
    $this->items = $items;
  }

  /**
   * @inheritDoc
   */
  /**
   * @inheritDoc
   */
  public function jsonSerialize()
  {
    $array = [];
    foreach ($this as $key => $value) {
      if (isset($value)) {
        $array[$key] = $value;
      }
    }
    return $array;
  }
}
