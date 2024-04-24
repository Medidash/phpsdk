<?php

namespace Medidash\Phpsdk\Collections;

use Medidash\Phpsdk\Entities\Price;

class PriceCollection extends AbstractCollection
{
	/**
	 * @return string
	 */
	protected function getCollectionType(): string
	{
		return Price::class;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		$data = [];

		/** @var Price $item */
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
	 * @return PriceCollection
	 */
	public function filter(callable $function): self
	{
		$collection = new self();

		/** @var Price $item */
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
	 * @return Price|null
	 */
	public function first(): ?Price
	{
		/** @var Price $item */
		foreach ($this as $item) {
			return $item;
		}

		return null;
	}



	public function addPrice(Price $price)
	{
		$this->append($price);
	}

}
