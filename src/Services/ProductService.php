<?php

namespace Medidash\Phpsdk\Services;
use Medidash\Phpsdk\Collections\ProductCollection;

class ProductService extends BaseService
{
	/**
	 * @param int $pharmacyId
	 * @return ProductCollection
	 */
	public function allProducts(int $pharmacyId): ProductCollection
	{
		return (new ProductCollection())->addAll($this->get('products/pharmacy/'.$pharmacyId));
	}
}