<?php

namespace Medidash\Phpsdk\Entities;

class Price implements Traversable
{


	/**
	 * @param int $product_id
	 * @param int $pharmacy_id
	 * @param int $price
	 */
	public function __construct(private int $product_id, private int $pharmacy_id, private int $price)
	{
	}
	

	public function getId()
	{
		return $this->id;
	}

	public function getProductId()
	{
		return $this->product_id;
	}

	public function getPharmacyId()
	{
		return $this->pharmacy_id;
	}

	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param mixed $product_id
	 */
	public function setProductId($product_id): void
	{
		$this->product_id = $product_id;
	}

	/**
	 * @param mixed $pharmacy_id
	 */
	public function setPharmacyId($pharmacy_id): void
	{
		$this->pharmacy_id = $pharmacy_id;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice($price): void
	{
		$this->price = $price;
	}
	
	public function toArray(): array
	{
		return get_object_vars($this);
	}

}