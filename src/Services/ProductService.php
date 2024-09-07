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
		$pharmacies = $this->get('products/pharmacy/'.$pharmacyId);
		usort($pharmacies, function($a, $b) {
			return $a['name'] <=> $b['name'];
		});
		return (new ProductCollection())->addAll($pharmacies);
	}
}