<?php

namespace Medidash\Phpsdk\Services;
use Exception;
use Medidash\Phpsdk\Collections\SalesCollection;

class SalesService extends BaseService
{
	/**
	 * @param int|null $pharmacyId
	 * @param          $current
	 * @return float
	 */
	public function salesAmount(?int $pharmacyId = 0, $current = true): float
	{
		if($current) {
			$this->path = 'sales/amount/current';
		} else {
			$this->path = 'sales/amount';
		}
		if($pharmacyId == 0) {
			$this->path .= '/'.$pharmacyId;
		}

		$results = $this->execute('GET');

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
		if($pharmacyId == 0) {
			$path .= '/'.$pharmacyId;
		}
		$collection = (new SalesCollection())->addAll($this->get($path));
		if($current) {
			$collection = $collection->filter(
			 function($sale){
				$now = new \DateTime();
				$saleDate = new \DateTime($sale->date);
				return $saleDate->format('Y-m') == $now->format('Y-m');
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