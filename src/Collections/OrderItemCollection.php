<?php

namespace Medidash\Phpsdk\Collections;

use Medidash\Phpsdk\Entities\OrderItem;

class OrderItemCollection extends AbstractCollection
{

	protected function getCollectionType(): string
	{
		return OrderItem::class;
	}

	public function toArray(): array
	{
		$data = [];

		/** @var OrderItem $item */
		foreach ($this as $item) {
			$data[] = $item->toArray();
		}

		return $data;
	}
	public function add(OrderItem $orderItem): void
	{
		$this->append($orderItem);
	}

	public function addAll(array $items): self
	{
		foreach ($items as $item)
		{
			$orderItem = OrderItem::fromArray($item);
			if(!$this->contains($orderItem))
			{
				$this->add($orderItem);
			}
		}
		return $this;
	}

	public function contains(OrderItem $orderItem): bool
	{
		/** @var OrderItem $item */
		foreach ($this as $item) {
			if ($item->getId() === $orderItem->getId()) {
				return true;
			}
		}

		return false;
	}
}