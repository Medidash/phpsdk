<?php

namespace Medidash\Phpsdk\Services;
use Exception;
use Medidash\Phpsdk\Collections\SalesCollection;

class SalesService extends BaseService
{
	/**
	 * @param int|null $pharmacyId
	 * @param bool     $current
	 * @return float
	 */
	public function salesAmount(?int $pharmacyId = 0, bool $current = true): float
	{
		if($current) {
			$path = 'sales/amount/current';
		} else {
			$path = 'sales/amount';
		}
		if($pharmacyId) {
			$path .= '/'.$pharmacyId;
		}

		$results = $this->get($path);

		return (float) $results['sales'];
	}

	/**
	 * @param int|null $pharmacyId
	 * @param bool     $current
	 * @return SalesCollection
	 * @throws Exception
	 */
	public function sales(?int $pharmacyId = 0, bool $current = true): SalesCollection
	{
		$path = 'sales';
		if($pharmacyId != 0) {
			$path .= '/'.$pharmacyId;
		}
		$collection = (new SalesCollection())->addAll($this->get($path));
		if($current)
		{
			$collection = $collection->filter(
			 function($sale){
				$now = new \DateTime();
				return date('Y-m', strtotime($sale->getOrderDate())) == $now->format('Y-m');
			});
		}

		return $collection;
	}

	/**
	 * @param string $stype
	 * @return array
	 * @throws Exception
	 */
	public function stats(string $stype): array
	{
		if(!in_array($stype, ['product', 'pharmacy'])) {
			throw new Exception('Invalid stats type');
		}
		$path = 'sales/count/'.$stype;
		return $this->get($path);
	}
}