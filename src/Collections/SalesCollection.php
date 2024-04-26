<?php

namespace Medidash\Phpsdk\Collections;

use Medidash\Phpsdk\Entities\Sales;

class SalesCollection extends AbstractCollection
{
	/**
	 * @return string
	 */
	protected function getCollectionType(): string
	{
		return Sales::class;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		$data = [];

		/** @var Sales $item */
		foreach ($this as $item) {
			$data[] = $item->toArray();
		}

		return $data;
	}

	/**
	 * Filters the collection using a callback function.
	 *
	 * @param callable $function This is a callable function that must return true or false for an item to be
	 *  included in the resulting ProductCollection
	 * @return SalesCollection
	 */
	public function filter(callable $function): self
	{
		$collection = new self();

		/** @var Sales $item */
		foreach ($this as $item) {
			if (!$function($item)) {
				continue;
			}

			$collection->append($item);
		}

		return $collection;
	}



	/**
	 * Returns the first product in the collection.
	 *
	 * @return Sales|null
	 */
	public function first(): ?Sales
	{
		/** @var Sales $item */
		foreach ($this as $item) {
			return $item;
		}

		return null;
	}



	public function addSales(Sales $sales)
	{
		$this->append($sales);
	}

	public function salesExists(int $id): bool
	{
		return $this->findById($id) !== null;
	}

	public function addAll(array $items): self
	{
		foreach ($items as $item) {
			$sale = Sales::fromArray($item);
			if(!$this->salesExists($sale->getId())){
				$this->addSales($sale);
			}
		}
		return $this;

	}
	public function findById(int $id): ?Sales
	{
		/** @var Sales $item */
		foreach ($this as $item) {
			if ($item->getId() === $id) {
				return $item;
			}
		}

		return null;
	}

	public function slice(int $offset, int $length = null): self
	{
		$collection = new self();
		$items = \array_slice($this->getArrayCopy(), $offset, $length);
		$collection->addAll($items);
		return $collection;
	}

}
