<?php
/**
 * SaleFactory is the class used Singlton and Factoty method pattent.
 *
 * @author Aleksandr Kushnir <a1eksandr87@mail.ru>
 */
class SaleFactory
{
	static private $instance = array();

	private function __construct(){}

	private function __clone(){}

	static public function type($type = '')
	{
		$className = $type. 'Sale';

		if(!class_exists($className))
		{
			throw new Exception("Class doesn't exists");
		}

		if(!isset(self::$instance[$className]))
		{
			self::$instance[$className] = new $className();
		}


		return self::$instance[$className];
	}
}

/**
 * SaleInterface is the interface for Sale classes.
 *
 * @author Aleksandr Kushnir <a1eksandr87@mail.ru>
 */
interface SaleInterface
{
	/**
	 * @param Product $product
	 */
	public function getPayPrice(Product $product);
}

/**
 * Sale is the class for default sale.
 *
 * @author Aleksandr Kushnir <a1eksandr87@mail.ru>
 */
class Sale implements SaleInterface
{

	/**
	 * @param Product $product
	 * @return float pay price
	 */
	public function getPayPrice(Product $product)
	{
		return $product->getPrice() - $product->getSale();
	}
}

/**
 * Sale is the class for percent sale.
 *
 * @author Aleksandr Kushnir <a1eksandr87@mail.ru>
 */
class percentSale implements SaleInterface
{
	/**
	 * @param Product $product
	 * @return float pay price
	 */
	public function getPayPrice(Product $product)
	{
		return $product->getPrice() - ($product->getPrice() * $product->getSale() / 100);
	}
}