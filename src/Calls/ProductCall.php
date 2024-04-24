<?php

namespace Medidash\Phpsdk\Calls;
use Medidash\Phpsdk\Collections\ProductCollection;

class ProductCall extends Base
{
	/**
	 * @param int $pharmacyId
	 * @return ProductCollection
	 */
	public function allProducts(int $pharmacyId): ProductCollection
	{
		$this->path = 'products/pharmacy/'.$pharmacyId;
		$results = $this->execute('GET');
		$collection = new ProductCollection();
		$collection->addAll($results);
		return $collection;
	}

}