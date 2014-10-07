<?php
/**
 * Basket is the class for working with basket and products.
 *
 * @author Aleksandr Kushnir <a1eksandr87@mail.ru>
 */
class Basket extends AbstractTable
{
	/**
	 * @var array object Product class
	 */
	protected $products = array();

	/**
	 * @param Product $product
	 * @return object $this
	 */
	public function addProduct(Product $product)
	{
		$this->products[] = $product;

		return $this;
	}

	/**
	 * @param integer $index
	 * @return Product
	 * @throws Exception if index not exists
	 */
	public function getProduct($index)
	{
		if(!isset($this->products[$index]))
		{
			throw new Exception("Product not exists");
		}

		return $this->products[$index];
	}

	/**
	 * @return array object Product class
	 */
	public function getProducts()
	{
		return $this->products;
	}

	/**
	 * @param integer $index
	 * @return object $this
	 * @throws Exception if index not exists
	 */
	public function removeProduct($index)
	{
		if(!isset($this->products[$index]))
		{
			throw new Exception("Product not exists");
		}

		unset($this->products[$index]);

		return $this;
	}

	/**
	 * @return float summ price products in basket
	 */
	public function getSummPrice()
	{
		$price = 0.00;

		foreach($this->products as $product)
		{
			$price += $product->getPayPrice();
		}

		return round($price,2);
	}

	/**
	 * @return integer count products in basket
	 */
	public function getCountProduct()
	{
		return count($this->products);
	}
}