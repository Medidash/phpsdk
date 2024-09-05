<?php

namespace Medidash\Phpsdk\Entities;

class Product implements EntityInterface
{
	private int $id;
	private string $name;
	private float $price;
	private float $min_price;
	private string $image;
	private string $short_description;
	private string $description;
	private string $status;
	private float $pharmacy_price;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function setPrice(float $price): void
	{
		$this->price = $price;
	}

	public function getMinPrice(): float
	{
		return $this->min_price;
	}

	public function setMinPrice(float $min_price): void
	{
		$this->min_price = $min_price;
	}

	public function getImage(): string
	{
		return $this->image;
	}

	public function setImage(string $image): void
	{
		$this->image = $image;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	public function getShortDescription(): string
	{
		return $this->short_description;
	}

	public function setShortDescription(string $short_description): void
	{
		$this->short_description = $short_description;
	}

	public function getStatus(): string
	{
		return $this->status;
	}

	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	public function getPharmacyPrice(): float
	{
		return $this->pharmacy_price;
	}

	public function setPharmacyPrice(float $pharmacy_price): void
	{
		$this->pharmacy_price = $pharmacy_price;
	}


	public function toArray(): array
	{
		return get_object_vars($this);
	}

	public static function fromArray(array $data): self
	{
		$product = new self();
		$product->setId($data['id']);
		$product->setName($data['name']);
		$product->setPrice((float) $data['price']);
		$product->setMinPrice((float) $data['min_price']);
		$product->setImage($data['image']);
		$product->setDescription($data['description']);
		$product->setShortDescription($data['short_description']);
		$product->setStatus($data['status']);
		$product->setPharmacyPrice($data['pharmacy_price']);
		return $product;
	}



}