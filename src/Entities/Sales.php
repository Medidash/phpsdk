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
	private string $orderNumber;
	private string $customer;
	private string $customerId;
	private string $deliveryNote;

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

	public function getOrderNumber(): string
	{
		return $this->orderNumber;
	}

	public function setOrderNumber(string $orderNumber): void
	{
		$this->orderNumber = $orderNumber;
	}

	public function getCustomer(): string
	{
		return $this->customer;
	}

	public function setCustomer(string $customer): void
	{
		$this->customer = $customer;
	}

	public function getCustomerId(): string
	{
		return $this->customerId;
	}

	public function setCustomerId(string $customerId): void
	{
		$this->customerId = $customerId;
	}

	public function getDeliveryNote(): string
	{
		return $this->deliveryNote;
	}

	public function setDeliveryNote(string $deliveryNote): void
	{
		$this->deliveryNote = $deliveryNote;
	}




	public function toArray(): array
	{
		return [
			'id'           => $this->getId(),
			'delivery_mode' => $this->getDeliveryMode(),
			'amount'       => $this->getAmount(),
			'order_date'   => $this->getOrderDate(),
			'pharmacy'     => $this->getPharmacy(),
			'status'       => $this->getStatus(),
			'order_number'       => $this->getOrderNumber(),
			'customer'       => $this->getCustomer(),
			'customer_id'       => $this->getCustomerId(),
			'delivery_note'       => $this->getDeliveryNote(),
		];
		
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
		$sales->setOrderNumber($data['order_number']);
		$sales->setCustomer($data['customer']);
		$sales->setCustomerId($data['customer_id']);
		$sales->setDeliveryNote($data['delivery_note']);
		return $sales;

	}




}