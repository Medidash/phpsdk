<?php

namespace Medidash\Phpsdk\Collections;
use Medidash\Phpsdk\Entities\Pharmacy;

class PharmacyCollection extends AbstractCollection
{
	/**
	 * @return string
	 */
	protected function getCollectionType(): string
	{
		return Pharmacy::class;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		$data = [];

		/** @var Pharmacy $item */
		foreach ($this as $item) {
			$data[] = $item->toArray();
		}

		return $data;
	}

	/**
	 * Filters the collection using a callback function.
	 *
	 * @param callable $function This is a callable function that must return true or false for an item to be
	 *  included in the resulting PharmacyCollection
	 * @return PharmacyCollection
	 */
	public function filter(callable $function): self
	{
		$collection = new self();

		/** @var Pharmacy $item */
		foreach ($this as $item) {
			if (!$function($item)) {
				continue;
			}

			$collection->append($item);
		}

		return $collection;
	}

	/**
	 * Finds a pharmacy in the collection by its ID.
	 *
	 * @param int $id
	 * @return Pharmacy|null
	 */
	public function findById(int $id): ?Pharmacy
	{
		/** @var Pharmacy $item */
		foreach ($this as $item) {
			if ($item->getId() === $id) {
				return $item;
			}
		}

		return null;
	}

	public function add(Pharmacy $pharmacy): void
	{
		$this->append($pharmacy);
	}

	public function addAll(array $items): self
	{
		foreach ($items as $item)
		{
			$pharmacy = Pharmacy::fromArray($item);
			if(!$this->contains($pharmacy))
			{
				$this->add($pharmacy);
			}
		}
		return $this;
	}

	public function contains(Pharmacy $pharmacy): bool
	{
		/** @var Pharmacy $item */
		foreach ($this as $item) {
			if ($item->getId() === $pharmacy->getId()) {
				return true;
			}
		}

		return false;
	}

}