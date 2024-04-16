<?php

namespace App;

class Cart
{
  public $items; // Array สำหรับเก็บข้อมูลสินค้าในตะกร้าทั้งหมด
  public $totalQuantity; // จำนวนสินค้าในตะกร้า
  public $totalPrice; // จำนวนราคารวม

  // ราคาสินค้า * จำนวนสินค้า
  // = รองเท้า 1,500 * 2 = 3,000
  // ทีวี 5,000 * 2 = 10,000

  // จำนวนราคารวมราคาสินค้า + จำนวนสินค้าที่เราซื้อ
  // $totalPrice = 13,000
  // $totalQuantity = 4

  public function __construct($prevCart)
  {
    if ($prevCart != null) {
      // ตะกร้าเก่า
      $this->items = $prevCart->items;
      $this->totalQuantity = $prevCart->totalQuantity;
      $this->totalPrice = $prevCart->totalPrice;
    } else {
      // ตะกร้าใหม่
      $this->items = [];
      $this->totalQuantity = 0;
      $this->totalPrice = 0;
    }
  }

  public function addItem($id, $product)
  {
    $price = (int)($product->price);

    if (array_key_exists($id, $this->items)) {
      $productToAdd = $this->items[$id];
      $productToAdd['quantity']++;
      $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
    } else {
      $productToAdd = ['quantity' => 1, 'totalSinglePrice' => $price, 'data' => $product];
    }
    /*
      items[
              11 => [
                      'quantity' => 2,
                      'totalSinglePrice' => 1,800,
                      'data' => { products }
                    ],
              15 => [
                      'quantity' => 1,
                      'totalSinglePrice' => 1,500,
                      'data' => { products }
                    ]
          ];
    */

    $this->items[$id] = $productToAdd;
    $this->totalQuantity++;
    $this->totalPrice = $this->totalPrice + $price;
  }

  public function addQuantity($id, $product, $amount) // $amount คือ $quantity ที่รับมาจากหน้า showProductdetails.blade.php
  {
    if ($amount > 0) {
      $price = (int)($product->price);

      if (array_key_exists($id, $this->items)) {
        $productToAdd = $this->items[$id];
        $productToAdd['quantity'] += $amount; // เพิ่มจำนวนรายการในสินค้านั้นๆ ขึ้นทีละ 1
        $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
      } else {
        $productToAdd = ['quantity' => $amount, 'totalSinglePrice' => $price * $amount, 'data' => $product];
      }
    }

    $this->items[$id] = $productToAdd;
    $this->totalQuantity += $amount;
    $this->totalPrice = $this->totalPrice + $price;
  }

  public function updatePriceQuantity()
  {
    $totalPrice = 0;
    $totalQuantity = 0;

    foreach ($this->items as $item) {
      $totalQuantity = $totalQuantity + $item['quantity'];
      $totalPrice = $totalPrice + $item['totalSinglePrice'];
    }

    $this->totalQuantity = $totalQuantity;
    $this->totalPrice = $totalPrice;
  }
}
