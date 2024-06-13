<?php

namespace Medidash\Phpsdk\Entities;

class OrderItem implements EntityInterface
{
	private int $id;
	private string $productName;
	private int $quantity;
	private float $price;
	private int $orderId;
	private float $lineTotal;
	private int $productId;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function getProductName(): string
	{
		return $this->productName;
	}

	public function setProductName(string $productName): void
	{
		$this->productName = $productName;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	public function setQuantity(int $quantity): void
	{
		$this->quantity = $quantity;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function setPrice(float $price): void
	{
		$this->price = $price;
	}

	public function getOrderId(): int
	{
		return $this->orderId;
	}

	public function setOrderId(int $orderId): void
	{
		$this->orderId = $orderId;
	}

	public function getLineTotal(): float
	{
		return $this->lineTotal;
	}

	public function setLineTotal(float $lineTotal): void
	{
		$this->lineTotal = $lineTotal;
	}

	public function getProductId(): int
	{
		return $this->productId;
	}

	public function setProductId(int $productId): void
	{
		$this->productId = $productId;
	}


	public function toArray(): array
	{
		return [
			"id" => $this->getId(),
            "order_id" => $this->getOrderId(),
            "product_id" => $this->getProductId(),
            "quantity" => $this->getQuantity(),
            "price" => $this->getPrice(),
            "line_total" => $this->getLineTotal() ,
            "product_name" => $this->getProductName()
		];
	}
	public static function fromArray(array $data): self
	{
		$orderItem = new self();
		$orderItem->setId($data['id']);
		$orderItem->setOrderId($data['order_id']);
		$orderItem->setPrice($data['price']);
		$orderItem->setLineTotal($data['line_total']);
		$orderItem->setProductId($data['product_id']);
		$orderItem->setProductName($data['product_name']);
		$orderItem->setQuantity($data['quantity']);
		return $orderItem;
	}
}