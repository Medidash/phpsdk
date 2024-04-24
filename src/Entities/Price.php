<?php

namespace Medidash\Phpsdk\Entities;

class Price implements Traversable
{


	/**
	 * @param int $product_id
	 * @param int $pharmacy_id
	 * @param float $price
	 */
	public function __construct(private int $product_id, private int $pharmacy_id, private float $price)
	{
	}
	


	public function getProductId(): int
	{
		return $this->product_id;
	}

	public function getPharmacyId():int
	{
		return $this->pharmacy_id;
	}

	public function getPrice():float
	{
		return $this->price;
	}

	/**
	 * @param int $product_id
	 */
	public function setProductId(int $product_id): void
	{
		$this->product_id = $product_id;
	}

	/**
	 * @param int $pharmacy_id
	 */
	public function setPharmacyId(int $pharmacy_id): void
	{
		$this->pharmacy_id = $pharmacy_id;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice(float $price): void
	{
		$this->price = $price;
	}
	
	public function toArray(): array
	{
		return get_object_vars($this);
	}

}