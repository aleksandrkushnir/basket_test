<?php
/**
 * Product is the class for working with products.
 *
 * @author Aleksandr Kushnir <a1eksandr87@mail.ru>
 */
class Product extends AbstractTable
{
	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var float
	 */
	protected $price = 0.00;

	/**
	 * @var float
	 */
	protected $sale = 0.00;

	/**
	 * @var string
	 */
	protected $saleType = '';

	/**
	 * @param string $name
	 * @return object $this.
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string Product name.
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param float $price
	 * @return object $this
	 */
	public function setPrice($price)
	{
		$this->price = (float)$price;

		return $this;
	}

	/**
	 * @return float Product price.
	 */
	public function getPrice()
	{
		return round($this->price,2);
	}

	/**
	 * @return float Product price taking into account sale.
	 */
	public function getPayPrice()
	{
		return round(SaleFactory::type($this->saleType)->getPayPrice($this),2);
	}

	/**
	 * @param float $sale
	 * @return object $this.
	 * @throws Exception if sale more than price
	 */
	public function setSale($sale)
	{
		if(!$this->saleType && (float)$sale > $this->price)
		{
			throw new Exception("Sale can't be more than price");
		}

		$this->sale = (float)$sale;

		return $this;
	}

	/**
	 * @return float Product sale.
	 */
	public function getSale()
	{
		return round($this->sale,2);
	}

	/**
	 * @param string $type
	 * @return object $this.
	 */
	public function setSaleType($type)
	{
		$this->saleType = $type;

		return $this;
	}

	/**
	 * @return float Product saleType.
	 */
	public function getSaleType()
	{
		return $this->saleType;
	}
}