<?php
/**
 *
 * @Author VOID SOFTWARE <info@void.pt>
 * @Copyright 2019-2020 VOID SOFTWARE, S.A.
 *
 */


namespace Sweezy\SDK\Entity;


use JsonSerializable;

class Item implements JsonSerializable
{
  public $description; //Date
  public $height; //int
  public $length; //int
  public $quantity; //int
  public $sku; //String
  public $weight; //int
  public $width; //int
  public $id = null;

  /**
   * Item constructor.
   * @param $height
   * @param $length
   * @param $quantity
   * @param $sku
   * @param $weight
   * @param $width
   * @param string $description
   * @param null $id
   */
  public function __construct($height, $length, $quantity, $sku, $weight, $width, $description = "", $id = null)
  {
    $this->description = $description;
    $this->height = $height;
    $this->length = $length;
    $this->quantity = $quantity;
    $this->sku = $sku;
    $this->weight = $weight;
    $this->width = $width;
    $this->id = $id;
  }


  /**
   * @inheritDoc
   */
  public function jsonSerialize()
  {
    $array = [];
    foreach ($this as $key => $value) {
      if(isset($value)){
        $array[$key] = $value;
      }
    }
    return $array;
  }
}
