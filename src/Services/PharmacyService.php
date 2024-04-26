<?php

namespace Medidash\Phpsdk\Services;
use Medidash\Phpsdk\Collections\PharmacyCollection;

class PharmacyService extends BaseService
{
	/**
	 * @return PharmacyCollection
	 */
	public function getInactive(): PharmacyCollection
	{
		$response = $this->get('pharmacy');
		$collection =  (new PharmacyCollection())->addAll($response);
		$collection->filter(fn($pharmacy) => !$pharmacy->isActive());
		return $collection;
	}

	/**
	 * @param int $pharmacyId
	 * @return bool
	 */
	public function setActive(int $pharmacyId): bool
	{
		$response = $this->put('pharmacy/'.$pharmacyId, ['active' => true]);
		return $response['code'] == 'success';
	}

	/**
	 * @return PharmacyCollection
	 */
	public function all(): PharmacyCollection
	{
		$response = $this->get('pharmacy');
		return (new PharmacyCollection())->addAll($response);
	}
}