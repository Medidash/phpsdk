<?php

namespace Medidash\Phpsdk\Collections;

use Medidash\Phpsdk\Entities\Product;

class ProductCollection extends AbstractCollection
{
	/**
	 * @return string
	 */
	protected function getCollectionType(): string
	{
		return Product::class;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		$data = [];

		/** @var Product $item */
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
	 * @return ProductCollection
	 */
	public function filter(callable $function): self
	{
		$collection = new self();

		/** @var Product $item */
		foreach ($this as $item) {
			if (!$function($item)) {
				continue;
			}

			$collection->append($item);
		}

		return $collection;
	}

	/**
	 * Finds a product in the collection by its ID.
	 *
	 * @param int $id
	 * @return Product|null
	 */
	public function findById(int $id): ?Product
	{
		/** @var Product $item */
		foreach ($this as $item) {
			if ($item->getId() === $id) {
				return $item;
			}
		}

		return null;
	}

	/**
	 * Returns the first product in the collection.
	 *
	 * @return Product|null
	 */
	public function first(): ?Product
	{
		/** @var Product $item */
		foreach ($this as $item) {
			return $item;
		}

		return null;
	}

	/**
	 * Checks if a product with the given ID exists in the collection.
	 *
	 * @param int $id
	 * @return bool
	 */
	public function productExists(int $id): bool
	{
		return $this->findById($id) !== null;
	}

	public function addProduct(Product $product)
	{
		$this->append($product);
	}

	public function addAll(array $items): self
	{
		foreach ($items as $item) {
			$product = Product::fromArray($item);
			if(!$this->productExists($product->getId())){
				$this->addProduct($product);
			}
		}
		return $this;
	}
}
