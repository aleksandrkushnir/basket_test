<?php
ini_set('display_errors',1);
error_reporting(1);

include_once('table.php');
include_once('sale.php');
include_once('product.php');
include_once('basket.php');

$product = new Product();

echo "<b>Product</b>:<br>";
echo 'Name:' . $product->getName() . '<br>';
echo 'Price:' . $product->getPrice() . '<br>';
echo 'Sale:' . $product->getSale() . '<br>';
echo 'SaleType:' . $product->getSaleType() . '<br>';
echo 'PayPrice:' . $product->getPayPrice() . '<br>';
$product->setName('cup')->setPrice(450.145);
echo "<b>Set name and price</b>:<br>";
echo 'Name:' . $product->getName() . '<br>';
echo 'Price:' . $product->getPrice() . '<br>';
echo 'Sale:' . $product->getSale() . '<br>';
echo 'SaleType:' . $product->getSaleType() . '<br>';
echo 'PayPrice:' . $product->getPayPrice() . '<br>';
$product->setSale(10)->setSaleType('percent');
echo "<b>Set sale</b>:<br>";
echo 'Name:' . $product->getName() . '<br>';
echo 'Price:' . $product->getPrice() . '<br>';
echo 'Sale:' . $product->getSale() . '<br>';
echo 'SaleType:' . $product->getSaleType() . '<br>';
echo 'PayPrice:' . $product->getPayPrice() . '<br>';
$basket = new Basket();
echo "<b>Basket</b>:<br>";
echo 'count:' . $basket->getCountProduct() . '<br>';
echo 'summPrice:' . $basket->getSummPrice() . '<br>';
$basket->addProduct($product);
$basket->addProduct($product);
echo "<b>add product</b>:<br>";
echo 'count:' . $basket->getCountProduct() . '<br>';
echo 'summPrice:' . $basket->getSummPrice() . '<br>';
$basket->removeProduct(0);
echo "<b>remove product</b>:<br>";
echo 'count:' . $basket->getCountProduct() . '<br>';
echo 'summPrice:' . $basket->getSummPrice() . '<br>';
$p = $basket->getProduct(1);
echo "<b>get product</b>:<br>";
echo 'Name:' . $p->getName() . '<br>';
echo 'Price:' . $p->getPrice() . '<br>';
echo 'Sale:' . $p->getSale() . '<br>';
echo 'SaleType:' . $product->getSaleType() . '<br>';
echo 'PayPrice:' . $p->getPayPrice() . '<br>';
print_r($basket->getProducts());