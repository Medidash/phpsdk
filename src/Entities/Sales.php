<?php

namespace Medidash\Phpsdk\Entities;

class Sales implements EntityInterface
{

	private int    $id;
	private string $deliveryMode;
	private float  $amount;
	private string $orderDate;
	private string $pharmacy;
	private string $status;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function getDeliveryMode(): string
	{
		return $this->deliveryMode;
	}

	public function setDeliveryMode(string $deliveryMode): void
	{
		$this->deliveryMode = $deliveryMode;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function setAmount(float $amount): void
	{
		$this->amount = $amount;
	}

	public function getOrderDate(): string
	{
		return $this->orderDate;
	}

	public function setOrderDate(string $orderDate): void
	{
		$this->orderDate = $orderDate;
	}

	public function getPharmacy(): string
	{
		return $this->pharmacy;
	}

	public function setPharmacy(string $pharmacy): void
	{
		$this->pharmacy = $pharmacy;
	}

	public function getStatus(): string
	{
		return $this->status;
	}

	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	public function toArray(): array
	{
		return get_object_vars($this);
	}

	public static function fromArray(array $data): self
	{
		$sales = new self();
		$sales->setId($data['id']);
		$sales->setDeliveryMode($data['delivery_mode']);
		$sales->setAmount($data['amount']);
		$sales->setOrderDate($data['order_date']);
		$sales->setPharmacy($data['pharmacy']);
		$sales->setStatus($data['status']);
		return $sales;

	}




}